<script>
    $(document).ready(function() {

        // $(".pagination").addClass("justify-content-center");

        //submit add user form
        $(document).on('submit', '#addNewForm', function(e) {
            e.preventDefault();

            let formData = new FormData($('#addNewForm')[0]);

            spinner =
                '<div class="spinner-border" style="height: 20px; width: 20px;" role="status"><span class="sr-only">Loading...</span></div> &nbsp; Submitting . . .'
            $('#submit_btn').html(spinner);
            $('#submit_btn').attr("disabled", true);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('users.agents.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.status == 201) {
                        $('.table').load(location.href + ' .table');
                        $('#addNewModal').modal('hide');
                        $('#addNewForm')[0].reset();

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
                        $("#submit_btn").text("Create Account");
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


        //delete item
        $(document).on('click', '.deleteItem', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            let name = $(this).data('name');
            swal({
                    title: "Delete " + name + "?",
                    text: "Once deleted, you will not be able to recover it!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: "{{ route('users.delete') }}",
                            method: 'POST',
                            data: {
                                id: id,
                            },

                            success: function(res) {

                                if (res.status == 200) {
                                    swal('Deleted', res.message, "success");
                                    $('.table').load(location.href + ' .table');
                                }

                            }
                        });
                    }
                });

        });


        //sms pass
        $(document).on('click', '.smspass', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            let name = $(this).data('name');
            swal({
                    title: "Send Login Credentials to" + name + "?",
                    text: "Once deleted, you will not be able to recover it!",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: "{{ route('users.sms') }}",
                            method: 'POST',
                            data: {
                                id: id,
                            },

                            success: function(res) {

                                if (res.status == 200) {
                                    swal('Sent', res.message, "success");
                                }
                                if (res.status == 404) {
                                    swal('Error', res.message, "error");
                                }

                            }
                        });
                    }
                });

        });

        //edit item
        $(document).on('click', '.editItem', function() {

            let name = $(this).data('name');
            let voters = $(this).data('voters');
            let id = $(this).data('id');
            let status = $(this).data('status');
            if (status == 1) {
                $("#status").prop("checked", true)
            } else {
                $("#status").prop("checked", false)
            }

            $('.modal-title').html('Update ' + name);
            $('#edit_name').val(name);
            $('#edit_voters').val(voters);
            $('#update_id').val(id);
        });

        //update data
        $(document).on('click', '#update_btn', function(e) {
            e.preventDefault();

            name = $('#edit_name').val();
            voters = $('#edit_voters').val();
            id = $('#update_id').val()

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            spinner =
                '<div class="spinner-border" style="height: 20px; width: 20px;" role="status"><span class="sr-only">Loading...</span></div> Updating. . .';
            $("#update_btn").html(spinner);
            $("#update_btn").attr("disabled", true);

            $.ajax({
                type: "POST",
                url: "{{ route('pus.update') }}",
                data: {
                    'name': name,
                    'id': id,
                    'voters': voters,
                    status: $("#status").prop("checked") == true ? 1 : 0,
                },
                dataType: "json",
                success: function(res) {

                    if (res.status == 400) {
                        $("#update_error_list").html("");
                        $("#update_error_list").addClass("alert alert-danger");
                        $.each(res.errors, function(key, err) {
                            $("#update_error_list").append("<li>" + err + "</li>");
                        });
                        Command: toastr["error"](
                            "Check your input and try again."
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
                        $("#update_btn").text("Update");
                        $("#update_btn").attr("disabled", false);
                    }

                    if (res.status == 200) {

                        $('#update_error_list').html("");
                        $('#update_error_list').removeClass('alert alert-danger');
                        $('#editModal').modal('hide');
                        $('#update_btn').text("Update");
                        $('#update_btn').attr("disabled", false);
                        $('.table').load(location.href + ' .table');

                        Command: toastr["success"](res.message);
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
                        $("#update_btn").text("Update");
                        $("#update_btn").attr("disabled", false);


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

        //user details
        $(document).on('click', '.userDetails', function(e) {
            e.preventDefault();
            $('#content_div_details').addClass('d-none');
            $('#loading_div_details').removeClass('d-none');

            $('#user_name').html('');
            $('#user_email').html('');
            $('#user_usertype').html('');
            $('#user_phone1').html('');
            $('#user_phone2').html('');
            $('#user_lga').html('');
            $('#user_ward').html('');
            $('#user_pu').html('');
            $('#user_address').html('');
            $('#user_gender').html('');
            $('#user_marital').html('');
            $('#user_pass').html('');

            let id = $(this).data('id');

            var data = {
                'id': id,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: "POST",
                url: "{{ route('get-user-details') }}",
                data: data,
                dataType: "json",
                success: function(res) {



                    if (res.status == 200) {

                        $('#userDetailsModalTitle').html(res.user.name + ' Details');

                        if (res.user.image == 'default.png') {
                            $("#image").attr("src", "/uploads/avatars/" + res.user.image);
                        }

                        if (res.user.status == 1) {
                            $("#user_status").html("Verified");
                            $("#user_status").addClass("bg-label-success");
                            $("#user_status").removeClass("bg-label-danger");
                        } else {
                            $("#user_status").html("Unverified");
                            $("#user_status").addClass("bg-label-danger");
                            $("#user_status").removeClass("bg-label-success");
                        }

                        $('#user_name').html(res.user.name);
                        $('#user_email').html(res.user.email);
                        $('#user_usertype').html(res.user.usertype);
                        $('#user_phone1').html(res.user.phone1);
                        $('#user_phone2').html(res.user.phone2);

                        if (res.user.lga) {
                            $('#user_lga').html(res.user.lga.name);
                            $('#user_ward').html(res.user.ward.name);
                            $('#user_pu').html(res.user.pu.name);
                        }
                        $('#user_address').html(res.user.address);
                        $('#user_gender').html(res.user.gender);
                        $('#user_marital').html(res.user.marital);
                        $('#user_pass').html(res.user.pvc);






                        $('#content_div_details').removeClass('d-none');
                        $('#loading_div_details').addClass('d-none');

                    }
                }
            });
        });


        //delete item
        $(document).on('click', '.verifyUser', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            let name = $(this).data('name');
            let status = $(this).data('status');
            var swal_title;
            if (status == 1) {
                swal_title = 'Inactivate';
            } else {
                swal_title = 'Activate';
            }


            swal({
                    title: swal_title + " " + name + "?",
                    text: "Only Active Users can be able to post Election Results.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: "{{ route('users.agents.verify') }}",
                            method: 'POST',
                            data: {
                                id: id,
                            },

                            success: function(res) {

                                if (res.status == 200) {
                                    swal('Done', res.message, "success");
                                    $('.table').load(location.href + ' .table');
                                }

                            }
                        });
                    }
                });

        });
    });
</script>

{{-- change modal lga --}}
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#lga', function() {

            var lga_id = $('#lga').val();

            $('#ward').html('<option value="">Loading...</option>');
            $('#pu').html('<option value=""></option>');
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

{{-- change modal lga --}}
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


{{-- change lga --}}
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#sort_lga', function() {

            var lga_id = $('#sort_lga').val();
            var usertype = $('#sort_user').val();

            $('#content_div').addClass("d-none");
            $('#loading_div').removeClass("d-none");


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('users.agents.sort') }}',
                data: {
                    'lga_id': lga_id,
                    'usertype': usertype
                },
                success: function(res) {

                    $('#content_div').removeClass("d-none");
                    $('#loading_div').addClass("d-none");


                    if (res.status == 404) {
                        $('.table-data').html(
                            '<p class="text-danger text-center">No Data Found.</p>'
                        );
                    }
                    $('.table-data').html(res);

                }
            });

        });

    });
</script>
{{-- change usrtype --}}
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#sort_user', function() {

            var lga_id = $('#sort_lga').val();
            var usertype = $('#sort_user').val();

            $('#content_div').addClass("d-none");
            $('#loading_div').removeClass("d-none");


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('users.agents.sort') }}',
                data: {
                    'lga_id': lga_id,
                    'usertype': usertype
                },
                success: function(res) {

                    $('#content_div').removeClass("d-none");
                    $('#loading_div').addClass("d-none");


                    if (res.status == 404) {
                        $('.table-data').html(
                            '<p class="text-danger text-center">No Data Found.</p>'
                        );
                    }
                    $('.table-data').html(res);

                }
            });

        });

    });
</script>
