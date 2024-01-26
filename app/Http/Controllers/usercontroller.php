<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\user;
use App\system;

class usercontroller extends Controller
{
    public function signup (Request $request){
      
        $rules = [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users'), // Check uniqueness in the 'users' table
            ],
            'password' => 'required|string|min:8',
            'role' => 'required',
           
        ];
              // Validate the request
              $validator = Validator::make($request->all(), $rules);
      
              // If validation fails, return the errors
              if ($validator->fails()) {   
                return redirect()->back()->withErrors($validator)->withInput();   
              }
              
              $image_url = '';
              if($request->has('image') && $request->file('image')){
                  $file  = $request->file('image');
                  $name  = time().'.'.$file->getClientOriginalExtension();
                  $path = public_path().'/newsimg'.'/';
                  $file->move($path,$name);
                  $image_url = asset('/newsimg').'/'.$name;
              }
             
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password), 
            'role'=> $request->role,
            'profile'=> $image_url
        ];
      
        user::insert($data);
        return redirect()->back()->with('success', 'User registered successfully!');
       }


       
       public function signin(Request $request){
       
        $rules=[
            'email' => 'required|email',
            'password' =>'required|min:6'
        ];
        
        // Validate the request
        $validator = Validator::make($request->all(), $rules);
      
        // If validation fails, return the errors
        if ($validator->fails()) {   
        return redirect()->back()->withErrors($validator)->withInput();   
        }
                      
        // $name= $request->name;
        $email = $request->email;
        $password = $request->password;
        $user = user::where('email' ,$email)->first();
        if($user){
            
        if($user->password){
            if (Hash::check($password,$user->password)){
                    Auth::login($user);
                if($user->role =='admin'){
                return redirect()->route('dashboard');
             }
            else if ($user->role =='user'){
            return redirect()->route('userdashboard');
            }
            else{
            return redirect()->back()->with('error', 'Check Email , Password!');
             }
            return redirect()->back()->with('error', 'Check Email , Password!');
            }
        }
        return redirect()->back();
        }    
        return redirect()->back();
         }
   
    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('login');
        }
        return redirect()->route('login');
    }

         //User Display
         public function userDisplay(){
            $data =  user::paginate(10);
             return view('backend.manageUsers',compact('data'));
         }

             //Delete Record
            public function deleteUser($id){
                if(!$id){
                    return redirect()->back();
                }

            $users= user::find($id);
            if($users){
                $users->delete();
            }
            return redirect()->back();
            }

            public function userdetails($id)
            {
            if($id){
            $data['systemdata'] = system::find(1);
            $_SESSION['setting'] = $data['systemdata'];
            $data= user::where('id', $id)->get();
            return view('frontend.login.userdetails',compact('data'));
            }
            return redirect()->back();
            }

            
}
