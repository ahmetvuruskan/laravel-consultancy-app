<?php

namespace App\Http\Controllers;

use App\Models\Tests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function index()
    {
        $data['tests'] = Tests::all();
        return view('Dashboard.Admin.Test.index')->with("data", $data);
    }

    public function edit($id)
    {
        $test = Tests::find($id);
        return view('Dashboard.Admin.Test.edit')->with("test", $test);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            "test_name" => "required",
            "test_description" => "required",
            "test_embed" => "required",
        ], [
            "test_name.required" => "Test adı boş bırakılamaz",
            "test_description.required" => "Test açıklaması boş bırakılamaz",
            "test_embed.required" => "Test embed kodu boş bırakılamaz",
        ]);
        if ($validate->fails()) {
            $request->flash();
            return redirect(route('admin.test.edit', $id))->withErrors($validate);
        }
        $test = Tests::find($id)->update([
            "name" => $request->test_name,
            "description" => $request->test_description,
            "test_embed" => $request->test_embed,
            "updated_at" => now(),
        ]);

        if ($test) {
            return redirect(route('admin.test.index'))->with("success", "Test başarıyla güncellendi");
        } else {
            return redirect(route('admin.test.edit', $id))->with("error", "Test güncellenirken bir hata oluştu");
        }
    }

    public function add()
    {
        return view('Dashboard.Admin.Test.add');
    }

    public function insert(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "test_name" => "required",
            "test_description" => "required",
            "test_embed" => "required",
        ], [
            "test_name.required" => "Test adı boş bırakılamaz",
            "test_description.required" => "Test açıklaması boş bırakılamaz",
            "test_embed.required" => "Test embed kodu boş bırakılamaz",
        ]);
        if ($validate->fails()) {
            $request->flash();
            return redirect(route('admin.test.add'))->withErrors($validate);
        }
        $test = Tests::create([
            "name" => $request->test_name,
            "slug" => Str::slug($request->test_name),
            "description" => $request->test_description,
            "test_embed" => $request->test_embed,
            "created_at" => now()
        ]);
        if ($test) {
            return redirect(route('admin.test.index'))->with("success", "Test başarıyla eklendi");
        } else {
            return redirect(route('admin.test.add'))->with("error", "Test eklenirken bir hata oluştu");
        }
    }
    public function delete(Request $request){
        $test = Tests::find($request->id)->delete();
        if($test){
            return response()->json([
                "status" => true,
                "message" => "Test başarıyla silindi"
            ]);
        }else{
            return response()->json([
                "status" => false,
                "message" => "Test silinirken bir hata oluştu"
            ]);
        }
    }
}
