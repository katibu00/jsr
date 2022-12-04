@extends('layouts.master')
@section('PageTitle', 'Agents ')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
	

	<div class="row mb-5">
	 
	 
	 

	  <div class="col-md">
		<div class="card mb-4">
		  <div class="card-body">
			
			<div class="card-title header-elements  d-flex flex-row">
			  <h5 class="m-0 me-2 d-none d-md-block">Agents</h5>
			  

			  <div class="card-title-elements ms-auto">
				<select class="form-select form-select-sm w-auto">
				  <option selected="">Option 1</option>
				  <option>Option 2</option>
				  <option>Option 3</option>
				</select>
				<select class="form-select form-select-sm w-auto">
				  <option selected="">Option 1</option>
				  <option>Option 2</option>
				  <option>Option 3</option>
				</select>
				<button type="button" class="btn btn-xs btn-primary" data-bs-toggle="modal" data-bs-target="#addNewModal">
					<span class="tf-icon ti ti-plus ti-xs me-1"></span>Add
				</button>
			  </div>
			</div>

			@include('users.agents.table')
			@include('users.agents.details_modal')
		  </div>
		</div>
	  </div>
	</div>
	<!--/ Header elements -->


	@include('users.agents.add_modal')
	
  </div>

@endsection

@section('js')
    @include('users.agents.script')
    <script src="/sweetalert.min.js"></script>
@endsection