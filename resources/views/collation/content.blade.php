 <!-- Progress report -->
 <div class="col-lg-4 col-12 mb-4">

    <div class="card">
    <div class="card-header d-flex align-items-start justify-content-between pb-2">
        <h5 class="card-title mb-0">Progress Report</h5>
    </div>
    <div class="card-body pt-1">
        <div class="d-flex justify-content-between gap-3">
        <p class="mb-0"><em>{{ number_format($collected_pu,0)}}/{{ number_format($total_pu,0)}} PUs Collected</em></p>
        @php
            $percent = $collected_pu/$total_pu*100;
        @endphp
        <span class="text-muted">{{ number_format($percent,0)}}%</span>
        </div>
        <div class="d-flex align-items-center mt-1">
        <div class="progress w-100" style="height: 8px">
            <div
            class="progress-bar bg-primary"
            style="width: {{ number_format($percent,0)}}%"
            role="progressbar"
            aria-valuenow="85"
            aria-valuemin="0"
            aria-valuemax="100"
            ></div>
        </div>
        </div>

    </div>
    </div>
</div>
<!-- Progress report  -->


<!-- Party wise -->
<div class="col-lg-8 col-12 mb-4">
<div class="card">
  <h5 class="card-header">Party-Wise</h5>
  <div class="card-body">
    
    @php
        $labels = json_decode($labels);
        $values = json_decode($values);
    @endphp
    <div>
        <canvas id="myChart" ></canvas>
    </div>

   
  </div>
</div>
</div>
<!-- /Party wise -->

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',

            data: {
                labels: {!! Js::from($labels) !!},
                datasets: [{
                   
                    label: "{{$title}}",
                    data: {!! Js::from($values) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        grouped: true,
                    }
                }
            }
        });
    </script>


{{-- change election --}}
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#election_id', function() {

            var election_id = $('#election_id').val();
        

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('get-result') }}',
                data: {
                    'election_id': election_id,
                },
                success: function(res) {
                    $('#content_div').html(res);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    if (xhr.status === 419) {
                        Command: toastr["error"](
                            "Session expired. please login again."
                        );
                        toastr.options = {
                            closeButton: false,
                            debug: false,
                            newestOnTop: false,
                            progressBar: false,
                            positionClass: "toast-top-right",
                            preventDuplicates: false,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            timeOut: "5000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                        };

                        setTimeout(() => {
                            window.location.replace('{{ route('login') }}');
                        }, 2000);
                    }
                },
            });

        });

    });
</script>
@endsection