@extends('layouts.master')
@section('PageTitle', 'Election Report ')
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
                            <form action="{{ route('result.pdf') }}" method="post">
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
                                            <option value="summary" {{ @$type == 'summary' ? 'selected' : '' }}>General Summary</option>
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
                        </div>


                    </div>
                </div>
            </div>
            <!-- /Select Election -->

        </div>
    </div>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
