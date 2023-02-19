@extends('layouts.master')
@section('PageTitle', 'Elections ')
@section('css')

<link rel="stylesheet" href="/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css" />

@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
       

        <!-- Bootstrap Maxlength -->
        <div class="col-12">
            <div class="card mb-4">
                <h5 class="card-header">Commnication</h5>
                <div class="card-body">
                    <form action="{{ route('communication.send') }}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <label for="lga" class="form-label">LGA</label>
                            <select class="form-select" name="lga_id" id="lga" aria-label="Default select example">
                              @foreach ($lgas as $lga)
                              <option value="{{ $lga->id }}">{{ $lga->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="ward" class="form-label">Ward</label>
                            <select class="form-select" name="ward_id" id="ward" aria-label="Default select example">
                              <option value="all">All</option>
                              
                            </select>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="form-label" for="message">Message</label>
                            <textarea id="message" name="message" class="form-control bootstrap-maxlength-example" rows="3" maxlength="160"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Bootstrap Maxlength -->

    </div>
</div>
@endsection

@section('js2')

@include('communication.script')
<script src="/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="/assets/js/forms-extras.js"></script>
@endsection
