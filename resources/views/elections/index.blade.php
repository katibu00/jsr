@extends('layouts.master')
@section('PageTitle', 'Elections ')
@section('css')
<link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="/assets/vendor/libs/flatpickr/flatpickr.css" />
@endsection
@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Elections</span>

                <div class="card-header-elements ms-auto">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addNewModal" class="btn btn-sm btn-primary">
                        <span class="tf-icon ti ti-plus ti-xs me-1"></span>Add New Election
                    </button>
                </div>
            </div>
            @include('elections.table')
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
    <!-- content @e -->
    @include('elections.add_modal')
@endsection

@section('js')
    @include('elections.script')
    <script src="/sweetalert.min.js"></script>
    <script src="/assets/vendor/libs/select2/select2.js"></script>
    <script src="/assets/js/modal-edit-user.js"></script>
    <script src="/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="/assets/js/forms-pickers.js"></script>
@endsection
