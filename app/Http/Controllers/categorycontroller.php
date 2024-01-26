<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\news;

class categorycontroller extends Controller
{
    // Insert Data
    public function categorydata(Request $request){
        $data = [
            'name' =>$request->catename,
            'status' => $request->status,
       ];
       
       category::insert($data);
       return redirect()->route('admin.display');
    }

    //Display Data
    public function displayData(){
        $data= category::all();
         return view('backend.category.display',compact('data'));
     }

     //Edit Data
     public function edit($id)
       {
        if(!$id){
            return redirect()->back();
        }
        $cat_data= category::find($id);
       if($cat_data){
        return view('backend.category.edit',compact('cat_data'));
       }
       return redirect()->back();
       }

    //Update Data
       public function update(Request $request,$id)
       {
        if(!$id){
            return redirect()->back();
        }
        $cat_data= category::find($id);
       if($cat_data){
        $data=[
            'name' =>$request->catename,
            'status' => $request->status,
        ];
       $cat_data->update($data);
      return redirect()->route('admin.display');
        
       }
       return redirect()->back();
    }

    //Delete Record
    public function delete($id){
        if(!$id){
            return redirect()->back();
        }

       $cat_data= category::find($id);
       if($cat_data){
        $cat_data->delete();
       }
       return redirect()->back();
       }


       

}
