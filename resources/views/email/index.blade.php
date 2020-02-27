@extends('layouts.master')



@section('title')
<title>All Emails</title>
@endsection


@section('content')







<!-- page title area  -->
<div class="row">
  <div class="col-12">
    <div class="page-title-area">
      
      <h1 class="font-josefin font-25">All Email ({{count($emails)}})</h1>

    </div>
  </div>
</div>
<!-- end page title area  -->



  <div class="row">
    

	@foreach($emails as $email)
		<div class="col-12 col-lg-8 offset-lg-2 mb-2">
	      <div class="single-email p-3 " @if($email->seen == 0) style="background: #dcdcdc;" @endif>
	        <span class="number font-josefin">1</span>
	        <h3 class="font-josefin font-25">{{$email->name}} <span class="font-josefin font-20 user-email">e: {{$email->email}}</span></h3>
	        <h3 class="font-josefin font-22 mt-2 ">{{$email->subject}}</h3>
	        <p class="mt-3 text-justify font-16 font-pt">{{substr($email->text,0,400)}} <span><a href="" class="font-josefin font-16">...More</a></span></p>
	        <div class="text-right mt-3">
				
				<div class="row">
					<div class="col-4">
						<div class="text-left">
							<span class="font-josefin font-16">Date: {{$email->created_at->format('Y-m-d')}}</span>
						</div>
					</div>
					<div class="col-8">
						<form action="{{route('delete-email')}}" method="post" class="d-inline" >
							@csrf
							<input type="hidden" value="{{$email->id}}" name="id">
							<input type="submit" value="Delete" class="single-email-btn font-josefin bg-danger" style="cursor: pointer;">
						</form>

						@if($email->seen == 0)
						<form action="{{route('seen-email')}}" method="post" class="d-inline" >
							@csrf
							<input type="hidden" value="{{$email->id}}" name="id">
							<input type="submit" value="Mark as seen" class="single-email-btn font-josefin bg-info" style="cursor: pointer;">
						</form>
						@else
						<form action="{{route('not-seen-email')}}" method="post" class="d-inline" >
							@csrf
							<input type="hidden" value="{{$email->id}}" name="id">
							<input type="submit" value="Mark as Not seen" class="single-email-btn font-josefin bg-info" style="cursor: pointer;">
						</form>
						@endif
						<a href="{{route('show-email',['id' => $email->id])}}" class="single-email-btn font-josefin bg-success">Details</a>

					</div>
				</div>
	          
	        </div>
	      </div>
	    </div>
	@endforeach

	<div class="col-12 f-right col-lg-8 offset-lg-2 mt-2" >
		<div class="te" style="float: right">
			{{ $emails->links() }}
		</div>
		
	</div>
		
  </div>


  @endsection