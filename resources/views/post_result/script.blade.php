{{-- change lga --}}
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#lga', function() {

            var lga_id = $('#lga').val();

            $('#ward').html('<option value="">Loading...</option>');
            $('#pu').html('<option value="">--PU--</option>');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('get-wards') }}',
                data: {
                    'lga_id': lga_id,
                },
                success: function(res) {
                    var html = '<option value="">--</option>';
                    $.each(res.wards, function(key, ward) {
                        html += '<option value="' + ward.id + '">' + ward.name +
                            '</option>';
                    });
                    $('#ward').html(html);
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

{{-- change ward --}}
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#ward', function() {

            var lga_id = $('#lga').val();
            var ward_id = $('#ward').val();

            $('#pu').html('<option value="">Loading...</option>');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('get-pus') }}',
                data: {
                    'ward_id': ward_id,
                    'lga_id': lga_id
                },
                success: function(res) {
                    var html = '<option value="">--</option>';
                    $.each(res.pus, function(key, pu) {
                        html += '<option value="' + pu.id + '">' + pu.name +
                            '</option>';
                    });
                    $('#pu').html(html);
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

{{-- change PU --}}
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#pu', function() {

            var election_id = $('#election').val();
            var pu_id = $('#pu').val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('get-warning') }}',
                data: {
                    'election_id': election_id,
                    'pu_id': pu_id
                },
                success: function(res) {
                   
                    if(res.status === 'yes')
                    {
                        Command: toastr["warning"](res.message);
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
                        $('#warning').removeClass("d-none")
                    }else{
                        $('#warning').addClass("d-none")
                    }
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

{{-- change election --}}
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#election', function() {

            var election_id = $('#election').val();
            var pu_id = $('#pu').val();
            $('#warning').addClass("d-none");
            $('#parties').html("");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('get-elections') }}',
                data: {
                    'election_id': election_id,'pu_id':pu_id,
                },
                success: function(res) {
                    if(res.warn === 'yes')
                    {
                        $('#warning').removeClass("d-none")
                    }else{
                        $('#warning').addClass("d-none")
                    }
                    var html = '';
                    html += `<div class="col-md-10 mb-2">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label text-sm-end" for="formtabs-first-name">Registered Voters</label>
                                    <div class="col-sm-8">
                                    <input type="number" name="registered" id="registered" class="form-control form-control-sm" placeholder="Total Registered Voters" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 mb-2">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label text-sm-end" for="formtabs-first-name">Accredited Voters</label>
                                    <div class="col-sm-8">
                                    <input type="number" name="accredited" id="accredited" class="form-control form-control-sm" placeholder="Total Accredited Voters" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 mb-2">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label text-sm-end" for="formtabs-first-name">Valid Votes</label>
                                    <div class="col-sm-8">
                                    <input type="number" name="valid" id="valid" class="form-control form-control-sm" placeholder="Total Valid Votes" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 mb-2">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label text-sm-end" for="formtabs-first-name">Rejected Votes</label>
                                    <div class="col-sm-8">
                                    <input type="number" name="rejected" id="rejected" class="form-control form-control-sm" placeholder="Total Rejected Votes" required/>
                                    </div>
                                </div>
                            </div>`;
                    $.each(res.parties, function(key, party) {
                        html += `<div class="col-md-10 mb-2">
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label text-sm-end" for="formtabs-first-name">${party.code}</label>
                                        <div class="col-sm-8">
                                        <input type="hidden" name="party_id[]" value="${party.id}" />
                                        <input type="number" name="votes[]"  class="form-control form-control-sm party" placeholder="Enter Votes for ${party.code}" required/>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    html += `<div class="col-md-10 mb-2">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label text-sm-end" for="formtabs-first-name">Others</label>
                                    <div class="col-sm-8">
                                    <input type="hidden" name="party_id[]" value="0" />
                                    <input type="number" name="votes[]" id="others" class="form-control form-control-sm" placeholder="Enter Votes for Other Parties Combined" required/>
                                    </div>
                                </div>
                            </div>`;

                    $('#parties').html(html);
                   
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

{{-- submit --}}
<script>
    $(document).ready(function() {

        $(document).on('submit', '#postResultForm', function(e) {
            e.preventDefault();

            let formData = new FormData($('#postResultForm')[0]);

            var registered = $('#registered').val();
            var accredited = $('#accredited').val();
            var valid = $('#valid').val();
            var rejected = $('#rejected').val();
            var others = $('#others').val();
            let parties = 0;
            $('.party').each(function() {
                parties += parseFloat($(this).val());
            });

            if (parseInt(accredited) >  parseInt(registered)) {
                Command: toastr["error"](
                    "Accredited Voters Must not be greater than Registered Voters. please check your entry and try again"
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
                return
            }
            var combined = parseInt(parties) + parseInt(others);
            if (combined !=  parseInt(valid)) {
                Command: toastr["error"](
                    "Valid Votes must equal the sum of Individual Party Scores. please check your entry and try again"
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
                return
            }
            if (parseInt(rejected)+parseInt(valid) != parseInt(accredited)) {
                Command: toastr["error"](
                    "Accredited Voters must equal the sum of Rejected and Valid Votes. please check your entry and try again"
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
                return
            }


            spinner =
                '<div class="spinner-border" style="height: 20px; width: 20px;" role="status"><span class="sr-only">Loading...</span></div> &nbsp;Submitting . . .'
            $('#submit_btn').html(spinner);
            $('#submit_btn').attr("disabled", true);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('result.post') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.status == 201) {
                        $('#postResultForm')[0].reset();

                        Command: toastr["success"](
                           response.message
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

                        $('#submit_btn').text("Submit");
                        $('#submit_btn').attr("disabled", false);
                    }

                    if (response.status == 401) {
                        $("#error_list").html("");
                        $("#error_list").addClass("alert alert-danger");
                        $.each(response.errors, function(key, err) {
                            $("#error_list").append("<li>" + err + "</li>");
                        });
                        $("#submit_btn").text("Submit");
                        $("#submit_btn").attr("disabled", false);
                    }
                    if (response.status == 400) {
                        Command: toastr["error"](response.message);
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
                        $("#submit_btn").text("Submit");
                        $("#submit_btn").attr("disabled", false);
                    }

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