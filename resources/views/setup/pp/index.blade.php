@extends('layouts.master')
@section('PageTitle', 'Political Parties')


@section('content')
    <!-- content @s -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-header header-elements">
                <span class="me-2">Political Parties</span>

                <div class="card-header-elements ms-auto">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addNewModal" class="btn btn-sm btn-primary">
                        <span class="tf-icon ti ti-plus ti-xs me-1"></span>Add Political Party(s)
                    </button>
                </div>
            </div>
            @include('setup.pp.table')
        </div>
        <!--/ Basic Bootstrap Table -->
        @include('setup.pp.add_modal')
        @include('setup.pp.edit_modal')
    </div>
    <!-- content @e -->
@endsection

@section('js')
    @include('setup.pp.script')
    <script src="/sweetalert.min.js"></script>
@endsection
