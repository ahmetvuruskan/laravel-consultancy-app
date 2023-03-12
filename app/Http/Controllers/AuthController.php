<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view("Dashboard.login");
    }
    public function userCheck(Request $request)
    {
        $validatedUserData = Validator::make($request->all(), [
            'email' => "required|email:rfc,dns",
            'password' => 'required'
        ],[
            'email.required' =>"Lütfen e posta adresinizi giriniz.",
            'email.email' =>"Lütfen geçerli bir mail adresi giriniz",
            'password.required' =>"Lütfen şifrenizi giriniz."
        ]);

        if ($validatedUserData->fails()) {
            $request->flash();
            return redirect(route('login'))->withErrors($validatedUserData);
        }
        $rememberMe = $request->has('remember_me');
        $userData = $request->only(["email", "password"]);
        if (Auth::attempt($userData, $rememberMe)) {
            $user = User::where('email', $userData['email'])->first();
            $token = $user->createToken("userToken")->plainTextToken;
            Log::info("Kullanıcı giriş yaptı", ['user' => Auth::user()->email, 'date-time' => now()->format("d/m/Y") . "-" . now()->format("H:i:s")]);
            if (Auth::user()->role == "admin") {
                return redirect(route("admin.index"))->withCookie(\cookie("token", $token, env("SESSION_LIFETIME")));
            }elseif (Auth::user()->role == "psychologist") {
                return redirect(route("psychologist.index"))->withCookie(\cookie("token", $token, env("SESSION_LIFETIME")));
            }
//            elseif (Auth::user()->role == "user") {
//                return redirect("/kullanici/panel")->withCookie(\cookie("token", $token, env("SESSION_LIFETIME")));;
//            }
        } else {
            Log::info('Kullanıcı giriş hatası.', ['email' => $userData['email']]);
            $request->flash();
            return back()->withErrors(['error' => "Kullanıcı adı ve şifreniz hatalı"]);
        }
    }
    public function registerUser(Request $request){
        $valdiate = Validator::make($request->all(),[
            'firstname' => 'required',
            'surname' => 'required',
            'username' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'phone' => 'required|numeric|min:10',
        ],[
            'firstname.required' => 'Lütfen adınızı giriniz.',
            'surname.required' => 'Lütfen soyadınızı giriniz.',
            'username.required' => 'Lütfen kullanıcı adınızı giriniz.',
            'email.required' => 'Lütfen e posta adresinizi giriniz.',
            'email.email' => 'Lütfen geçerli bir mail adresi giriniz.',
            'password.required' => 'Lütfen şifrenizi giriniz.',
            'password_confirmation.required' => 'Lütfen şifrenizi tekrar giriniz.',
            'password_confirmation.same' => 'Şifreleriniz uyuşmuyor.',
            'phone.required' => 'Lütfen telefon numaranızı giriniz.',
            'phone.numeric' => 'Lütfen geçerli bir telefon numarası giriniz.',
            'phone.min' => 'Lütfen geçerli bir telefon numarası giriniz.',
        ]);
        if ($valdiate->fails()) {
            $request->flash();
            return redirect(route('register'))->withErrors($valdiate);
        }
       $user = User::insert([
            'name' => $request->firstname,
            'surname' => $request->surname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'role' => 'user',
            'created_at' => now(),
        ]);
        if ($user) {
            return redirect(route('login'))->with('success', 'Kayıt işlemi başarılı bir şekilde gerçekleşti.');
        }else{
            return redirect(route('register'))->with('error', 'Kayıt işlemi gerçekleştirilemedi.');
        }
    }

    public function logout()
    {
        Log::info("Kullanıcı çıkış yaptı", ['user' => Auth::user()->email, 'date-time' => now()->format("d/m/Y") . "-" . now()->format("H:i:s")]);
        auth()->user()->tokens()->delete();
        if (Cookie::has('token')) {
            Cookie::forget('token');
        }
        Auth::logout();
        return redirect(route('login'));
    }
    public function register(){
        return view("Dashboard.register");
    }
}
