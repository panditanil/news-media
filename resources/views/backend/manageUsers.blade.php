@extends('backend.layout.master')
@section('title','Manage Users')
@section('content')
<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Manage Users
                            </h2>
                        </div>
                        <div class="body">
                            <table id="mainTable" class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>S.N</th>
                                    <th>User Name </th>>
                                    <th>Email </th>>
                                    <th>Role </th>>
                                    <th>Image </th>>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                @forelse($data as $user)
                          <tr>
                            <td> {{$loop->iteration}} </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td><img src="{{$user->profile}}" heigth="70px" width="70px"></td>
                            <td><a href="{{route('delete.user',$user->id)}}" class='btn btn-danger'>Delete</a>
                            </td>
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