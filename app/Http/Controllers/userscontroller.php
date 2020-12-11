<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\User;
use Auth;
use Session;
use Mail;
use Illuminate\Support\Facades\Hash;

class userscontroller extends Controller




{

    public function userloginregister(Request $request)
    {
        $categories = category::get();

    
  
        return view('front.login_register')->with(compact('categories'));
      

    }


    public function register(Request $request)

    {
        if($request->isMethod('post')){


            $data=$request->all();

            //echo "<pre>"; print_r($data); die;
            
            $usercount=User::where('email',$data['email'])->count();
            if($usercount>0){

                return redirect()->back()->with('flash_message_error','Email already exists!');
            }
            else{
                  $user = new User;
                  $user->name=$data['name'];
               
                  $user->email=$data['email'];
                  $user->password=bcrypt($data['password']); 
                  $user->save();

                  if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){

                           Session::put('frontSession',$data['email']);

                    return redirect('/login-register');
                  }
            }

        }

        $categories = category::get();

      //  return view('front.login_register'); 

      return view('front.login_register')->with(compact('categories'));
    }

    public function login(Request $request)
    {

        if($request->isMethod('post'))
        {

            $data=$request->all();

           
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){

                Session::put('frontSession',$data['email']);

                return redirect('/cart');
              }else{

                return redirect()->back()->with('flash_message_error','Invalid Username or Password!');
              }
             
        }
    }


    public function account(Request $request)
    {
        $categories = category::get();
        $user_id = Auth::user()->id;
        $userdetails= User::find($user_id);

        if($request->isMethod('post')){

            $data=$request->all();

            
            $user = User::find($user_id);
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->pincode = $data['pincode'];
            $user->contact = $data['contact'];
            $user->save();
            return redirect()->back()->with('flash_message_success','your account detail has been successfully update!');

        }

       

    
  
        return view('front.account')->with(compact('categories','userdetails'));
      

    }

    public function chkuserpassword(Request $request)
    {


        $data=$request->all();

        $current_password=$data['current_pwd'];
        $user_id=Auth::User()->id;
        $check_password=User::where('id',$user_id)->first();
        if(Hash::check($current_password,$check_password->password)){

            echo "true"; die;

        }else{

            echo "false"; die;
        }

    }

    public function updatepassword(Request $request){

        if($request->isMethod('post')){
            $data=$request->all();
            $old_pwd= User::where('id',Auth::User()->id)->first();
            $current_pwd=$data['current_pwd'];
            if(Hash::check($current_pwd,$old_pwd->password)){

                $new_pwd=bcrypt($data['new_pwd']);
                User::where('id',Auth::User()->id)->update(['password'=>$new_pwd]);
                return redirect()->back()->with('flash_message_success','password update successfully');

            }else {
                return redirect()->back()->with('flash_message_error',' current password is incorrect');
                

            }


        }

    }
    
    public function logout()
    {
        Auth::logout();
     
        Session::forget('frontSession');
        Session::forget('session_id');
        return redirect('/');

    }


    public function checkemail(Request $request){

        $data=$request->all();

        $usercount=User::where('email',$data['email'])->count();
        if($usercount>0){

            echo "false";
        }
        else{
            echo "true"; die;
        }

       

    }
    public function userforgot(Request $req){
        $categories = category::get();
        if($req->isMethod('post')){
            $data = $req->all();
            $usercount = User::where('email',$data['email'])->count();
            if($usercount == 0){
                return redirect()->back()->with('flash_message_error','Email does not Exist!');
            }

            // Get User Details
            $userDetails = User::where('email',$data['email'])->first();

            // Generate Random Password
            $random_password = str_random(8);

            // Encode/Secure Password
            $new_password = bcrypt($random_password);

            // Update Password
            User::where('email',$data['email'])->update(['password'=>$new_password]);

            // Send Forgot Password Email Code
            $email = $data['email'];
            $name = $userDetails->name; 
            $messageData = [
                'email'=>$email,
                'name' => $name,
                'password'=>$random_password
            ];
            Mail::send('emails.forgotpassword',$messageData,function($message)use($email){
                $message->to($email)->subject('New Password - E-Com Website');
            });

            return redirect('/cart')->with('flash_message_success','Please check your email for new password!');
        }
        return view('front.forgot')->with(compact('categories'));

}

    public function viewuser(Request $request)
    {


        $users=User::get();
        return view('view_users')->with(compact('users'));

    } 


  

    
}

