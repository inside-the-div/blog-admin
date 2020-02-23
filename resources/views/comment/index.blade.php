@extends('layouts.master')



@section('title')
<title>Comments</title>
@endsection


@section('content')

<!-- page title area  -->
<div class="row">
  <div class="col-12">
    <div class="page-title-area">
      <h1 class="font-josefin font-25">All Comments</h1>
    </div>
  </div>
</div>
<!-- end page title area  -->


<!-- website info area start  -->
 <div class="row mt-20">
       <div class="col-12">
         <div class="card p-3 rounded-0 table-responsive">

         <table class="table table-striped table-dark display " id="dataTable">
           <thead>
             <tr>
               <th scope="col">No</th>
               <th scope="col">Name</th>
               <th scope="col">Email</th>
               <th scope="col">Date</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody>
        @php 
          $i= 0;
        @endphp
        @foreach($comments as $comment)
          @php 
            $i++;
          @endphp
             <tr>
               <th scope="row">{{$i}}</th>
               <td>{{$comment->name}}</td>
               <td>{{$comment->email}}</td>
               <td>{{$comment->created_at->format('Y-m-d')}}</td>
               <td>
              	
					@if($comment->active == 0)
					<form action="{{route('show-comment')}}" method="post"  class="d-inline">
					  @csrf
					  <input type="hidden" value="{{$comment->id}}" name="id">
					  <input type="submit" value="Show" class="bg-success">
					</form>
					@else
					 <form action="{{route('hide-comment')}}" method="post"  class="d-inline">
					        @csrf
					        <input type="hidden" value="{{$comment->id}}" name="id">
					        <input type="submit" value="Hide" class="bg-info">
					  </form>
					@endif

                  <form action="{{route('delete-comment')}}" method="post" class="d-inline" >
                    @csrf
                    <input type="hidden" value="{{$comment->id}}" name="id">
                    <input type="submit" value="Delete" class="bg-danger">
                  </form>
                  <a href="{{route('details-comment',['id' => $comment->id])}}" class="btn_1 font-pt" style="font-size: 16px;">Details</a>
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