

{{-- //change index award --}}
<script type="text/javascript">
    $(function() {
        $(document).on('change', '#index_lga', function() {

            var lga_id = $('#index_lga').val();

            $('#loading_div').removeClass('d-none');
            $('#content_div').addClass('d-none');
          
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
                    var html = '';

                    $.each(res.wards, function(key, ward) {
                        html +=
                        '<tr>' +
                            '<td>' + (key + 1) + '</td>' +
                            '<td>' + ward.name +'</td>' +
                            `<td>\
                               <input type="number" class="form-control" value="${ward.reg_voters}" name="reg_voters[]" required>
                               <input type="hidden"  name="ward_id[]" value="${ward.id}">
                            </td>`+
                        '</tr>';
                    });
                   $('#table_body').html(html);
                   $('#loading_div').addClass('d-none');
                    $('#content_div').removeClass('d-none');
                }
            });

        });

    });
</script>