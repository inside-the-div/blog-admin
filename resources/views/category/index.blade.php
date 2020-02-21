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