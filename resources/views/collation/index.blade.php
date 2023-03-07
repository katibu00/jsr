@extends('layouts.master')
@section('PageTitle', 'Election Result Collation ')
@section('content')

@section('js2')
@if (@$type == 'party_lg' || @$type == 'ward_lg')
<script type="text/javascript">
  $('.lga_div').removeClass("d-none");
  $('.election_div').removeClass("col-md-6");
  $('.election_div').addClass("col-md-3");
  $('.type_div').addClass("col-md-3");
  $('.type_div').removeClass("col-md-4");
</script>
@endif
@endsection
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">

            <!-- Select Election -->
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex flex-row align-items-center header-elements">
                            <form action="{{ route('result.collation') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-2 election_div">
                                        <select name="election_id" class="form-select form-select-sm" required>
                                            <option value="">--Election--</option>
                                            @foreach ($elections as $election)
                                                <option value="{{ $election->id }}"
                                                    {{ @$election_id == $election->id ? 'selected' : '' }}>
                                                    {{ $election->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2 type_div">
                                        <select name="type" id="type" class="form-select form-select-sm" required>
                                            <option value="">--Report Type--</option>
                                            <option value="party" {{ @$type == 'party' ? 'selected' : '' }}>Party-wise
                                                (Cum)
                                            </option>
                                            <option value="party_lg" {{ @$type == 'party_lg' ? 'selected' : '' }}>Party-wise
                                              (LGA)
                                             </option>
                                            <option value="ward_lg" {{ @$type == 'ward_lg' ? 'selected' : '' }}>Ward-wise
                                              (LGA)
                                             </option>
                                            <option value="lga" {{ @$type == 'lga' ? 'selected' : '' }}>LGA-wise (Cum)
                                            </option>
                                            <option value="pu" {{ @$type == 'pu' ? 'selected' : '' }}>last 50 Wards
                                            </option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2 d-none lga_div">
                                        <select name="lga_id" id="lga_id" class="form-select form-select-sm">
                                            <option value="">--LGA--</option>
                                            @foreach ($lgass as $lg)
                                                <option value="{{ $lg->id }}"  {{ @$send_lga_id == $lg->id ? 'selected' : '' }}>{{ $lg->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-sm btn-primary">Fetch</button>
                                    </div>
                                </div>
                            </form>
                            @php
                               if(@$total_pu == 0)
                               {
                                @$total_pu = 1;
                               }
                            @endphp


                            <div class="casrd-header-elements ms-auto">
                                @if (isset($election_id))
                                    <div class="d-flex justify-content-between gap-3">
                                        <p class="mb-0">
                                            <em>{{ number_format((@$collected_pu), 0) }}/{{ number_format(@$total_pu, 0) }}
                                                Wards Collated</em>
                                        </p>
                                        @php
                                            @$percent = ((@$collected_pu) / @$total_pu) * 100;
                                        @endphp
                                        <span class="text-muted">{{ number_format($percent, 0) }}%</span>
                                    </div>
                                    <div class="d-flex align-items-center mt-1">
                                        <div class="progress w-100" style="height: 8px">
                                            <div class="progress-bar bg-primary"
                                                style="width: {{ number_format($percent, 0) }}%" role="progressbar"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- /Select Election -->

            @if (@$type == 'party')
                <!-- Progress report -->
                <div class="col-lg-4 col-12 mb-4">

                    <div class="card">
                        <div class="card-header d-flex align-items-start justify-content-between pb-2">
                            <h5 class="card-title mb-0">Summary (Cummulative)</h5>
                        </div>
                        <div class="card-body pt-1">
                            <div class="info-container">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <span class="fw-semibold me-1">Registered Voters:</span>
                                        <span>{{ number_format($registered, 0) }}</span>
                                    </li>
                                    <li class="mb-2 pt-1">
                                        <span class="fw-semibold me-1">Accredited Voters:</span>
                                        <span>{{ number_format($accredited, 0) }}</span>
                                    </li>
                                    <li class="mb-2 pt-1">
                                        <span class="fw-semibold me-1">Valid Votes:</span>
                                        <span>{{ number_format($valid, 0) }}</span>
                                    </li>
                                    <li class="mb-2 pt-1">
                                        <span class="fw-semibold me-1">Rejected Votes:</span>
                                        <span>{{ number_format($rejected, 0) }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress report  -->


                <!-- Party wise -->
                <div class="col-lg-8 col-12 mb-4">
                    <div class="card">
                        <h5 class="card-header">Party-Wise (Cummulative)</h5>
                        <div class="card-body">

                            @php
                                $labels = json_decode(@$labels);
                                $values = json_decode(@$values);
                            @endphp
                            <div>
                                <canvas id="party"></canvas>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- /Party wise -->
            @endif

            @if (@$type == 'party_lg')
                <!-- Progress report -->
                <div class="col-lg-4 col-12 mb-4">

                    <div class="card">
                        <div class="card-header d-flex align-items-start justify-content-between pb-2">
                            <h5 class="card-title mb-0">Summary ({{ @$lga_name->name }} LGA)</h5>
                        </div>
                        <div class="card-body pt-1">
                            <div class="info-container">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <span class="fw-semibold me-1">Registered Voters:</span>
                                        <span>{{ number_format($registered, 0) }}</span>
                                    </li>
                                    <li class="mb-2 pt-1">
                                        <span class="fw-semibold me-1">Accredited Voters:</span>
                                        <span>{{ number_format($accredited, 0) }}</span>
                                    </li>
                                    <li class="mb-2 pt-1">
                                        <span class="fw-semibold me-1">Valid Votes:</span>
                                        <span>{{ number_format($valid, 0) }}</span>
                                    </li>
                                    <li class="mb-2 pt-1">
                                        <span class="fw-semibold me-1">Rejected Votes:</span>
                                        <span>{{ number_format($rejected, 0) }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress report  -->


                <!-- Party wise -->
                <div class="col-lg-8 col-12 mb-4">
                    <div class="card">
                        <h5 class="card-header">Party-Wise ({{ @$lga_name->name }} LGA)</h5>
                        <div class="card-body">

                            @php
                                $labels = json_decode(@$labels);
                                $values = json_decode(@$values);
                            @endphp
                            <div>
                                <canvas id="party_lga"></canvas>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- /Party wise -->
            @endif

            @if (@$type == 'lga')
                <!-- Party wise -->
                <div class="col-lg-12 col-12 mb-4">
                    <div class="card">
                        <h5 class="card-header">LGA-Wise</h5>
                        <div class="card-body">

                            <canvas id="myChart2"></canvas>

                        </div>
                    </div>
                </div>
                <!-- /Party wise -->
            @endif

            @if (@$type == 'ward_lg')
                <!-- Party wise -->
                <div class="col-lg-12 col-12 mb-4">
                    <div class="card">
                        <h5 class="card-header">LGA-Ward-Wise</h5>
                        <div class="card-body">

                            <canvas id="myChart2"></canvas>

                        </div>
                    </div>
                </div>
                <!-- /Party wise -->
            @endif


            @if (@$type == 'pu')
                @include('collation.pu')
            @endif

        </div>
    </div>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @if (@$type == 'ward_lg')
        <script>
            const ctx = document.getElementById('myChart2');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! @$lga !!},
                    datasets: [
                        @foreach ($parties as $party)

                            @php
                                $wards = App\Models\Ward::select('id')->where('lga_id',$send_lga_id)->get();
                                $ward_score = [];
                                foreach ($wards as $ward) {
                                    $score = App\Models\PostResult::where('party_id', $party->id)
                                        ->whereHas('postResultSubmit', function ($query) use ($ward) {
                                            $query->where('ward_id', $ward->id);
                                        })
                                        ->where('election_id', $election_id)
                                        ->sum('votes');
                                    array_push($ward_score, $score);
                                    $data = json_encode($ward_score);
                                }
                            @endphp

                            {
                                label: '{{ $party->code }}',
                                data: {!! @$data !!},
                                borderWidth: 1
                            },
                        @endforeach
                    ]
                },
                options: {
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endif
    @if (@$type == 'lga')
        <script>
            const ctx = document.getElementById('myChart2');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! @$lga !!},
                    datasets: [
                        @foreach ($parties as $party)

                            @php
                                $lgas = App\Models\LGA::select('id')->get();
                                $lg_score = [];
                                foreach ($lgas as $lga) {
                                    $score = App\Models\PostResult::where('party_id', $party->id)
                                        ->where('lga_id', $lga->id)
                                        ->where('election_id', $election_id)
                                        ->sum('votes');
                                    array_push($lg_score, $score);
                                    $data = json_encode($lg_score);
                                }
                            @endphp

                            {
                                label: '{{ $party->code }}',
                                data: {!! @$data !!},
                                borderWidth: 1
                            },
                        @endforeach
                    ]
                },
                options: {
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endif


    @if (@$type == 'party')
        <script>
            const ctx2 = document.getElementById('party');

            new Chart(ctx2, {
                type: 'bar',

                data: {
                    labels: {!! Js::from(@$labels) !!},
                    datasets: [{

                        label: "{{ @$title }}",
                        data: {!! Js::from(@$values) !!},
                        backgroundColor: {!! @$colors !!},
                        borderColor: {!! @$borders !!},
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            grouped: true,
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                generateLabels: (chart) => {
                                    const datasets = chart.data.datasets;
                                    return datasets[0].data.map((data, i) => ({
                                        text: `${chart.data.labels[i]} ${data}`,
                                        fillStyle: datasets[0].backgroundColor[i],
                                    }))
                                }
                            }
                        }
                    }
                },


            });
        </script>
    @endif

    @if (@$type == 'party_lg')
        <script>
            const ctx2 = document.getElementById('party_lga');

            new Chart(ctx2, {
                type: 'bar',

                data: {
                    labels: {!! Js::from(@$labels) !!},
                    datasets: [{

                        label: "{{ @$title }}",
                        data: {!! Js::from(@$values) !!},
                        backgroundColor: {!! @$colors !!},
                        borderColor: {!! @$borders !!},
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            grouped: true,
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                generateLabels: (chart) => {
                                    const datasets = chart.data.datasets;
                                    return datasets[0].data.map((data, i) => ({
                                        text: `${chart.data.labels[i]} ${data}`,
                                        fillStyle: datasets[0].backgroundColor[i],
                                    }))
                                }
                            }
                        }
                    }
                },


            });
        </script>
    @endif



    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#type', function() {

                var type = $('#type').val();

                if (type == 'party_lg' || type == 'ward_lg') {
                    $('.lga_div').removeClass("d-none");
                    $('.election_div').removeClass("col-md-6");
                    $('.election_div').addClass("col-md-4");

                    $('.type_div').removeClass("col-md-4");
                    $('.type_div').addClass("col-md-3");
                    $('#lgas_id').attr("required", true);
                } else {
                    $('.lga_div').addClass("d-none");

                    $('.election_div').removeClass("col-md-4");
                    $('.election_div').addClass("col-md-6");

                    $('.type_div').removeClass("col-md-3");
                    $('.type_div').addClass("col-md-4");
                    $('#lgas_id').attr("required", false);

                }

            });

        });
    </script>

@endsection
