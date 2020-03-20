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
    
	@php
		$i=0;
	@endphp
	@foreach($emails as $email)
	@php
		$i++;
	@endphp
		<div class="col-12 col-lg-8 offset-lg-2 mb-2">
	      <div class="single-email p-3 " @if($email->seen == 0) style="background: #dcdcdc;" @endif>
	        <span class="number font-josefin">No: {{$i}} / Id: {{$email->id}}</span>
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
							<input type="submit" value="Mark as Not seen" class="single-email-btn font-josefin bg-primary" style="cursor: pointer;">
						</form>
						@endif
						<a href="{{route('show-email',['id' => $email->id])}}" class="single-email-btn font-josefin bg-success">Details</a>

						<button  data-email="{{$email->email}}" type="button" class="single-email-btn font-josefin bg-info border-0 replay-btn" data-toggle="modal" data-target="#exampleModal">Replay</button>
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


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Replay Email</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
			<form action="{{route('send-email')}}" method="post">
				@csrf
				<label for="email" class="font-josefin font-16"><b>Email*</b></label>
				<input type="email" name="email" class="form-control rounded-0" value="" id="ready-email">
				<label for="subject" class="mt-2 font-josefin font-16"><b>Subject*</b></label>
				<input type="text" name="subject" class="form-control rounded-0">

				<label for="message" class="mt-2 font-josefin font-16"><b>Message*</b></label>
				<textarea name="message"  cols="30" rows="5" class="form-control rounded-0 font-18"></textarea>
				<input type="submit" class="btn_1 mt-2" value="Replay" id="email-send-btn"> 
			</form>

        </div>

      </div>
    </div>
  </div>

  @endsection
@section('custom-script')
  <script>
  		$(document).ready(function() {
	  		$(".replay-btn").click(function(){
	  			var email = $(this).data('email');
	  			$("#ready-email").val(email);
	  		})
  		});
  </script>
@endsection