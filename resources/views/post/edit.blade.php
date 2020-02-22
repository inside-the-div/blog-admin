@extends('layouts.master')

@section('custom-css')
	 <link href="{{URL::asset('summer-note/summernote-bs4.css')}}" rel="stylesheet">
@endsection



@section('title')
	<title>{{$post->name}}</title>
@endsection


@section('content')

	<!-- page title area  -->
	<div class="row">
	  <div class="col-12">
	    <div class="page-title-area">
	      <a href="" class="font-josefin">All Posts</a>
	      <h1 class="font-josefin font-25">Add new Post</h1>
	      
	    </div>
	  </div>
	</div>
	<!-- end page title area  -->

	<div class="row mt-2">
	  <div class="col-12 col-lg-10 offset-lg-1">
	    <div class="card rounded-0 p-3">
	  

	        <label for="title"><b>Title*</b></label>
	        <input type="text" name="post_title" id="title" class="form-control rounded-0" value="{{$post->name}}">

	        <label for="post_body" class="mt-2"><b>Post Body*</b></label>
	        <textarea  id="post_body" name="post_body">{{$post->body}}</textarea>


	        <label for="category" class="mt-2"><b>Category*</b></label>
	        <select name="category[]" id="category" class="form-control rounded-0" multiple>

	         <?php 
	         	$f = 0;
	         	foreach ($categorys as $category) {
	         		$f = 0;
	         		foreach ($post->category  as $selected_category) {
	         			if($category->name == $selected_category->name){
	         				$f = 1;
	         				break;
	         			}
	         		}
	         		if($f){
	         			echo '<option selected class="font-josefin font-16 py-2" value="'.$category->name.'">'.$category->name.'</option>';
	         		}else{
	         			echo '<option  class="font-josefin font-16 py-2" value="'.$category->name.'">'.$category->name.'</option>';
	         		}
	         	}

	         ?>

	          
	        </select>


	        <label for="video" class="mt-3"><b>Youtube Video URL</b></label>
	        <input type="text" class="form-control rounded-0" id="video" value="{{$post->video}}">
			

			<label for="code" class="mt-3"><b>Source code link</b></label>
			<input type="text" class="form-control rounded-0" id="code" value="{{$post->code}}">

	       <label for="tag" class="mt-3"><b>Tag* (<span class="text-info">For SEO</span>)</b></label>
	       <textarea name="" id="tag" cols="30" rows="4" class="form-control rounded-0">{{$post->tag}}</textarea>

	       <label for="description" class="mt-3"><b>Short Description between 50–160 characters* (<span class="text-info">For SEO</span>)</b></label>
	       <textarea name="" id="description" cols="30" rows="4" class="form-control rounded-0">{{$post->description}}</textarea>
			

			<input type="hidden" value="{{Auth::user()->id}}" id="user_id">
			<input type="hidden" value="{{$post->id}}" id="post_id">
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
		  $('#post_body').summernote({

		    placeholder: 'Post body',
		    tabsize: 4,
		    height: 400,
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

			var post_success_message ='<div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">Post Update Success !!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

			var post_danger_message ='<div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">Please fill all the fields !!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';



			$.ajaxSetup({
			    headers: {

			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});


			$("#post_upload").click(function(e){

				var title = $("#title").val();
				var body = $('#post_body').summernote('code');
				var description = $("#description").val();
				var tag = $("#tag").val();
				var category = $("#category").val();
				var video = $("#video").val();
				var code = $("#code").val();
				var user_id = $("#user_id").val();
				var post_id = $("#post_id").val();
				

				if(title == "" || body == "" || description == "" || code == "" || category == "" || video == "" || tag == ""){
					$("#post-message").html(post_danger_message);
				}else{

					$.ajax({
					   type:'POST',

					   url:'/posts-update',

					   data:{
					   	title:title,
					   	body:body, 
					   	description:description,
					   	tag:tag,
					   	category:category,
					   	video:video,
					   	code:code,
					   	user_id:user_id,
					   	post_id:post_id
					   },

					   success:function(data){
					     $("#post-message").html(post_success_message);
					   }
					});

				}

				
				e.preventDefault();
			})
		});
</script>


@endsection