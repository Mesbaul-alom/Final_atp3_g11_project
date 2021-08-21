<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Bid;
use App\Models\Contest;
use Illuminate\Http\Request;
use App\Http\Requests\BuyerContestRequest;
use App\Http\Requests\BuyerProjectRequest;
use App\Http\Requests\profileRequest;
use Illuminate\Support\Facades\DB;
use Validator;


class ContestController extends Controller
{
    function list()
    {
        $contests = Contest::get();
        return response()->json($contests, 200);
    }
    
    function create(Request $req)
    {
        // $newImageName=time().'-'.$req->name.'.'.$req->contest_file->extension();
        // $test=$req->contest_file->move(public_path('protfolio_img'),$newImageName);
        $contest=new Contest;
        $contest->contest_file = $req->contest_file ;
        // $contest->contest_file=$newImageName;
        $contest->title=$req->title;
        $contest->price=$req->price;
        $contest->description=$req->description;
        $contest->time=$req->time;
        $contest->save();
        return response()->json($contest, 200);
    }

    public function delete($id)
    {
        $contest  = Contest::find($id);
        $contest->forceDelete();
        return response(200);
    }


    public function edit($id)
    {
        $contest  = Contest::find($id);
        return response()->json($contest, 200);
    }

    public function update(Request $req, $id)
    {
        $contest=new Contest;
        $contest->contest_file = $req->contest_file ;
        $contest->title=$req->title;
        $contest->price=$req->price;
        $contest->description=$req->description;
        $contest->time=$req->time;
        $contest->save();
        return response()->json($contest, 200);
    }



}
