@extends('backend.layout.master')
@section('title','Category')
@section('content')
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               News Form
                            </h2>
                           
                        </div>
                        <div class="body">
                        <form action="{{route('news.update',$cat_data->id)}}" method='POST' enctype='multipart/form-data' >
                            @csrf
                            <label >Created_By</label>
                                <div class="form-group"> 
                                <select  name="Created_By"> 
                                    <option value="{{$cat_data->Created_By}}">User</option>
                                    </select >
                                </div>
                                <label >User Name</label>
                                <div class="form-group"> 
                                <select  name="user_id"> 
                                    <option value="{{$cat_data->user_id}}">{{Auth::user()->name}}</option>
                                    </select >
                                </div>
                                <label >Heading</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="heading" class="form-control" value="{{$cat_data->heading ?? ''}}" placeholder="Enter Heading">
                                    </div>
                                </div>
                                <label >Sub Heading</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="subheading" class="form-control" value="{{$cat_data->subheading ?? ''}}" placeholder="Enter Heading">
                                    </div>
                                </div>
                                <label >Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                      
                                    </div>
                                    <img src="{{$cat_data->image ?? ''}}" height="50px" width="50px">
                                </div>
                                <label >Video Link</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="link" class="form-control" placeholder="Video Link" value="{{$cat_data->link ?? ''}}">
                                    </div>
                                </div>
                                <label >Category</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="category_id" class="form-control" placeholder="Video Link" value="{{$cat_data->category->id ?? ''}}">{{$cat_data->category->name ?? ''}}
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                <label >Status</label>
                                <select value="{{$cat_data->status ?? ''}}" name ='status'> 
                                        <option  value='1' > Active</option>
                                        <option  value='0'> Inactive</option>
                                    </select >
                                </div>

                                <label >Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    <textarea id="tiny" class="form-control" id="exampleTextarea1" placeholder="Description" rows="8"  value="{{$cat_data->description}}" name="description">{{$cat_data->description}} </textarea>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
