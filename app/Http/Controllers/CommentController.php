<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function saveComment(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'comment' => 'required',
            'user' => 'required',
        ], [
            'comment.required' => 'Yorumunuz boş bırakılamaz',
        ]);
        if ($validate->fails()) {
            return response()->json([

                'status' => 'error',
                'message' => $validate->errors()->first()
            ], 400);
        }
        $insert = Comments::insert([
            'comment' => $request->comment,
            'user_id' => $request->user,
            'order_id' => $request->order_id,
        ]);
        if ($insert) {
            return response()->json([
                'status' => 'success',
                'message' => 'Yorumunuz başarıyla eklendi'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Yorumunuz eklenirken bir hata oluştu'
            ], 500);
        }
    }
    public function comments(){

        $comment = new Comments();
        $data['comments'] = $comment->getAll();
        return view('Dashboard.Admin.Comments.index')->with("data",$data);
    }
    public function updateComment(Request $request)
    {
        $st = Comments::where("id",$request->id)->update([
            "status" => $request->status
        ]);
        if($st){
            return response()->json([
                "status" => "success",
                "message" => "Yorum başarıyla güncellendi"
            ],200);
        }else{
            return response()->json([
                "status" => "error",
                "message" => "Yorum güncellenirken bir hata oluştu"
            ],500);
        }
    }
}
