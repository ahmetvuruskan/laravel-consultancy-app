<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Models\Sliders;
use Illuminate\Support\Facades\Validator;
use App\Models\Blocks;
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
            $request->slider_image->move(public_path("Public/images/"), $fileName);
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
    public function sliderEdit($id){
        $data['slider'] = Sliders::find($id);
        return view("Dashboard.Admin.CMS.Slider.edit")->with("data",$data);
    }
    public function sliderUpdate(Request $request){
        $validate = Validator::make($request->all(),[
            "slider_text_1" => "required",
            "slider_header" => "required",
            "slider_paragraph" =>"required",
            "slider_image" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "slider_order" => "required|numeric",
            "slider_button"=>"required",
            "slider_button_text"=>"required",
            "slider_button_link"=>"required",
        ],[
            "slider_text_1.required" => "Slider 1. Metin Alanı Boş Bırakılamaz",
            "slider_header.required" => "Slider Başlık Alanı Boş Bırakılamaz",
            "slider_paragraph.required" => "Slider Paragraf Alanı Boş Bırakılamaz",
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
            return redirect(route('admin.cms.sliders.edit',$request->id))->withErrors($validate);
        }
        if ($request->hasFile("slider_image")) {
            $fileName = uniqid() . '.' . $request->slider_image->getClientOriginalExtension();
            $request->slider_image->move(public_path("Public/images/"), $fileName);
            $request->slider_image = $fileName;
        }
        $update = Sliders::where("id",$request->id)->update([
            "slider_text_1" => $request->slider_text_1,
            "slider_header" => $request->slider_header,
            "slider_paragraph" => $request->slider_paragraph,
            "slider_image" => $request->slider_image ? $request->slider_image : $request->old_file ,
            "slider_order" => $request->slider_order,
            "button_status" => $request->slider_button,
            "button_text" => $request->slider_button_text,
            "button_link" => $request->slider_button_link,
        ]);
        $request->has("slider_image") ? unlink(public_path("Public/images/".$request->old_file)) : null;
        if ($update) {
            return redirect(route('admin.cms.slider'))->with("success", "Slider Başarıyla Güncellendi");
        } else {
            return redirect(route('admin.cms.slider'))->with("error", "Slider Güncellenirken Bir Hata Oluştu");
        }
    }
    public function deleteSlider(Request $request){
       $slider =  Sliders::find($request->id);
       unlink(public_path("Public/images/".$slider->slider_image));
       $slider->delete();
       return response()->json([
           "status" => "success",
           "message" => "Slider Başarıyla Silindi"
       ]);
    }
    public function indexBlocks(){
        $data['blocks'] = Blocks::all();
        return view("Dashboard.Admin.CMS.Blocks.index")->with("data",$data);
    }
    public function blocksEdit($id){
        $data['block'] = Blocks::find($id);
        return view("Dashboard.Admin.CMS.Blocks.edit")->with("data",$data);
    }
    public function blockUpdate(Request $request){
        $validate = Validator::make($request->all(),[
            "header" => "required",
            "paragraph" =>"required",
        ],[
            "header.required" => "Bloğun Başlık Alanı Boş Bırakılamaz",
            "paragraph.required" => "Bloğun Paragraf Alanı Boş Bırakılamaz",
        ]);
        if ($validate->fails()) {
            $request->flash();
            return redirect(route('admin.cms.blocks.edit',$request->id))->withErrors($validate);
        }
        $update = Blocks::where("id",$request->id)->update([
            "header" => $request->header,
            "paragraph" => $request->paragraph,
        ]);
        if ($update) {
            return redirect(route('admin.cms.blocks'))->with("success", "Bloğun Başarıyla Güncellendi");
        } else {
            return redirect(route('admin.cms.blocks'))->with("error", "Bloğun Güncellenirken Bir Hata Oluştu");
        }
    }
    public function pagesIndex(){
        $data['pages'] =  Pages::all();
        return view("Dashboard.Admin.CMS.Pages.index")->with('data',$data);
    }
}
