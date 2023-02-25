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
                  <th>Election</th>
                  <th>Status</th>
                  <th>Progress</th>
                  <th>Parties</th>
                  <th>Percentage</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($elections as $key => $election)
                @php
                     $total_pu = App\Models\PU::select('id')->where('status', 1)->count();
                     $collected_pu = App\Models\PostResultSubmit::select('id')->where('election_id',$election->id)->count();
                @endphp 
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $election->title }}</td>
                  <td>{!! @$election->accepting? '<span class="badge bg-label-success">Accepting</span>': '<span class="badge bg-label-danger">Not Accepting</span>' !!}</td>
                  <td>
                    <div class="d-flex justify-content-between gap-3">
                      <p class="mb-0">
                          <em>{{ number_format(@$collected_pu, 0) }}/{{ number_format(@$total_pu, 0) }}
                              PUs Collated</em>
                      </p>
                      @php
                          @$percent = (@$collected_pu / @$total_pu) * 100;
                      @endphp
                      <span class="text-muted">{{ number_format($percent, 2) }}%</span>
                  </div>
                  <div class="d-flex align-items-center mt-1">
                      <div class="progress w-100" style="height: 8px">
                          <div class="progress-bar bg-primary"
                              style="width: {{ number_format($percent, 2) }}%" role="progressbar"
                              aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                  </div>
                  </td>
                  @php
                      $party_ids = explode(',', $election->parties);
                      array_push($party_ids,'0');
                      $total_votes = 0;
                  @endphp
                  @foreach ($party_ids as $party)
                  @php
                     $name = App\Models\PP::select('id', 'code')->where('id', $party)->first();
                     $total_score = App\Models\PostResult::select('votes')->where('election_id',$election->id)->sum('votes');
                     $party_score = App\Models\PostResult::select('votes')->where('election_id',$election->id)->where('party_id',$party)->sum('votes');
                     @$percent = (@$party_score / @$total_score) * 100;
                     $total_votes += $party_score;
                  @endphp
                    <tr>
                      <td colspan="4"></td>
                      <td>{{ $name->code.' ('.$party_score.')' }}</td>
                      <td>
                        <div class="d-flex justify-content-between gap-3">
                          <span class="text-muted">{{ number_format($percent, 2) }}%</span>
                      </div>
                        <div class="d-flex align-items-center mt-1">
                          <div class="progress w-100" style="height: 8px">
                              <div class="progress-bar bg-primary"
                                  style="width: {{ number_format($percent, 2) }}%" role="progressbar"
                                  aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                      </td>
                    </tr>
                  @endforeach
                  <tr class="bg-warning">
                    <td colspan="4"></td>
                    <td><strong>Total Votes</strong></td>
                    <td>
                        <strong>{{ $total_votes }}</strong>
                    </td>
                  </tr>

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