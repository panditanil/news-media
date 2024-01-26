@extends('backend.layout.master')
@section('title','Category')
@section('content')



@if(session('success'))
    <div class="alert alert-success">
         {{ session('success') }}
    </div>
@endif
<div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                        <div class="header">
                            <h2>
                               News Form
                            </h2>
                           
                        </div>
                    <div class="body">
                        <form action="{{route('news.data')}}" method='POST'  enctype='multipart/form-data'>
                            @csrf
                            <label >Created_By</label>
                                <div class="form-group"> 
                                <select  name="Created_By"> 
                                    <option value="Admin">Admin</option>
                                    </select >
                                </div>
                                <label >Admin Name</label>
                                <div class="form-group"> 
                                <select  name="user_id"> 
                                    <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                    </select >
                                </div>
                                <label >Heading</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    @if($errors->first('heading'))
                                            <span style='color:red;'>{{$errors->first('heading')}}</span>
                                            @endif 
                                        <input type="text" name="heading" class="form-control"   value="{{ old('heading') }}" placeholder="Enter Heading">
                                       
                                    </div>
                                </div>
                                <label >Sub Heading</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    @if($errors->first('subheading'))
                                            <span style='color:red;'>{{$errors->first('subheading')}}</span>
                                            @endif
                                        <input type="text" name="subheading" class="form-control" value="{{ old('subheading') }}" placeholder="Enter Heading">

                                    </div>
                                </div>
                                <label >Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    @if($errors->first('image'))
                                            <span style='color:red;'>{{$errors->first('image')}}</span>
                                            @endif 
                                        <input type="file" name="image" value="{{ old('image') }}" class="form-control" placeholder="Image">
                                    </div>
                                </div>
                                <label >Video Link</label>
                                <div class="form-group">
                                    <div class="form-line">                                    
                                        <input type="text" name="link" value="{{ old('link') }}" class="form-control" placeholder="Video Link">
                                    </div>
                                </div>
                                <label for="password">Category</label>
                                <div class="form-group"> 
                                <select  name="category_id"> 
                                @forelse($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @empty
                                    <option value="">No Category</option>
                                    @endforelse
                                    </select >
                                </div>
                                <div class="form-group">
                                <label for="password">Status</label>  
                                <select name ='status'> 
                                        <option  value='1' > Active</option>
                                        <option  value='0'> Inactive</option>
                                    </select >
                                </div>

                                <label >Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    @if($errors->first('description'))
                                            <span style='color:red;'>{{$errors->first('description')}}</span>
                                            @endif  
                                    <textarea id="tiny" class="form-control" value="{{ old('description') }}" id="exampleTextarea1" placeholder="Description" rows="8" name="description"  value="{{ old('description') }}"></textarea>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
 </div>
            @endsection
