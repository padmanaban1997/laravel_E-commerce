<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class admincontroller extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->input();
             if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'admin' => '1'])) {
               
               Session::put('adminSession',$data['email']);

                return redirect('/home');
            }else{
               
               return redirect('/login')->with('flash_message_error','Invalid Username or Password');
             }
        }
        return view('adminlogin');

    }

    public function logout(){
        Session::flush();
        return redirect('/login')->with('flash_message_success','Logged out Successfully');

    }

    public function dashboard(){

        if(Session::has('adminSession')){

         //perform all the task

        }
        else{

            return redirect('/login')->with('flash_message_error','please login to access'); 
        }

           return view('dashboard');

    }



}
