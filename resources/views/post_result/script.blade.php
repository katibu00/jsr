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
                }
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
                }
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
                    $.each(res.parties, function(key, party) {
                        html += `<div class="col-md-10 mb-2">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="formtabs-first-name">${party.code}</label>
                                        <div class="col-sm-9">
                                        <input type="hidden" name="party_id[]" value="${party.id}" />
                                        <input type="number" name="votes[]"  class="form-control form-control-sm" placeholder="Enter Votes for ${party.code}" required/>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    html += `<div class="col-md-10 mb-2">
                                <div class="row">
                                    <label class="col-sm-3 col-form-label text-sm-end" for="formtabs-first-name">Others</label>
                                    <div class="col-sm-9">
                                    <input type="hidden" name="party_id[]" value="0" />
                                    <input type="number" name="votes[]"  class="form-control form-control-sm" placeholder="Enter Votes for Other Parties Combined" required/>
                                    </div>
                                </div>
                            </div>`;

                    $('#parties').html(html);
                   
                }
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