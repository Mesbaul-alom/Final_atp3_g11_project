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


class BidController extends Controller
{
    function list()
    {
        $list = Buyer::get();
        return response()->json($list, 200);
    }

    function bid_details($id)
    {     
        $bid = Buyer::find($id);
        return response()->json($bid,200);
    } 
    
    public function download(Request $req,$file)
    {
        // return response()->download(public_path('protfolio_img/'.$file));
        return response()->json(download(public_path('protfolio_img/'.$file)),200);   
    }
      
    public function seller_bidingproject()
    {
        $bidders = Bid::all();
       // return view('buyer.seller_bidingproject')->with('bids',$bids);
        return response()->json($bidders,200) ;
    } 

    //pore krtse
    public function seller_bidingprojectMsg($id)
    {
      $bid = Bid::find($id);
      return view('buyer.seller_bidingprojectMsg')->with('bid',$bid) ;
    } 
     
    


    // public function delete($id)
    // {
    //     $contest  = Contest::find($id);
    //     $contest->forceDelete();
    //     return response(200);
    // }
}
