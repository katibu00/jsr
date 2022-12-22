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
                   Your Balance is: {{ $balance }}
                </div>
            </div>
        </div>
        <!-- /Bootstrap Maxlength -->

    </div>
</div>
@endsection
