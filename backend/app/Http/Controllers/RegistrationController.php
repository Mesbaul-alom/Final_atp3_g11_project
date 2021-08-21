<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Requests\regRequest;


class 	RegistrationController extends Controller

    {

     public function index()
        {
        return view('registration.signup');
    }

   public function verify(regRequest $req){
       /* $validation = Validator::make($req->all(), [
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required|min:11',
            'adress' => 'required',
            'type' => 'required',
            'password'=> 'required|min:5'
        ]);*/
       $user = new User;

        $user->username = $req->username;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->adress = $req->adress;
        $user->type = $req->type;
        $user->password =$req->password;
        $user->image="";
        $user->active="0";
        $user->save();
        return redirect('/login');//->route('/login');
    }

     
    }


