@extends('layouts.master')
@section('PageTitle', 'LG Coordinator Postings')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    {{-- <h5 class="card-header">Form Alignment</h5> --}}
    <div class="card-body">
      <div class="d-flex align-items-center table-responsive justify-content-center" style="min-height: 400px">
        <form class="w-px-800 border table-responsive rounded p-3 p-md-" id="postResultForm">
          <h3 class="mb-4 text-center">Result Postings</h3>
          <p class="text-center">{{  auth()->user()['lga']['name'].' LGA - '.auth()->user()['ward']['name']. ' Ward'}}</p><hr/>
         

          <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ward</th>
                        @foreach ($elections as $election)
                        <th class="text-center">{{ $election->title  }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($wards as $key => $ward)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <strong>{{ $ward->name }}</strong>
                            </td>

                            @foreach ($elections as $election)
                              @php
                                $posted = App\Models\PostResultSubmit::where('election_id',$election->id)->where('ward_id',$ward->id)->whereNull('pu_id')->first();
                              @endphp
                               <td class="text-center">
                                  {!! $posted  ? '<i class="fa fa-check-square text-success" aria-hidden="true"></i>': '<i class="fa fa-window-close text-danger" aria-hidden="true"></i>' !!}
                              </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

         
        </form>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->
@endsection