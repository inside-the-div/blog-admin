@extends('layouts.master')



@section('title')
<title>{{$email->name}}</title>
@endsection


@section('content')







<!-- page title area  -->
<div class="row">
  <div class="col-12">
    <div class="page-title-area">
      <a href="{{route('all-email')}}" class="btn_1">Back</a>
      <h1 class="font-josefin font-25">{{$email->name}}</h1>

    </div>
  </div>
</div>
<!-- end page title area  -->



  <div class="row">
    

		<div class="col-12 col-lg-8 offset-lg-2 mb-2">
	      <div class="single-email p-3 " @if($email->seen == 0) style="background: #dcdcdc;" @endif>
	        <span class="number font-josefin">1</span>
	        <h3 class="font-josefin font-25">{{$email->name}} <span class="font-josefin font-20 user-email">e: {{$email->email}}</span></h3>
	        <h3 class="font-josefin font-22 mt-2 ">{{$email->subject}}</h3>
	        <p class="mt-3 text-justify font-16 font-pt">{{$email->text}} <span><a href="" class="font-josefin font-16"></a></span></p>
	        <div class="text-right mt-3">
				
				<div class="row">
					<div class="col-4">
						<div class="text-left">
							<span class="font-josefin font-16">Date: {{$email->created_at}}</span>
						</div>
					</div>
					<div class="col-8">
						<form action="{{route('delete-email')}}" method="post" class="d-inline" >
							@csrf
							<input type="hidden" value="{{$email->id}}" name="id">
							<input type="submit" value="Delete" class="single-email-btn font-josefin bg-danger" style="cursor: pointer;">
						</form>
					</div>
				</div>
	          
	        </div>
	      </div>
	    </div>

		
  </div>


  @endsection