@extends('layouts.master')
@section('PageTitle', 'Agents ')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
	

	<div class="row mb-5">
	 
	 
	 

	  <div class="col-md">
		<div class="card mb-4">
		  <div class="card-body">
			
			<div class="card-title header-elements  d-flex flex-row">
			  <h5 class="m-0 me-2 d-none d-md-block">Users</h5>
			  

			  <div class="card-title-elements ms-auto">
				<select class="form-select form-select-sm w-auto" id="sort_lga">
				  <option value="all" selected>All LGA</option>
				  @foreach ($lgas as $lga)
				  <option value="{{ $lga->id }}">{{ $lga->name }}</option>
				  @endforeach
				</select>
				<select class="form-select form-select-sm w-auto" id="sort_user">
				  <option value="all">All Users</option>
				  <option value="admin">Admins</option>
				  <option value="coordinator">LG Coordinator</option>
				  <option value="ward">Ward Coordinator</option>
				  <option value="agent">Agents</option>
				</select>
				<button type="button" class="btn btn-xs btn-primary" data-bs-toggle="modal" data-bs-target="#addNewModal">
					<span class="tf-icon ti ti-plus ti-xs me-1"></span>Add
				</button>
			  </div>
			</div>

			<div class="text-center d-flex justify-content-center my-5 d-none" id="loading_div">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

			<div class="" id="content_div">
				@include('users.agents.table')
			</div>
			
		  </div>
		</div>
	  </div>
	</div>
	<!--/ Header elements -->

	@include('users.agents.details_modal')
	@include('users.agents.add_modal')
	
  </div>

@endsection

@section('js')
    @include('users.agents.script')
    <script src="/sweetalert.min.js"></script>
@endsection