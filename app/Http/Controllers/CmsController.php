<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Models\Sliders;
use Illuminate\Support\Facades\Validator;
class CmsController extends Controller
{
    public function sliderIndex(){
        $data['sliders'] = Sliders::all();
        return view("Dashboard.Admin.CMS.Slider.index")->with("data",$data);
    }
    public function sliderAdd(){
        return view("Dashboard.Admin.CMS.Slider.add");
    }
    public function sliderInsert(Request $request){
        $validate = Validator::make($request->all(),[
            "slider_text_1" => "required",
            "slider_header" => "required",
            "slider_paragraph" =>"required",
            "slider_image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "slider_order" => "required|numeric",
            "slider_button"=>"required",
            "slider_button_text"=>"required",
            "slider_button_link"=>"required",
        ],[
            "slider_text_1.required" => "Slider 1. Metin Alanı Boş Bırakılamaz",
            "slider_header.required" => "Slider Başlık Alanı Boş Bırakılamaz",
            "slider_paragraph.required" => "Slider Paragraf Alanı Boş Bırakılamaz",
            "slider_image.required" => "Slider Resim Alanı Boş Bırakılamaz",
            "slider_image.image" => "Slider Resim Alanı Sadece Resim Dosyası Olabilir",
            "slider_image.mimes" => "Slider Resim Alanı Sadece jpeg,png,jpg,gif,svg Formatında Olabilir",
            "slider_image.max" => "Slider Resim Alanı Sadece 2048 KB Boyutunda Olabilir",
            "slider_order.required" => "Slider Sıra Alanı Boş Bırakılamaz",
            "slider_order.numeric" => "Slider Sıra Alanı Sadece Rakam İçerebilir",
            "slider_button.required" => "Slider Buton Alanı Boş Bırakılamaz",
            "slider_button_text.required" => "Slider Buton Metin Alanı Boş Bırakılamaz",
            "slider_button_link.required" => "Slider Buton Link Alanı Boş Bırakılamaz",
        ]);
        if ($validate->fails()) {
            $request->flash();
            return redirect(route('admin.cms.sliders.add'))->withErrors($validate);
        }
        if ($request->hasFile("slider_image")) {
            $fileName = uniqid() . '.' . $request->slider_image->getClientOriginalExtension();
            $request->slider_image->move(public_path("assets/images"), $fileName);
            $request->slider_image = $fileName;
        }
        $insert = Sliders::insert([
            "slider_text_1" => $request->slider_text_1,
            "slider_header" => $request->slider_header,
            "slider_paragraph" => $request->slider_paragraph,
            "slider_image" => $request->slider_image,
            "slider_order" => $request->slider_order,
            "button_status" => $request->slider_button,
            "button_text" => $request->slider_button_text,
            "button_link" => $request->slider_button_link,
        ]);
        if ($insert) {
            return redirect(route('admin.cms.slider'))->with("success", "Slider Başarıyla Eklendi");
        } else {
            return redirect(route('admin.cms.slider'))->with("error", "Slider Eklenirken Bir Hata Oluştu");
        }
    }
    public function deleteSlider(Request $request){
        Sliders::find($request->id)->delete();
        return redirect(route('admin.cms.slider'))->with("success", "Slider Başarıyla Silindi");
    }
}
