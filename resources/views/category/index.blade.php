@extends('layouts.master')



@section('title')
<title>Category</title>
@endsection


@section('content')

<!-- website info area start  -->
 <div class="row">
	<div class="col-12">
		<h3 class="font-25 font-josefin d-inline">All Categories</h3>
		<button class="btn_1 font-18 font-pt" type="button" data-toggle="modal" data-target="#exampleModal">Add New category</button>
	</div>
 </div>

 <div class="row mt-2">
   <div class="col-12">
     <div class="card p-3 rounded-0 table-responsive">

     <table class="table table-striped table-dark display " id="dataTable">
       <thead>
         <tr>
           <th scope="col">No</th>
           <th scope="col">Name</th>
           <th scope="col">Date</th>
           <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
		@php 
			$i= 0;
		@endphp
		@foreach($categorys as $category)
			@php 
				$i++;
			@endphp
         <tr>
           <th scope="row">{{$i}}</th>
           <td>{{$category->name}}</td>
           <td>{{$category->created_at->format('Y-m-d')}}</td>
           <td>
           		<a href="{{route('show-category', ['id' => $category->id])}}" class="btn btn-success rounded-0">View</a>



             @if(!in_array($category->name,$not_edit_delete))
              <a  href="{{route('edit-category', ['id' => $category->id])}}" class="btn btn-info rounded-0">Edit</a>
              <form action="{{route('delete-category')}}" method="post" class="d-inline">
                @csrf
                <input type="hidden" value="{{$category->id}}" name="id">
                <input type="submit" value="Delete" class="btn btn-danger rounded-0">
              </form>
             @else
               <a  href="{{route('error-page')}}" class="btn btn-secondary rounded-0">Edit</a>
               <a  href="{{route('error-page')}}" class="btn btn-secondary rounded-0">Delete</a>
             @endif


           </td>
         </tr>
       @endforeach
       </tbody>
     </table>
     </div>
   </div>
 </div>
 <!-- website info area end -->


<!-- category add modal -->

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-20 font-josefin" id="exampleModalLabel">Add new category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<form action="{{route('add-category')}}" method="post">
			@csrf
			<div class="modal-body">
				<label for=""><b>Name*</b></label>
				<input type="text" class="form-control rounded-0 mb-2" name="name">

				<label for=""><b>Description*</b></label>
				<textarea name="description" id="" cols="30" rows="5" class="form-control rounded-0 mb-2"></textarea>

				<label for=""><b>Tag*</b></label>
				<textarea name="tag" id="" cols="30" rows="5" class="form-control rounded-0 mb-2"></textarea>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger font-18" data-dismiss="modal">Close</button>
				<input type="submit" class="btn_1 font-18" value="Add" name="submit">
			</div>

		</form>

    </div>
  </div>
</div>


@endsection