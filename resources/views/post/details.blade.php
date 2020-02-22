@extends('layouts.master')



@section('title')
<title>{{$post->name}}</title>
@endsection


@section('content')

<!-- page title area  -->
<div class="row">
  <div class="col-12">
    <div class="page-title-area">
      <a href="{{route('add-post')}}" class="font-josefin">Add new Post</a>
      <h1 class="font-josefin font-25">Single Post</h1>
    </div>
  </div>
</div>
<!-- end page title area  -->


<!-- website info area start  -->
 <div class="row mt-20">
    <div class="col-12 col-lg-10 offset-lg-1">
      <div class="card rounded-0 p-3">
        <div class="text-left">
          <h1>{{$post->name}}</h1>
          <span>Posted by: <a href="">{{$post->user->name}}</a> Date: <span>{{$post->created_at}}</span></span>
          <span><b>Category:</b>
          
            <?php 

              $str = '';
              foreach ($post->category as $key => $category) {
                  $str .= $category->name.', ';
              }
              echo rtrim($str, ", ");
            ?>


            
          </span>
        </div>
        <div class="post-body">
          <hr class="my-3">
          <span><b>Body: </b></span>
          {!! $post->body !!}
        </div>
        
        <div class="post-description">
          <hr class="my-3">
          <span><b>SEO Description: </b></span><br>
          {{$post->description}}
        </div>

        <div class="post-tag">
          <hr class="my-3">
          <span><b>SEO Tag: </b></span> <br>
          {{$post->tag}}
        </div>

        <div class="post-video">
          <hr class="my-3">
          <span>Video Link: {{$post->video}} || </span>
          <span>Code Link: {{$post->code}}</span>
        </div>




      </div>
    </div>
 </div>
 <!-- website info area end -->
@endsection