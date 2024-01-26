@extends('backend.layout.master')
@section('title','Category')
@section('content')
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               System Information 
                            </h2>
                           
                        </div>
                        <div class="body">
                        <form action="{{route('systemform')}}" method='POST'  enctype='multipart/form-data'>
                        @csrf
                        @forelse($data as $sdata)

                                <label >System Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="systemname" class="form-control" placeholder="System Name" value="{{$sdata->name ?? ''}}">
                                    </div>
                                </div>
                                <label >Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{$sdata->name ?? ''}}">
                                    </div>
                                </div>
                                <label >Phone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone "  value="{{$sdata->phone ?? ''}}">
                                    </div>
                                </div>
                                <label >Address</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="address" class="form-control" placeholder="Address"  value="{{$sdata->address ?? ''}}">
                                    </div>
                                </div>
                                <label >Copyright Date</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="date" class="form-control" placeholder="Copyright Date"  value="{{$sdata->date ?? ''}}">
                                    </div>
                                </div>
                                <label >Slogan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="slogan" class="form-control" placeholder="Slogan"  value="{{$sdata->slogan ?? ''}}">
                                    </div>
                                </div>
                                <label >Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="logo" class="form-control" placeholder="Image"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                    <a href='{{ asset("uploads/$sdata->logo")}}'  target='_blank'><img src='{{ asset("uploads/$sdata->logo")}}' heigth="160px" width="160px"></a>
                                </div>
                                </div>
                                @empty
                                @endforelse
                                
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
