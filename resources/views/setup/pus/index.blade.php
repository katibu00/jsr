@extends('layouts.master')
@section('PageTitle', 'Polling Units')


@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Polling Units</span>

                <div class="card-header-elements ms-auto">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addNewModal" class="btn btn-sm btn-primary">
                        <span class="tf-icon ti ti-plus ti-xs me-1"></span>Add PU(s)
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">

                    <div class="col-md-3 mb-4">
                        <label for="index_lga" class="form-label">LGA</label>
                        <select id="index_lga" class="form-select" da4ta-allow-clear="true">
                            <option value="">- LGA -</option>
                            @foreach ($lgas as $lga)
                                <option value="{{ $lga->id }}">{{ $lga->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="index_ward" class="form-label">Ward</label>
                        <select id="index_ward" class="form-select" data4-allow-clear="true">
                            <option value="">- Ward -</option>
                        </select>
                    </div>
                </div>



                <div class="text-center d-flex justify-content-center my-5 d-none" id="loading_div">
                    <div class="spinner-border text-secondary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
               
                <div class="d-none" id="content_div">
                    @include('setup.pus.table')
                </div>



            </div>

            
    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

                <div class="row mb-2">
                    <div class="col-md-7">
                        <input type="text" name="name[]" class="form-control mb-2" placeholder="Enter PU Name" required />
                    </div>
                    <div class="col-lg-3">
                        <input type="number" class="form-control mb-2" name="voters[]"  placeholder="Registered Voters" required />
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex">
                            <span class="btn btn-success  addeventmore me-2"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger  removeeventmore"><i class="fa fa-minus-circle"></i></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

        </div>
        <!--/ Basic Bootstrap Table -->
        @include('setup.pus.add_modal')
        @include('setup.pus.edit_modal')
    </div>
    <!-- content @e -->

@endsection

@section('js')
    @include('setup.pus.script')
    <script src="/sweetalert.min.js"></script>


@endsection
