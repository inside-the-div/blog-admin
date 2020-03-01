@extends('layouts.master')

@section('custom-css')
	 <link href="{{URL::asset('summer-note/summernote-bs4.css')}}" rel="stylesheet">
@endsection



@section('title')
	<title>Update privacy policy</title>
@endsection


@section('content')

	<!-- page title area  -->
	<div class="row">
	  <div class="col-12">
	    <div class="page-title-area">
	      <h1 class="font-josefin font-25">Update privacy policy page</h1>
	    </div>
	  </div>
	</div>
	<!-- end page title area  -->

	<div class="row mt-2">
	  <div class="col-12 col-lg-6">
	    <div class="card rounded-0 p-3">
	  
	        <label for="left_text" class="mt-2"><b>Left text*</b></label>
	        <textarea  id="left_text" name="left_text" >{{$privacy->left_text}}</textarea>

	    </div>
	  </div>

	  <div class="col-12 col-lg-6">
	    <div class="card rounded-0 p-3">
	  
	        <label for="right_text" class="mt-2"><b>Right Text*</b></label>
	        <textarea  id="right_text" name="right_text" >{{$privacy->right_text}}</textarea>

	       	<a href="" class="btn btn-info mt-2 rounded-0" id="update_privacy">Upload</a>
	    </div>
	  </div>
	  <div class="col-12">
	  	<div id="post-message" class="mt-2"></div>
	  </div>
	</div>

@endsection

@section('custom-script')

<script src="{{URL::asset('summer-note\summernote-bs4.min.js')}}"></script>
<script>
		$(document).ready(function() {
		  $('#left_text').summernote({

		    placeholder: 'about description',
		    tabsize: 4,
		    height: 400,
		    padding:10,
		    toolbar: [
		      ['style', ['style']],
		      ['font', ['bold', 'underline', 'clear']],
		      ['color', ['color']],
		      ['para', ['ul', 'ol', 'paragraph']],
		      ['view', ['fullscreen', 'codeview', 'help']]
		    ]
		  });

		  $('#right_text').summernote({

		    placeholder: 'about description',
		    tabsize: 4,
		    height: 350,
		    padding:10,
		    toolbar: [
		      ['style', ['style']],
		      ['font', ['bold', 'underline', 'clear']],
		      ['color', ['color']],
		      ['para', ['ul', 'ol', 'paragraph']],
		      ['view', ['fullscreen', 'codeview', 'help']]
		    ]
		  });

		

		});
</script>

<script>
		$(document).ready(function() {

			var post_success_message ='<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">Update Privacy success !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			var post_empty_message ='<div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">Please fill all the fields!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

			$.ajaxSetup({
			    headers: {

			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});


			$("#update_privacy").click(function(e){

				
				var left_text = $('#left_text').summernote('code');
				var right_text = $('#right_text').summernote('code');
				
				if(right_text == "" || left_text == ""){
					$("#post-message").html(post_empty_message);
				}else{

					$.ajax({
					   type:'POST',
					   url:'/other/update-privacy',
					   data:{
					   	left_text:left_text,
					   	right_text:right_text
					   },
					   success:function(data){
					   	console.log(data.success)
					     $("#post-message").html(post_success_message);
					   }
					});

				}

				
				e.preventDefault();
			})
		});
</script>


@endsection