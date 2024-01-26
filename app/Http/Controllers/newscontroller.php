<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\news;
use App\category;
use App\system;
use App\usermail;
use App\comment;
use App\user;
use App\Mail\newsmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class newscontroller extends Controller
{
    //Data Insert
    public function newscreate(Request $request){
     
      $rules = [
        'heading' => 'required',
        'subheading'=>'required',
        'description'=>'required',
        'category_id'=>'required',
        'status'=>'required',
        'image'=>'required',
        'Created_By'=>'required',
        'user_id'=>'required',
       
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
        $data = [
            'heading'=>$request->heading,
            'subheading'=>$request->subheading,
            'description'=>$request->description,
            'status'=> $request->status,
            'image'=>$image_url,
            'link'=>$request->link,
            'category_id'=>$request->category_id,
            'Created_By'=>$request->Created_By,
            'user_id'=>$request->user_id
       ];
    
       news::insert($data);
       return redirect()->back()->with('success', 'Inserted successfully!');
    }

  
     //Category Display
     public function displayData(){
        $data['categories']= category::where('status',1)->get();
         return view('backend.news.create',$data);
     }
  

     //News Display
     public function displaynews(){
        $data= news::paginate(10);
         return view('backend.news.display',compact('data'));
     }

          //Edit Data
          public function editnews($id)
          {
           if(!$id){
               return redirect()->back();
           }
           $category=category::all();
           $cat_data= news::find($id);
          if($cat_data){
           return view('backend.news.edit',compact('cat_data','category'));
          }
          return redirect()->back();
          }

 

    //      //Delete Record
    public function deletenews($id){
        if(!$id){
            return redirect()->back();
        }

       $cat_data= news::find($id);
       if($cat_data){
        $cat_data->delete();
       }
       return redirect()->back();
       }


           //Update Data
           public function updatenews(Request $request,$id)
           {

            if(!$id){
                return redirect()->back();
            }
            $cat_data= news::find($id);
{
            $data = [
                'heading'=>$request->heading,
                'subheading'=>$request->subheading,
                'description'=>$request->description,
                'status'=> $request->status,
                'link'=>$request->link,
                'category_id'=>$request->category_id,
                'Created_By'=>$request->Created_By,
                'user_id'=>$request->user_id

           ];
           $cat_data->update($data);
          return redirect()->route('display.news');
            
           }
           return redirect()->back();
        }
        
        //News Details
        public function newsdetails($id){

            if(!$id){
              return redirect()->back();
            }
            $data['news'] =  news::with('comments')->find($id);
            $data['system'] = system::find(1);
            $_SESSION['setting'] = $data['system'];
              $news = $data['news'];
            if($data['news']){
              $data['related'] = news::whereHas('category', function($query) use ($news) {
                
                $query->where('id','!=', $news->category->id);
              })->take(4)->get();
              return view('frontend.newsdetails', $data);
            }

            if(!$id){
              session()->flash('error','news Not Found!');
              return redirect()->back();
            }
      
        }
        
        //mail
  public function usermails(Request $request,$id){
    if(!$id){
      return redirect()->back();
    }
    $nwss =  news::find($id);
    $data['system'] = system::find(1);
      $_SESSION['setting'] = $data['system'];

      $newsNo = rand(10,9999999999999);
    if($nwss){
     
      $data = [
        'news_no' => $newsNo,
        'user_id' => auth()->user()->id,
        'news_id' =>$id
      ];
    
     $newsmail =  usermail::create($data);
     if($newsmail){
      $to = auth()->user()->email;
      Mail::to($to)->send(new newsmail($newsmail));
     }
    }
  } 

  //Search Post
public function search(Request $request)
{
  $searchterm =$request->search;
  $query=news::query();
  $data['systemdata'] = system::find(1);
  $_SESSION['setting'] = $data['systemdata'];
  
  if($searchterm){
    $query->where('heading','LIKE','%'.$searchterm.'%')
            ->orWhere('description','LIKE','%'.$searchterm.'%')
            ->orWhere('subheading','LIKE','%'.$searchterm.'%');
            $data['newss']=$query->get();
            return view('frontend.result',$data);
  }
  else{
    return redirect()->back();
  }
}

//Admin Dashboard
public function dashboard(){
  $data= news::all();
  $comments=comment::all();
  $users=user::where('role','user')->get();
  $category=category::all();
  $data['systemdata'] = system::find(1);
  $_SESSION['setting'] = $data['systemdata'];
   return view('backend.layout.details',compact('data','comments','users','category'));
}

    //Category Display
     public function catData(){
        $data['categories']= category::where('status',1)->get();
        $data['system'] = system::find(1);
        $_SESSION['setting'] = $data['system'];
         return view('frontend.newscreate',$data);
     }

     //News Display
     public function usernews(){
      $data= news::where('status', 0)->paginate(10);
       return view('backend.news.newsrequest',compact('data'));
   }


}


