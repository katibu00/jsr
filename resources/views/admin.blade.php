@extends('layouts.master')
@section('PageTitle', 'Admin Home')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
 
  <div class="row">
    <!-- today sale -->
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body pb-0">
          <div class="card-icon">
            <span class="badge bg-label-primary rounded-pill p-2">
              <i class="ti ti-cash ti-sm"></i>
            </span>
          </div>
          <h5 class="card-title mb-0 mt-2">{{ number_format($admins,0) }}</h5>
          <small>Admins</small>
        </div>
        <div id="subscriberGained"></div>
      </div>
    </div>

    <!-- expenses -->
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body pb-0">
          <div class="card-icon">
            <span class="badge bg-label-danger rounded-pill p-2">
              <i class="ti ti-cash ti-sm"></i>
            </span>
          </div>
          <h5 class="card-title mb-0 mt-2">{{ number_format($agents,0) }}</h5>
          <small>LGA Coordinators</small>
        </div>
        <div id="quarterlySales"></div>
      </div>
    </div>

    <!-- this week -->
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body pb-0">
          <div class="card-icon">
            <span class="badge bg-label-warning rounded-pill p-2">
              <i class="ti ti-cash ti-sm"></i>
            </span>
          </div>
          <h5 class="card-title mb-0 mt-2">-</h5>
          <small>Wards Coordinators</small>
        </div>
        <div id="orderReceived"></div>
      </div>
    </div>

    <!-- Revenue month -->
    <div class="col-lg-3 col-sm-6 mb-4">
      <div class="card">
        <div class="card-body pb-0">
          <div class="card-icon">
            <span class="badge bg-label-success rounded-pill p-2">
              <i class="ti ti-calendar ti-sm"></i>
            </span>
          </div>
          <h5 class="card-title mb-0 mt-2">-</h5>
          <small>PU Coordinators</small>
        </div>
        <div id="revenueGenerated"></div>
      </div>
    </div>


      <!-- Todays Sale -->
      <div class="col-md-12 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex justify-content-between">
            <h5 class="card-title m-0 me-2">Data Input</h5>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered border-top">
              <thead class="border-bottom">
                <tr>
                  <th>#</th>
                  <th>LGA</th>
                  <th>Wards</th>
                  <th>PUs</th>
                  <th>LG Agents</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($lgas as $key => $lga )
                <tr>
                   <td>{{ $key + 1 }}</td>
                   <td>{{ $lga->name }}</td>
                   @php
                     $wards = App\Models\Ward::where('lga_id', $lga->id)->count();
                     $pus = App\Models\PU::where('lga_id', $lga->id)->count();
                     $agents = App\Models\User::where('lga_id', $lga->id)->count();
                    
                   @endphp
                   <td> {{ $wards != 0? number_format($wards,0) : '' }}</td>
                   <td> {{ $pus != 0? number_format($pus,0) : '' }}</td>
                  
                   @if($pus != 0)
                   @php
                      if($pus == 0){ $pus = 1;}
                     $percent = $agents/$pus*100
                   @endphp
                   <td> 
                    <div class="d-flex justify-content-between gap-3">
                      <p class="mb-0">{{ $agents.'/'.$pus }}</p>
                      <span class="text-muted">{{ number_format($percent,0) }}%</span>
                    </div>
                    <div class="d-flex align-items-center mt-1">
                      <div class="progress w-100" style="height: 8px">
                        <div
                          class="progress-bar bg-primary"
                          style="width: {{ number_format($percent,0) }}%"
                          role="progressbar"
                          aria-valuenow="85"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div>
                   </td>
                   @else
                   <td></td>
                   @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--/ sale -->

  
  </div>
  </div>
  <!-- / Content -->
  @endsection
  @section('js')
  <script src="/assets/js/cards-statistics.js"></script>
  @endsection