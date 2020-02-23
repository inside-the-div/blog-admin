@extends('layouts.master')



@section('title')
<title>{{$post->name}}</title>
@endsection


@section('content')

<!-- page title area  -->
<div class="row">
  <div class="col-12">
    <div class="page-title-area">
      <a href="{{route('add-post')}}" class="font-pt btn-1">Add new Post</a>
      <a href="{{route('edit-post',['id' => $post->id])}}" class="font-pt btn-2">Edit This post</a>
      

      <form action="{{route('delete-post')}}" method="post" class="d-inline">
        @csrf
        <input type="hidden" value="{{$post->id}}" name="id">
        <input type="hidden" value="single_page" name="single_page">
        <input type="submit" value="Delete this Post" class=" btn-3">
      </form>
      
    </div>
  </div>
</div>
<!-- end page title area  -->


<!-- website info area start  -->
 <div class="row mt-20">
    <div class="col-12 col-lg-7">
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

    <div class="col-lg-5 col-12" style="max-height: 90vh; overflow-y: scroll;">
      <div class="card rounded-0 p-3">
        <div class="comments">
          <h2 class="font-josefin font-25">ALl Comments <div class="btn_1 font-14 font-pt">{{count($post->comments)}}</div></h2>
          <hr class="my-3">
          <?php
              $i = 0;
           ?>
          @foreach($post->comments as $comment)
            <?php $i++; ?>
            <div class="single-email p-3 mb-2 @if($comment->active == 1) active-comment @endif">
              <div class="number">{{$i}}</div>
              <h3 class="font-20 font-josefin"><b>Name: </b>{{$comment->name}}</h3>
              <h3 class="font-18 font-josefin user-email"><b>Email: </b>{{$comment->email}}</h3>
              <p class="font-16 font-josefin"><b>Comment: </b>{{$comment->text}}</p>
              
              <div class="row mt-4">
                <div class="col-6">
                  <p class="font-14 font-josefin text-left"><b>Date-Time:</b> {{$comment->created_at}}</p>
                </div>
                <div class="col-6">
                  <div class="text-right">
                    
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


                    <form action="{{route('delete-comment')}}" method="post"  class="d-inline">
                      @csrf
                      <input type="hidden" value="{{$comment->id}}" name="id">
                      <input type="submit" value="Delete" class="bg-danger">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          
        </div>
      </div>
    </div>
 </div>
 <!-- website info area end -->
@endsection