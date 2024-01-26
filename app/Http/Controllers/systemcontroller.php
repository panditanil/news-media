<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\system;

class systemcontroller extends Controller
{
    public function systemdata (Request $request){
   
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'slogan' => 'required',
        //     'logo' => 'required'
        // ]);
        
        $logo = '';
       
        if($request->has('logo') &&  $request->file('logo')){
            $setting  = system::find(1);
            if($setting && $setting->logo){
                 if(file_exists(public_path("/uploads/$setting->logo"))){
                    unlink(public_path("uploads/$setting->logo"));
                 }
            }
 
         $file  = $request->file('logo');
         $newName = time().'-'. rand(10,9999999999999).'-'.$file->getClientOriginalName();
         $newPath = public_path()."/uploads/";
         $file->move($newPath, $newName);
         $logo = $newName;
        }
       

        $record = system::find(1);
        if ($record) {
          // If the record exists, update it
          $record->update([
            'name'=>$request->systemname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'date'=>$request->date,
            'slogan'=>$request->slogan,
            'logo'=>$logo,
          ]);
          return redirect()->back()->with('success', 'Record updated successfully.');
      } 
      
      else {   
        system::create([
            'name'=>$request->systemname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'date'=>$request->date,
            'slogan'=>$request->slogan,
            'logo'=>$logo,
        ]); 
        return redirect()->back()->with('success', 'Record updated successfully.');  
      }
       }


       //Display Data
       public function displaysystemData(){
        $data= system::all();
         return view('backend.systeminfo',compact('data'));
         return view('backend.common.sidebar',compact('data'));
     }

     public function systemdetails()
     {
     $data['systemdata'] = system::find(1);
     $_SESSION['setting'] = $data['systemdata'];
     $data= system::all();
     return view('frontend.aboutus',compact('data'));
     }




}
