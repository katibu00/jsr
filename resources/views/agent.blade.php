@extends('layouts.master')
@section('PageTitle', 'Agent Home')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    {{-- <h5 class="card-header">Form Alignment</h5> --}}
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-center" style="min-height: 400px">
        <form class="w-px-800 border rounded p-3 p-md-" id="postResultForm">
          <h3 class="mb-4 text-center">Result Postings</h3>
          <p class="text-center">{{  auth()->user()['lga']['name'].' LGA - '.auth()->user()['ward']['name']. ' Ward'}}</p><hr/>
         

          <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>PU</th>
                        @foreach ($elections as $election)
                        <th class="text-center">{{ explode(' ', $election->title)[0] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($pus as $key => $pu)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <strong>{{ $pu->name }}</strong>
                            </td>

                            @foreach ($elections as $election)
                              @php
                                $posted = App\Models\PostResultSubmit::where('election_id',$election->id)->where('pu_id',$pu->id)->first();
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