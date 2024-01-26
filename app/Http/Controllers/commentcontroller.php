<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use App\news;

class commentcontroller extends Controller
{
   public function commentinsert(Request $request){
   

    $data = [
        'category_id'=>$request->category_id,
        'user_id'=>$request->user_id,
        'comment'=>$request->comment,
        'news_id'=>$request->news_id,
   ];

   comment::insert($data);
   return redirect()->back();
}


     //Comment Display
     public function commentdisp(){
      $data['news'] =  news::all();

      $data= comment::paginate(10);
       return view('backend.manageComment',compact('data'));
   }

  //      //Delete Record
  public function deleteComment($id){
      if(!$id){
          return redirect()->back();
      }

     $comments= comment::find($id);
     if($comments){
      $comments->delete();
     }
     return redirect()->back();
     }
   }

