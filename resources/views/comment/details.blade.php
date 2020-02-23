@extends('layouts.master')



@section('title')
<title>{{$comment->name}}</title>
@endsection


@section('content')

<!-- page title area  -->
<div class="row">
  <div class="col-12">
    <div class="page-title-area">





      
    </div>
  </div>
</div>
<!-- end page title area  -->


<!-- website info area start  -->
 <div class="row mt-20">
    <div class="col-12 col-lg-6 offset-lg-3">
     
        <div class="text-left single-email p-3">
          <h1 class="font-20 font-pt">Name: {{$comment->name}}</h1>
          <h1 class="font-18 font-pt">Email: {{$comment->email}}</h1>
          <p class="mt-3 font-pt">{{$comment->text}}</p>
          <p class="mt-4">Date: {{$comment->created_at->format('Y-m-d')}}</p>

			<div class="text-right">
				<form action="{{route('delete-comment')}}" method="post" class="d-inline">
				  @csrf
				  <input type="hidden" value="{{$comment->id}}" name="id">
				  <input type="hidden" value="single_page" name="single_page">
				  <input type="submit" value="Delete" class="bg-danger">
				</form>
				

				@if($comment->active == 0)
				<form action="{{route('show-comment')}}" method="post" class="d-inline">
				  @csrf
				  <input type="hidden" value="{{$comment->id}}" name="id">
				  <input type="submit" value="Show" class="bg-info">
				</form>
				@else
				<form action="{{route('hide-comment')}}" method="post" class="d-inline">
				  @csrf
				  <input type="hidden" value="{{$comment->id}}" name="id">
				  <input type="submit" value="Hide" class="bg-danger">
				</form>
				@endif
			</div>
        </div>


      <div class="single-email p-3 mt-2">
    	<h1 class="font-20 font-pt">Post Title: <a href="{{route('show-post',['id' => $post->id])}}">{{$post->name}}</a></h1>
    	<h1 class="font-20 font-pt">Post date: {{$post->created_at->format('Y-m-d')}}</h1>
      </div>
     
     
    </div>


   
 </div>
 <!-- website info area end -->
@endsection