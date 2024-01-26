@extends('backend.layout.master')
@section('title','Category')
@section('content')
<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Manage News
                            </h2>
                        </div>
                        <div class="body">
                            <table id="mainTable" class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>S.N</th>
                                    <th> Heading Name </th>
                                    <th> Sub Heading </th>
                                    <th> Description </th>
                                    <th> Status </th>
                                    <th> Category </th>
                                    <th> Links </th>
                                  
                                    <th> Image </th>
                                    <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($data as $new)
                          <tr>
                            <td> {{$loop->iteration}} </td>
                            <td>{{Illuminate\Support\Str::limit($new->heading,'20','...')}}</td>
                            <td>{{Illuminate\Support\Str::limit($new->subheading,'20','...')}}</td>
                            <td>{{Illuminate\Support\Str::limit($new->description,'30','...')   }}</td>
                            <td>{{$new->status}}</td>
                            <td>{{$new->category_id}}</td>
                            <td>{{Illuminate\Support\Str::limit($new->link,'5','...')   }}</td>
                            
                            
                            <td><img src="{{$new->image}}" heigth="160px" width="160px"></td>
                           
                            <td><a href="{{route('delete.news',$new->id)}}" class='btn btn-danger'>Delete</a>
                                <a href="{{route('news.edit',$new->id)}}" class='btn btn-primary'>edit</a></td>
                                </tr>
                            @empty
                            <td> No Record Found</td>
                            @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th><strong>TOTAL</strong></th>
                                        <th>{{$data->count()}}</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="row">
                                {{$data->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection