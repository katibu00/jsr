@extends('layouts.master')
@section('PageTitle', 'Bulk Edit Wards')


@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Bulk Edit Wards</span>

                <div class="card-header-elements ms-auto">
                   
                </div>
            </div>

            <div class="card-body">
                <div class="row">

                    <div class="col-md-3 mb-4">
                        <label for="index_lga" class="form-label">LGA</label>
                        <select id="index_lga" class="form-select">
                            <option value="">- LGA -</option>
                            @foreach ($lgas as $lga)
                                <option value="{{ $lga->id }}">{{ $lga->name }}</option>
                            @endforeach
                        </select>
                    </div>
                   
                </div>



                <div class="text-center d-flex justify-content-center my-5 d-none" id="loading_div">
                    <div class="spinner-border text-secondary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
               
                <div class="d-none" id="content_div">
                    @include('setup.edit_wards.table')
                </div>



            </div>

            
  
        </div>    
    </div>
    <!-- content @e -->

@endsection

@section('js')
    @include('setup.edit_wards.script')
    <script src="/sweetalert.min.js"></script>


@endsection
