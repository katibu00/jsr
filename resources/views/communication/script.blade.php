{{-- change lga --}}
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#lga', function() {

            var lga_id = $('#lga').val();

            $('#ward').html('<option value="">Loading...</option>');
           
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
                    var html = '<option value="all">All</option>';
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