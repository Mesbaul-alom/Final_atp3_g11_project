<?php

namespace App\Http\Controllers;

use App\Models\manager;
use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\User;
use App\Models\Contest;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    
    public function create()
    {
        //echo "mesba";
       return view('manager.create_manager');
    }
    public function dash()
    {
        echo "mesba";
      // return view('admin.dashboard');
    }*/
    public function profile()
    {
         $id = session('id');
         $users=User::where('id',$id)->first();
       return view('manager.profile')->with('users',$users);
    }
    public function projectlist()
    {
         $buyers = Buyer::all();
    
        return view('manager.projectlist')->with('buyers',$buyers);
      // return view('manager.projectlist');
    }
     public function projectlist_details($id)
    {
        $buyer = Buyer::find($id);
        return view('manager.projectlist_details')->with('buyer',$buyer);
   
    }
    public function delete_project($id){
        $buyer= Buyer::find($id);
        return view('manager.projectlist_delete')->with('buyer', $buyer);
    }

    public function destroy_project($id){
       
        Buyer::destroy($id);
        return redirect()->route('Manager.projectlist');
    }


    public function contestlist()
    {
        $contests = Contest::all();
       // redirect()->route('/protfolio')->with('user',$user);
       return view('manager.contestlist')->with('contests',$contests);
    }
     public function contestlist_details($id)
    {
        $contest = Contest::find($id);
        return view('manager.contestlist_details')->with('contest',$contest);
   
    }
    public function delete_contest($id){
        $buyer= Buyer::find($id);
        return view('manager.contestlist_delete')->with('buyer', $buyer);
    }

    public function destroy_contest($id){
       
        Buyer::destroy($id);
        return redirect()->route('manager.contestlist');
    }
      public function download(Request $req,$file)
    {
        return response()->download(public_path('protfolio_img/'.$file));
    }
    public function payment()
    {
        //echo "mesb
       return view('manager.create_manager');
    }
    public function sellerlist()
    {
        $users = User::all();
       return view('manager.sellerlist')->with('users',$users);
    }
    public function buyerlist()
    {
        $users = User::all();
       return view('manager.buyerlist')->with('users',$users);
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
    public function destroy(admin $admin)
    {
        //
    }
}
