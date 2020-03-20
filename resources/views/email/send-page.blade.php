@extends('layouts.master')

@section('title')
<title>Send Email</title>
@endsection


@section('content')







<!-- page title area  -->
<div class="row">
  <div class="col-12">
    <div class="page-title-area">
      <a href="{{route('all-email')}}" class="btn_1">Back</a>
      <h1 class="font-josefin font-25">Send an email</h1>

    </div>
  </div>
</div>
<!-- end page title area  -->

  <div class="row">
		<div class="col-12 col-lg-8 offset-lg-2 mb-2">
			<div class="card p-3 mt-3">
				<form action="{{route('send-email')}}" method="post">
					@csrf
					<label for="email" class="font-josefin font-16"><b>Email*</b></label>
					<input type="email" name="email" class="form-control rounded-0" >
					<label for="subject" class="mt-2 font-josefin font-16"><b>Subject*</b></label>
					<input type="text" name="subject" class="form-control rounded-0">

					<label for="message" class="mt-2 font-josefin font-16"><b>Message*</b></label>
					<textarea name="message"  cols="30" rows="5" class="form-control rounded-0 font-18"></textarea>
					<input type="submit" class="btn_1 mt-2" value="Send" id="email-send-btn"> 
				</form>
			</div>
	    </div>
  </div>
@endsection

@section('custom-script')
	<script>

		$(document).ready(function(){
			var m = '<p class="text-info font-18 font-josefin text-center">Please wait email sending ...</p>';
			$('#email-send-btn').click(function(){
				$("#success-message").html(m);
			})
			
		})
	</script>
@endsection