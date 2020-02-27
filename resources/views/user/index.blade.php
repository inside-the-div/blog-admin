@extends('layouts.master')



@section('title')
<title>All users</title>
@endsection


@section('content')

<!-- page title area  -->
<div class="row">
  <div class="col-12">
    <div class="page-title-area">
      <a href="{{route('add-user')}}" class="font-josefin">Add new user</a>
      <h1 class="font-josefin font-25">All users ({{count($users)}})</div></h1>
    </div>
  </div>
</div>
<!-- end page title area  -->


 <!-- website info area start  -->
  <div class="row mt-20 mx-1">
        <div class="col-12">
          <div class="card p-3 rounded-0 table-responsive">

          <table class="table table-striped table-dark display " id="dataTable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
         @php 
           $i= 0;
         @endphp
         @foreach($users as $user)
           @php 
             $i++;
           @endphp
              <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->created_at->format('Y-m-d')}}</td>
                <td><a href="" class="text-light">{{$user->email}}</a></td>
                <td>
                   <a href="{{route('show-user',['id' => $user->id])}}" class="btn btn-success rounded-0">View</a>
                   <a href="{{route('edit-user',['id' => $user->id])}}" class="btn btn-info rounded-0">Edit</a>
                   <form action="{{route('delete-user')}}" method="post" class="d-inline">
                     @csrf
                     <input type="hidden" value="{{$user->id}}" name="id">
                     <input type="submit" value="Delete" class="btn btn-danger rounded-0">
                   </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          </div>
        </div>
   
  </div>
  <!-- website info area end -->
@endsection