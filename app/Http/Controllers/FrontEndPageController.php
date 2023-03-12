<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Professions;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Blocks;
use App\Models\Pages;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
class FrontEndPageController extends Controller
{
    public function index(){
        $data['professions'] = Professions::take(6)->get();
        $data['blocks'] = Blocks::all();
        $data['services'] = Professions::inRandomOrder()->limit(4)->get();
        $data['doctors'] = User::inRandomOrder()->limit(5)->where("role","psychologist")->get();
        $data['sliders'] = Sliders::all()->sortBy("slider_order");
        return view("Public.index")->with('data',$data);
    }

    public function pages($slug){
        $data['page'] = Pages::where("slug",$slug)->first();
        $data['professions'] = Professions::take(6)->get();
        return view("Public.pages")->with('data',$data);
    }
    public function contact(){
        $data['professions'] = Professions::take(6)->get();
        return view("Public.contact")->with('data',$data);
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
    public function getAppoinment(){
        $data['professions'] = Professions::all();

        return view("Public.getAppointment")->with('data',$data);
    }
    public function createAppoinment($id){
        $data['professions'] = Professions::all();
        $id = Crypt::decrypt($id);
        $product = new Products();
        $data['product'] = $product->getSingleProduct($id);
        return view("Public.createAppointment")->with('data',$data);
    }
    public function virtualTerminal(Request $request){
        if (empty($request->identity_number)){
            if (empty($request->identity_number)) {
                // Tc kimlik kısmı boş gelirse
                $request->identity_number = "11111111111";
            }
        }
        $order_id = uniqid("ORD-");
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-Cy1MLJxxRZA8hWBroF5wILA3K6CMAGJI");
        $options->setSecretKey("sandbox-XvrRzX8UwaVm7VW86KOVRSDIZ5wkc0Bc");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
        $paymentRequest = new \Iyzipay\Request\CreatePaymentRequest();
        $paymentRequest->setLocale(\Iyzipay\Model\Locale::TR);
        $paymentRequest->setConversationId($order_id);
        $paymentRequest->setPrice($request->price);
        $paymentRequest->setPaidPrice(intval($request->price));
        $paymentRequest->setCurrency(\Iyzipay\Model\Currency::TL);
        $paymentRequest->setInstallment(1);
        $paymnentCard = new \Iyzipay\Model\PaymentCard();
        $paymnentCard->setCardHolderName($request->name);
        $paymnentCard->setCardNumber($request->card_number);
        $paymnentCard->setExpireMonth($request->expire_month);
        $paymnentCard->setExpireYear($request->expire_year);
        $paymnentCard->setCvc($request->cvc);
        $paymnentCard->setRegisterCard(0);
        $paymentRequest->setPaymentCard($paymnentCard);
        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId($request->user_id);
        $buyer->setName($request->name);
        $buyer->setSurname($request->surname);
        $buyer->setGsmNumber($request->phone);
        $buyer->setEmail($request->email);
        $buyer->setIdentityNumber($request->identity_number);
        $buyer->setIp($request->ip());
        $buyer->setRegistrationAddress("istanbul-merkez");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey"); // ülke
        $paymentRequest->setBuyer($buyer); // requeste alıcıyı set ediyoruz.
        $shippingAddress = new \Iyzipay\Model\Address(); // kargo adresi
        $shippingAddress->setContactName($request->firstname . ' ' . $request->lastname); // Adres isim soyisim
        $shippingAddress->setCity($request->il); // İl
        $shippingAddress->setCountry("Turkey"); // Ülke
        $shippingAddress->setAddress($request->address . ' ' . $request->address2); //Kargo adresi
        $paymentRequest->setShippingAddress($shippingAddress); // requeste shipping adresi set ediyoruz
        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($request->firstname . ' ' . $request->lastname); // Fatura sahibi isim
        $billingAddress->setCity("İstanbul"); // Fatura için şehir
        $billingAddress->setCountry("Turkey"); // Fatura ülke
        $billingAddress->setAddress("İstanbul merkez"); // Fatura adresi
        $paymentRequest->setBillingAddress($billingAddress); // Fatura bilgilerini set ediyoruz
        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId($request->product_id); // Ürün id
        $firstBasketItem->setName($request->product_name); // ürün adı
        $category_id = $request->profession_type;
        $firstBasketItem->setCategory1($category_id);
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);  // Ürünün  sanal mı fiziksel mi olduğunu belirtiyoruz
        $firstBasketItem->setPrice(intval($request->price));
        $basketItems[0] = $firstBasketItem;
        $paymentRequest->setBasketItems($basketItems);
        $pay = \Iyzipay\Model\Payment::create($paymentRequest, $options);
        dd($pay);
    }
}
