<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller
{
    public function index(){
        $data["settings"]=Settings::orderBy("settings_must","ASC")->get();
        return view("Dashboard.Admin.Settings.index")->with("data",$data);
    }
    public function editSettings($id){
        $setting = Settings::find($id);
        return view("Dashboard.Admin.Settings.edit")->with("setting",$setting);
    }
    public function updateSetting(Request $request,$id){
        if ($request->hasFile("settings_value")) {
            $validated = Validator::make($request->all(), [
                'settings_value' => 'required|image|mimes:jpg,jpeg,png,ico|max:2048',
                'old_file' => 'required',
            ],[
                "settings_value.required" =>"Ayar değer kısmı boş olamaz.",
                "settings_value.image" =>"Yüklemeye çalıştığınız dosyanın resim dosyası olması gerekmektedir.",
                "settings_value.mimes" =>"Kabul edilen dosya tipleri : jpg,jpeg,png,ico",
                "settings_value.max" =>"Yüklemeye çalıştığınız dosya max 2mb olmalıdır.",
            ]);
            if ($validated->fails()) {
                $request->flash();
                return redirect(route('admin.settings.edit'))->withErrors($validated);
            }
            $fileName = uniqid() . '.' . $request->settings_value->getClientOriginalExtension();
            $request->settings_value->move(public_path("assets/images"), $fileName);
            $request->settings_value = $fileName;
        }
        $settings = Settings::where('id', $id)->update([
            'settings_value' => $request->settings_value
        ]);
        if ($settings) {
            $path = "assets/images/" . $request->old_file;
            if (file_exists($path)) {
                @unlink($path);
            }
            Log::info($request->user()->email . " Kullanıcısı," . $request->id . " id numaralı ayarı başarı ile güncelledi");
            return redirect(route("admin.settings.index"));
        } else {
            Log::info($request->user()->email . " Kullanıcısı," . $request->id . " id numaralı ayarı güncellemeye çalıştı fakat hata ile karşılaştı. " . $settings);
            return redirect(route("admin.settings.edit",$id));
        }
    }

}
