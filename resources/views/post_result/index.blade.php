@extends('layouts.master')
@section('PageTitle', 'Post Election Result ')
@section('content')

  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">

    <!-- Form Alignment -->
    <div class="card">
      {{-- <h5 class="card-header">Form Alignment</h5> --}}
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-center" style="min-height: 400px">
          <form class="w-px-600 border rounded p-3 p-md-" id="postResultForm">
            <h3 class="mb-4">Post Election Result</h3>
            <ul id="error_list"></ul>
            
            <div class="row g-3 mb-2">
             
              <div class="col-md-6">
                <select id="election" name="election_id" class="form-select form-select-sm">
                  <option value="">--Election--</option>
                  @foreach ($elections as $election)
                    <option value="{{ $election->id }}">{{ $election->title }}</option>
                  @endforeach
                </select>
             </div>

              <div class="col-md-6">
                    <select id="lga" name="lga_id" class="form-select form-select-sm">
                      <option value="">--LGA--</option>
                      @foreach ($lgas as $lga)
                        <option value="{{ $lga->id }}">{{ $lga->name }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <select id="ward" name="ward_id" class="form-select form-select-sm">
                      <option value="">--Ward--</option>
                    </select>
                </div>
           
         
                <div class="col-md-6">
                    <select id="pu" name="pu_id" class="form-select form-select-sm">
                      <option value="">--PU--</option>
                    </select>
                </div>
            </div>

            <div class="row" id="parties">
            </div>
            <p class="text-danger d-none" id="warning">Record Already Exist. Posting Again will Update the Records.</p>
            <div class="d-grid gap-2 mt-2">
              <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- / Content -->
  @endsection
  @section('js')
   @include('post_result.script')
  @endsection


