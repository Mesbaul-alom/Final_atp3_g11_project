<?php
namespace App\Http\Controllers;
use App\Http\Requests\create_managerRequest;
use App\Http\Requests\create_blogRequest;
use App\Http\Requests\profileRequest;
use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Contest;
use App\Models\Blog;
use App\Models\Application;
use App\Models\Notice;
use Illuminate\Support\Facades\DB;
use PDF;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $id = session('id');
          //dd($id);
         $users=User::where('id',$id)->first();
        return view('admin.index')->with ('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo "mesba";
       return view('admin.create_manager');
    }
     public function submit(Request $req)
    {

         $user = new User;

        $user->username = $req->input('name');
        $user->email = $req->input('email');
        $user->phone = $req->input('phone');
        $user->adress = $req->input('adress');
        $user->type = "2";
        $user->password =$req->input('password');
        $user->image="";
        $user->active="1";
        $user->save();
       return response()->json([
        'status'=>200,
        'message'=>'Add Manager sucessfully done',

       ]);
    }
    public function managerlist()
    {
        $users = User::get();
        return response()->json([
            'status'=>200,
            'managers'=>$users,
    
           ]);
    }
    public function edit_project($id)
    {
        $manager = User::find($id);
        return response()->json([
            'status'=>200,
            'manager'=>$manager,
    
           ]);
    }
    public function editproject($id)
    {
        $buyer = Buyer::find($id);
        return response()->json([
            'status'=>200,
            'buyer'=>$buyer,
    
           ]);
    }
    public function update_manager(Request $req, $id)
    {

        $manager = User::find($id);
        $manager->username = $req->input('name');
        $manager->email = $req->input('email');
        $manager->phone = $req->input('phone');
        $manager->adress = $req->input('adress');
        $manager->type = "2";
        $manager->password =$req->input('password');
        $manager->image="";
        $manager->active="1";
        $manager->update();
       return response()->json([
        'status'=>200,
        'message'=>'updated done',

       ]);
    }

    public function update_project(Request $req, $id)
    {

        $buyer = Buyer::find($id);
        $buyer->title = $req->input('title');
        $buyer->price = $req->input('price');
        $buyer->time = $req->input('time');
        $buyer->description = $req->input('description');
        $buyer->update();
       return response()->json([
        'status'=>200,
        'message'=>'updated done',

       ]);
    }
    public function delete_manager($id){
        $manager=User::find($id);
        $manager->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Deleted done',
    
           ]);
    }
    
    public function dash()
    {
        echo "mesba";
      // return view('admin.dashboard');
    }
    public function profile()
    {
        $id = session('id');
        
         $users=User::where('id',$id)->first();
       
         return view('admin.profile')->with ('users',$users);
    }
    public function profile_update(profileRequest $req)
    {
        $id = session('id');
        $user = User::find($id);
        $user->username = $req->username;
        $user->password = $req->password;
        $user->email = $req->email;
        $user->adress = $req->adress;
        $user->adress = $req->phone;

        $newImageName=time().'-'.$req->name.'.'.$req->image->extension();
       $image=$req->image->move(public_path('profile_img'),$newImageName);
        $user->image=$newImageName;
        $user->save();
        return redirect('/Admin/profile');//->route('/Admin/profile');
    }
    public function projectlist()
    {
        $buyers = Buyer::get();
    
        return response()->json([
            'status'=>200,
            'buyers'=>$buyers,
    
           ]);
    }
     public function projectlist_details($id)
    {
        $buyer = Buyer::find($id);
        return view('admin.projectlist_details')->with('buyer',$buyer);
   
    }
    public function delete_project($id){
        $buyer= Buyer::find($id);
        return view('admin.projectlist_delete')->with('buyer', $buyer);
    }

    public function delete_buyer($id){
       
        $buyer=Buyer::find($id);
        $buyer->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Deleted done',
    
           ]);
    }


    public function contestlist()
    {
        $contests = Contest::all();
       // redirect()->route('/protfolio')->with('user',$user);
       return view('admin.contestlist')->with('contests',$contests);
       //return view('admin.contestlist');
    }
      public function contestlist_details($id)
    {
        $contest = Contest::find($id);
        return view('admin.contestlist_details')->with('contest',$contest);
   
    }
    public function delete_contest($id){
        $contest= Contest::find($id);
        return view('admin.contestlist_delete')->with('contest', $contest);
    }

    public function destroy_contest($id){
       
        Contest::destroy($id);
        return redirect()->route('admin.contestlist');
    }
     public function download(Request $req,$file)
    {
        return response()->download(public_path('protfolio_img/'.$file));
    }
    public function payment()
    {
        //echo "mesba";
       return view('admin.create_manager');
    }
    public function sellerlist()
    {
        $users = User::all();
       
         return view('admin.sellerlist')->with('users',$users);
       //return view('admin.sellerlist');
    }
    public function buyerlist()
    {
        $users = User::all();
       return view('admin.buyerlist')->with('users',$users);
    }


    public function managerdetails($id)
    {  
        $user = User::find($id);
       return view('admin.user_details')->with('user',$user);
    }
     public function buyerdetails($id)
    {  
        $user = User::find($id);
       return view('admin.user_details')->with('user',$user);
    }
     public function sellerdetails($id)
    {  
        $user = User::find($id);
       return view('admin.user_details')->with('user',$user);
    }
     public function suspend(Request $req,$id)
    {  
        $user = User::find($id);
        $user->active=0;
        $user->save();
       return view('admin.user_details')->with('user',$user);
    }
     public function active(Request $req,$id)
    {  
        $user = User::find($id);
        $user->active=1;
        $user->save();
       return view('admin.user_details')->with('user',$user);
    }
     public function usersPending()
    {  
      $users = User::all();
       return view('admin.usersPending')->with('users',$users);
    }
     public function usersapprove($id)
    {  
     // $users = User::where('active', 0)
         // ->where('destination', 'San Diego')
          //->update(['delayed' => 1]);
        $user = User::find($id);
        $user->active = "1";
        $user->save();
       return redirect()->route('admin.usersPending');
    }
     public function notice()
    {
        $notices = Notice::all();
       return view('admin.create_notice')->with('notices',$notices); 
       
    }
    public function notice_store(Request $req){

        $notice=new Notice;
        $notice->type=$req->type;
        $notice->notice=$req->notice;
        $notice->save();

       
        return redirect('/Admin/create/notice');  

    }
     public function total_users()
    {
        $users = User::all();
       return view('admin.total_users')->with('users',$users); 
       
    }
     public function pdf()
    {
        $users = User::all();
        $pdf=PDF::loadView('admin.total_users',compact('users'));
        return $pdf->download('users.pdf'); 
      // return view('admin.total_users')->with('users',$users); 
       
    }

    public function application()
    {
        $users = Application::all();
        //$pdf=PDF::loadView('admin.total_users',compact('users'));
        //return $pdf->download('users.pdf'); 
      return view('admin.application')->with('users',$users); 
       
    }
     public function create_blog(Request $req){
        
         $blogs = Blog::all();
        // redirect()->route('/protfolio')->with('user',$user);
         return view('admin.create_blog')->with('blogs',$blogs);
              
    }
     public function blog_details( $id){
        
         $blog = Blog::find($id);
        // redirect()->route('/protfolio')->with('user',$user);
        // echo "$id";
        // dd($user);
         return view('admin.blog_details')->with('blog',$blog);
              
    }

    public function blog_store(create_blogRequest $req){
        

       $newImageName=time().'-'.$req->name.'.'.$req->image->extension();
       $test=$req->image->move(public_path('protfolio_img'),$newImageName);
        $blog=new Blog;
        $blog->image=$newImageName;
        $blog->title=$req->title;
        $blog->category=$req->category;
        $blog->discription=$req->discription;
        $id = session('id');
        $blog->admin_id=$id;
        $blog->save();

       
        return redirect('/Admin/create_blog');  

    }

    public function destroy($id){
        User::destroy($id);
        
        return redirect()->route('admin.index');
    }
    public function notice_delete($id){
        Notice::destroy($id);
        
        return redirect()->route('admin.notice');
    }
    public function blog_detete($id){
        Blog::destroy($id);
        
        return redirect()->route('admin.create_blog');
    }
     public function blog_update(create_blogRequest $req,$id){
       $blog = Blog::find($id);
       $newImageName=time().'-'.$req->name.'.'.$req->image->extension();
       $test=$req->image->move(public_path('protfolio_img'),$newImageName);
        $blog->image=$newImageName;
        $blog->title=$req->title;
        $blog->category=$req->category;
        $blog->discription=$req->discription;
        $id = session('id');
        $blog->admin_id=$id;
        $blog->save();
        
        return redirect()->route('admin.blog_details');
    }

public function chart()
    {
        $users = DB::select(DB::raw("select count(*)as total_type, type from users group by type"));
        $chartData="";
        foreach ($users as $list) {
            $chartData.="['".$list->type."',".$list->total_type."],";
        }
        $arr['chartData']=rtrim($chartData,",");
        
      return view('admin.chart',$arr); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "mesba";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response

     */
     
}
