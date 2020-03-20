@extends('layouts.master')

@section('custom-css')
	 <link href="{{URL::asset('summer-note/summernote-bs4.css')}}" rel="stylesheet">
@endsection



@section('title')
	<title>Update about me</title>
@endsection


@section('content')

	<!-- page title area  -->
	<div class="row">
	  <div class="col-12">
	    <div class="page-title-area">
	      <h1 class="font-josefin font-25">Update about page</h1>
	    </div>
	  </div>
	</div>
	<!-- end page title area  -->

	<div class="row mt-2">
	  <div class="col-12 col-lg-10 offset-lg-1">
	    <div class="card rounded-0 p-3">
	  

	        <label for="title"><b>Title*</b></label>
	        <input type="text" name="title" id="title" class="form-control rounded-0" value="{{$about->title}}">

	        <label for="title"><b>Sub Title*</b></label>
	        <input type="text" name="sub_title" id="sub_title" class="form-control rounded-0" value="{{$about->sub_title}}">

	        <label for="about_me" class="mt-2"><b>Description*</b></label>
	        <textarea  id="about_me" name="about_me" >{{$about->about}}</textarea>


	       	<a href="" class="btn btn-info mt-2 rounded-0" id="post_upload">Upload</a>
	      	<div id="post-message" class="mt-2"></div>
	    </div>
	  </div>
	</div>

@endsection

@section('custom-script')

<script src="{{URL::asset('summer-note\summernote-bs4.min.js')}}"></script>
<script>
		$(document).ready(function() {
		  $('#about_me').summernote({

		    placeholder: 'about description',
		    tabsize: 4,
		    height: 400,
		    padding:10,
		    toolbar: [
		      ['style', ['style']],
		      ['font', ['bold', 'underline', 'clear']],
		      ['color', ['color']],
		      ['fontsize', ['fontsize']],
		      ['para', ['ul', 'ol', 'paragraph']],
		      ['view', ['fullscreen', 'codeview', 'help']]
		    ]
		  });

		

		});
</script>

<script>
		$(document).ready(function() {

			var post_success_message ='<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">Update about me success !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
			var post_empty_message ='<div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">Please fill all the fields!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

			$.ajaxSetup({
			    headers: {

			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});


			$("#post_upload").click(function(e){

				var title = $("#title").val();
				var sub_title = $("#sub_title").val();
				var about_me = $('#about_me').summernote('code');
				
				if(title == "" || sub_title == "" || about_me == ""){
					$("#post-message").html(post_empty_message);
				}else{

					$.ajax({
					   type:'POST',
					   url:'/other/update-about-me',
					   data:{
					   	title:title,
					   	sub_title:sub_title, 
					   	about_me:about_me
					   },
					   success:function(data){
					   	//console.log(data.success)
					     $("#post-message").html(post_success_message);
					   }
					});

				}

				
				e.preventDefault();
			})
		});
</script>


@endsection