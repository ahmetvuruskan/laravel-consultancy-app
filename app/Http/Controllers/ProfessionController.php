<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professions;

class ProfessionController extends Controller
{
    public function search(Request $request){
        $data[] = [];
        if ($request->has("q")) {
            $search = $request->q;
            $query = Professions::where("profession_type", "like", "%$search%")->get();
        }else{
            $query = Professions::all();
        }
        foreach ($query as $item){
            $data[] =[
                'id' => $item->id,
                'text' => $item->profession_type
            ];
        }
        return response([
            "results" => $data
        ],200);
    }

}
