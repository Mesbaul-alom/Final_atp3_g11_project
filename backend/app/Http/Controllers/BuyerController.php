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

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req){
       
         return view('buyer.index');
             }
  public function dashboard(Request $req){
       
       return view('buyer.index');
             
   }
   
    
    public function profile(){
        $id = session('id');
         $users=User::where('id',$id)->first();
        return view('buyerProfile.index')->with('users',$users);
             
   }
  
   
   public function profile_update(profileRequest $req)
    {
        $id = session('id');
        $user = User::find($id);
        $user->username = $req->username;
        $user->password = $req->password;
        $user->email = $req->email;
        $user->adress = $req->adress;
        $user->phone = $req->phone;
        $newImageName=time().'-'.$req->name.'.'.$req->image->extension();
        $image=$req->image->move(public_path('profile_img'),$newImageName);
        $user->image=$newImageName;
        $user->save();
        return redirect('/Buyer/profile');//->route('/Admin/profile');
    }
   


    public function buyer_by_projectApprove(Request $req)
    {
      $projects = Buyer::all();
      return view('buyer.index')->with('projects',$projects);
    } 
    
    
    public function buyer_by_contestApprove(Request $req)
    {
      $contests = Contest::all();
      return view('buyer.index')->with('contests',$contests);
    } 
  
    public function seller_bids_porject(Request $req)
    {
      $bids = Bid::all();
      return view('buyer.index')->with('bids',$bids);
    } 
    

     public function postProject(Request $req){
      $projects = Buyer::all();  
     
      return view('buyer.postproject')->with('projects',$projects);       
   }

public function store_project(BuyerProjectRequest $req){
    
  
    // $newImageName=time().'-'.$req->name.'.'.$req->project_file->extension();
    // $test=$req->project_file->move(public_path('protfolio_img'),$newImageName);
    $newImageName=time().'-'.$req->name.'.'.$req->project_file->extension();
    $test=$req->project_file->move(public_path('protfolio_img'),$newImageName);
    $project=new Buyer;
    $project->project_file=$newImageName;
    $project->title=$req->title;
    $project->price=$req->price;
    $project->description=$req->description;
    $project->time=$req->time;
    $project->type = $req->type;
    $project->active = "0";
    $id = session('id');
    $project->buyer_id=$id;
    $project->save();
 
     return redirect('/Buyer/postProject');  
 
 }



 public function postproject_details($id)
   {
        $project = Buyer::find($id);
   
        return view('buyer.postproject_details')->with('project',$project);
   }
   
  
  

   public function postproject_edit($id){
 
    $project = Buyer::find($id);
    return view('buyer.postproject_edit')->with('project', $project);
  }

  public function postproject_update(BuyerProjectRequest $req, $id){

    $project = Buyer::find($id);
    $newImageName=time().'-'.$req->name.'.'.$req->project_file->extension();
    $test=$req->project_file->move(public_path('protfolio_img'),$newImageName);
    $project->project_file=$newImageName;
    $project->title=$req->title;
    $project->price=$req->price;
    $project->description=$req->description;
    $project->time=$req->time;
    $id = session('id');
    $project->buyer_id=$id;
    $project->save();
    return view('buyer.postproject_details')->with('project', $project);
  }







   

  public function postcontest_details($id)
   {
        $contest = Contest::find($id);
   
        return view('buyer.postcontest_details')->with('contest',$contest);
   }









public function contests(Request $req){
      
       $contests = Contest::get();
       return response()->json($contests, 200);
  
       
   }

 public function store_contest(Request $req){
    

    $newImageName=time().'-'.$req->name.'.'.$req->contest_file->extension();
    $test=$req->contest_file->move(public_path('protfolio_img'),$newImageName);
    $contest=new Contest;
    $contest->contest_file=$newImageName;
    $contest->title=$req->title;
    $contest->price=$req->price;
    $contest->description=$req->description;
    $contest->time=$req->time;
    $contest->save();
    return response()->json($contest, 200);
    // return response()->json([
    //   'status'=>200,
    //   'message'=> 'Post contest successfully',
    // ]);
 }













 public function postcontest_edit($id){
 
  $contest =Contest::find($id);
  return view('buyer.postcontest_edit')->with('contest', $contest);
}

public function postcontest_update(BuyerContestRequest $req, $id){

 


  $contest =Contest::find($id);
  $newImageName=time().'-'.$req->name.'.'.$req->contest_file->extension();
  $test=$req->contest_file->move(public_path('protfolio_img'),$newImageName);
  $contest->contest_file=$newImageName;
  $contest->title = $req->title;
  $contest->price = $req->price;
  $contest->description = $req->description;
  $contest->time = $req->time;
  $contest->save();
  return view('buyer.postcontest_details')->with('contest', $contest);
 
}
          
   public function bidlist(Request $req){
        $projects = Buyer::all();
     return view('buyer.bidlist')->with('projects',$projects);
          
   }
   public function bidlist_details($id)
   { 
        $project = Buyer::find($id);
        return view('buyer.bidlist_details')->with('project', $project);
   } 
    public function seller_bidingproject()
    {
          $bids = Bid::all();
       return view('buyer.seller_bidingproject')->with('bids',$bids);

    } 
    public function seller_bidingprojectMsg($id)
    {
      $bid = Bid::find($id);
      return view('buyer.seller_bidingprojectMsg')->with('bid',$bid) ;
    }
   
    public function bidder_details($id){
      $bid = Bid::find($id);
      return view('buyer.seller_bidingprojecDelete')->with('bid',$bid) ;
  } 
    public function bid_detete($id){
        Bid::destroy($id);
        $bids = Bid::all();
        return view('buyer.seller_bidingproject')->with('bids',$bids);
    }
   

    public function suspendBid(Request $req,$id)
    {  
        $bid = Bid::find($id);
        $bid->active=0;
        $bid->save();
       return view('buyer.seller_bidingprojecDelete')->with('bid',$bid);
    }
     public function activeBid(Request $req,$id)
    {  
        $bid = Bid::find($id);
        $bid->active=1;
        $bid->save();
        return view('buyer.seller_bidingprojecDelete')->with('bid',$bid);
    }
     public function bidsPending()
    {  
      $bids = Bid::all();
       return view('buyer.pendingBid')->with('bids',$bids);
    }
     public function bidsapprove($id)
    {  
        $bid = Bid::find($id);
        $bid->active = "1";
        $bid->save();
       return redirect()->route('buyer.pendingBid');
    } 
    



    public function chart()
    {
        $projects = DB::select(DB::raw("select count(*)as total_type, type from buyers group by type"));
        $chartData="";
        foreach ($projects as $list) {
            $chartData.="['".$list->type."',".$list->total_type."],";
        }
        $arr['chartData']=rtrim($chartData,",");
        
        return view('buyerProfile.chart',$arr); 
    } 

   public function contestlist(Request $req){
       $contests = Contest::all();
     return view('buyer.contestlist')->with('contests',$contests);
          
   }
    public function contestlist_details($id)
    { 
         $buyerContest = Contest::find($id);
         
         return view('buyer.contestlist_details')->with('buyerContest',$buyerContest);
    } 
    public function download(Request $req,$file)
    {
        return response()->download(public_path('protfolio_img/'.$file));
    }
    
   
   
}
