<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Professions;
use App\Models\Tests;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Blocks;
use App\Models\Pages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Models\Blogs;
use App\Models\Orders;
use App\Models\Comments;
class FrontEndPageController extends Controller
{
    public function index()
    {
        $user = new User();
        $data['professions'] = Professions::take(6)->get();
        $data['blocks'] = Blocks::all();
        $data['available_users'] = $user->getAvailableUsers();
        $data['users'] = $user->getUsers();
        $data['sliders'] = Sliders::all()->sortBy("slider_order");
        return view("Public.index")->with('data', $data);
    }

    public function pages($slug)
    {
        $data['page'] = Pages::where("slug", $slug)->first();
        $data['professions'] = Professions::take(6)->get();
        return view("Public.pages")->with('data', $data);
    }

    public function contact()
    {
        $data['professions'] = Professions::take(6)->get();
        return view("Public.contact")->with('data', $data);
    }

    public function contactForm(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "subject" => "required",
            "message" => "required"
        ]);
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message
        ];
        return "mail sent";
    }

    public function getAppoinment()
    {
        $user = new User();
        $data['professions'] = Professions::take(6)->get();
        $data['professionsforsell'] = Professions::all();
        $data['available_users'] = $user->getAvailableUsers();
        $data['users'] = $user->getUsers();
        return view("Public.getAppointment")->with('data', $data);
    }

    public function createAppoinment($id)
    {
        $user = new User();
        $id = Crypt::decrypt($id);
        $product = new Products();
        $data['professions'] = Professions::take(6)->get();
        $data['professionsforsell'] = Professions::all();
        $data['user']=$user->getSinglePsychologist(['users.id' => $id]);
        $data['user_products'] = $product->getProdcuts($id);
        return view("Public.createAppointment")->with('data', $data);
    }

    public function virtualTerminal(Request $request)
    {
        $product = new Products();
        //Todo: Fiyat Çekilecek 0 id 1 uzunluk

        $parts = explode("-", $request->session_type);
        $price = ($product->getProductPrice($parts[0], $parts[1]))[0]->price;

        if (empty($request->identity_number)) {
            if (empty($request->identity_number)) {
                // Tc kimlik kısmı boş gelirse
                $request->identity_number = "11111111111";
            }
        }

        $order_id = uniqid("ORD-");
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-QMufzLMoWoj6StkgQBBGsXWVYKDdnzlV");
        $options->setSecretKey("sandbox-py8lrniMa4nbVpPF4Jc4jvijwmSSPrfb");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        $paymentRequest = new \Iyzipay\Request\CreatePaymentRequest();
        $paymentRequest->setLocale(\Iyzipay\Model\Locale::TR);
        $paymentRequest->setConversationId($order_id);
        $paymentRequest->setPrice($price);
        $paymentRequest->setPaidPrice(intval($price));
        $paymentRequest->setCurrency(\Iyzipay\Model\Currency::TL);
        $paymentRequest->setInstallment(1);
        $paymnentCard = new \Iyzipay\Model\PaymentCard();
        $paymnentCard->setCardHolderName($request->card_holder);
        $paymnentCard->setCardNumber($request->card_number);
        $paymnentCard->setExpireMonth($request->expire_month);
        $paymnentCard->setExpireYear($request->expire_year);
        $paymnentCard->setCvc($request->cvc);
        $paymnentCard->setRegisterCard(0);
        $paymentRequest->setPaymentCard($paymnentCard);
        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId(Auth::user()->id);
        $buyer->setName(Auth::user()->name);
        $buyer->setSurname(Auth::user()->surname);
        $buyer->setGsmNumber(Auth::user()->phone);
        $buyer->setEmail(Auth::user()->email);
        $buyer->setIdentityNumber($request->identity_number);
        $buyer->setIp($request->ip());
        $buyer->setRegistrationAddress("istanbul-merkez");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey"); // ülke
        $paymentRequest->setBuyer($buyer); // requeste alıcıyı set ediyoruz.
        $shippingAddress = new \Iyzipay\Model\Address(); // kargo adresi
        $shippingAddress->setContactName(Auth::user()->name . ' ' . Auth::user()->surname); // Adres isim soyisim
        $shippingAddress->setCity("İstanbul"); // İl
        $shippingAddress->setCountry("Turkey"); // Ülke
        $shippingAddress->setAddress($request->address . ' ' . $request->address2);
        $paymentRequest->setShippingAddress($shippingAddress);
        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($request->full_name);
        $billingAddress->setCity("İstanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("İstanbul merkez");
        $paymentRequest->setBillingAddress($billingAddress);
        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId($request->specialist_id);
        $firstBasketItem->setName("Özel Danışmanlık");
        $firstBasketItem->setCategory1($request->package_type);
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);  // Ürünün  sanal mı fiziksel mi olduğunu belirtiyoruz
        $firstBasketItem->setPrice(intval($price));
        $basketItems[0] = $firstBasketItem;
        $paymentRequest->setBasketItems($basketItems);
        $pay = \Iyzipay\Model\Payment::create($paymentRequest, $options);
        if ($error = $pay->getErrorMessage()) {
            Log::error("Ödeme Hatası: " . $error);
        }
        if ($pay->getStatus() == 'success') {
            Orders::insert([
                "order_id" => $order_id,
                "buyer_id" => Auth::user()->id,
                "product_id" => $parts[0],
                "duration" =>$parts[1],
                "status" => "success",
            ]);
            return view("Public.success");
        }
        return back()->with("error", "Ödeme işlemi başarısız oldu. Lütfen tekrar deneyiniz.");
    }

    public function blog()
    {
        $data['professions'] = Professions::take(6)->get();
        $data['blogs'] = Blogs::paginate(4);
        return view("Public.blogLists")->with('data', $data);
    }

    public function blogDetail($slug)
    {
        $data['professions'] = Professions::take(6)->get();
        $data['blog'] = Blogs::where("slug", $slug)->first();
        return view("Public.blogDetail")->with('data', $data);
    }

    public function tests()
    {
        $data['professions'] = Professions::take(6)->get();
        $data['tests'] = Tests::paginate(4);
        return view("Public.tests")->with('data', $data);
    }

    public function testDetail($slug)
    {
        $data['professions'] = Professions::take(6)->get();
        $data['test'] = Tests::where("slug", $slug)->first();
        return view("Public.testDetail")->with('data', $data);
    }
    public function psychologist($slug)
    {
        $comments = new Comments();
        $user = new User();
        $data['professions'] = Professions::take(6)->get();
        $data['psychologists'] =$user->getSinglePsychologist(["psychologist.slug" => $slug]);
        $data['comments'] = $comments->getUserComment($slug);
        return view("Public.psychologist")->with('data', $data);
    }

}
