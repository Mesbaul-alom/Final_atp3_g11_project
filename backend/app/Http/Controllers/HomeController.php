<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\User;
use App\Models\Protfolio;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Bid;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $req){
     
         return view('sellerHome.index');
                
    }

    public function profile(){
         $id = session('id');
          //dd($id);
         $users=User::where('id',$id)->first();
        // dd($users);
         return view('sellerProfile.index') ->with ('users',$users);
              
    }
    public function update(Request $req){
         
        $user =new user();
        dd($user);
        
        $users ->username = $req->username;
    
        
        $user ->email = $req->email;
       $user ->phone = $req->phone;
        $user ->adress = $req->adress;
        $user ->type = $req->type;
        $user ->password =$req->password;
       $user ->image="";
     
     
        $update= User::where('id', $id)->update($user);
        //dd ($user);
        if($update){
          return redirect('/index') ->with ('users',$users); ;
      }
      else{
     return redirect()->back();
      }
       // return redirect('/sellerProfile.index');//->route('/login');

    }

      public function project(Request $req){
        
         return view('sellerHome.project');
              
    }

      public function contest(Request $req){
        
         return view('sellerHome.contest');
              
    }

      public function dashboard(Request $req){
        
         return view('sellerHome.index');
              
    }
     public function protfolio(Request $req){
        
         $protfolios = Protfolio::all();
        // redirect()->route('/protfolio')->with('user',$user);
         return view('sellerHome.protfolio')->with('protfolios',$protfolios);
              
    }
     public function p_details( $id){
        
         $protfolio = Protfolio::find($id);
        // redirect()->route('/protfolio')->with('user',$user);
        // echo "$id";
        // dd($user);
         return view('sellerHome.p_details')->with('protfolio',$protfolio);
              
    }

    public function store(Request $req){
        
        
        

       $req->validate([
            'image'=>'required|mimes:jpeg,png,jpg',
            'title'=>'required',
            'discription'=>'required'
       ]);
       $newImageName=time().'-'.$req->name.'.'.$req->image->extension();
       $test=$req->image->move(public_path('protfolio_img'),$newImageName);
        $protfolio=new Protfolio;
        $protfolio->image=$newImageName;
        $protfolio->title=$req->title;
        $protfolio->discription=$req->discription;
        $protfolio->save();

       
        return redirect('/protfolio');  

    }


      public function myproject(){
        
         return view('sellerHome.myproject');
              
    }

    public function withdraw(){
        
     return view('sellerProfile.withdraw');
          
}
public function dex()
    {
         //return _products::all();
         $data=Buyer::all();

         return view('sellerHome.product',['buyer'=>$data]);
    }

   public function detail($id)
    { 
         //return _products::find($id);
        $data =Buyer::find($id);
       return view('sellerHome.detail',['buyer'=>$data]);
    }  
    
    function addToCart(Request $req)
    {
       
          $bid= new Bid;
          
           $bid->buyer_id=$req->product_id;
           $id = session('id');
          $bid->seller_id=$id;
          $username = session('username');
          $bid->username=$username;
          $bid->save();
           return redirect('/product');

        
    }


}