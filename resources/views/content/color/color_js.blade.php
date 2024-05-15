<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<!-- CSS files -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Toastr JS -->
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>




<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
{{-- ///////////////////////////////to delete city ////////////////////////////// --}}


















{{-- /***update Color*// --}}

<script>
  $(document).on("click", ".close-btn", function(e) {
    $('.errMsgContainer').empty(); // Clear error messages when form is closed
});


  $(document).on("click", '.update_color_form', function() {
    /* To retrieve the data values from the form */
    let id = $(this).data('id');
    let name = $(this).data('name');
    let code = $(this).data('code');

    /** To set the values for each input **/
    $('#up_id').val(id);
    $('#up_Name').val(name);
    $('#up_code').val(code);

});

$(document).on("click", ".update_color", function(e) {
    e.preventDefault();
    let id = $('#up_id').val();
    let up_Name = $('#up_Name').val();
    let up_code = $('#up_code').val();
    $('.errMsgContainer').empty(); // Clear previous error messages

    $.ajax({
        url: "{{ route('colors.update', ['color' => ':id']) }}".replace(':id', id),
        method: "put",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            up_name: up_Name,
            up_code: up_code,
        },
        dataType: "json",
        success: function(data) {
    console.log('AJAX request successful:', data);

    if (data.status) {
      console.log(data);
        // Update successful
         $('#updateModal').modal('hide');
         $('#data-table2').load(location.href+' #data-table2');
                $('#success2').show();
                /* hide success message after 4 seconds */
                setTimeout(function() {
                    $('#success2').hide();
                }, 2000); // 2000 milliseconds = 2 seconds
    } else {
                // Update failed
                console.error('Failed to update Color');
            }
        },
        error: function(response) {

          console.log(response.responseJSON);
          $('.errMsgContainer').empty(); // Clear previous error messages
            errors = response.responseJSON.errors;
            $.each(errors, function(index, value) {
                $('.errMsgContainer').append('<span class="text-danger">' + value + '</span></br>');
            });
        }
    });
});
</script>


{{-- /////////////////////////////////////////////////Add Color///////////////////////////////////////////////////--}}
<script>
  $(document).ready(function(){
    $(document).on("click", '.add_color', function(e){
        e.preventDefault();

        let name = $('#name').val();
        let code = $('#code').val();
         console.log(code);
         console.log(name);


        $('.errMsgContainer').empty(); // Clear previous error messages


        $.ajax({
            url: "{{ route('colors.store') }}",
            method: 'post',
            data: {
                name: name,
                code:code

            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
              console.log(data);
              $('.errMsgContainer').empty(); // Clear previous error messages
              $("#addModal").modal("hide");
              $('#addColorForm')[0].reset();
              $('#data-table2').load(location.href+' #data-table2');
              $('#success1').show();
                /* hide success message after 4 seconds */
                setTimeout(function() {
                    $('#success1').hide();
                }, 2000); // 2000 milliseconds = 2 seconds
              $('.errMsgContainer').empty(); // Clear previous error messages

            },
            error: function(response) {
              console.log(response.responseJSON);

                $('.errMsgContainer').empty(); // Clear previous error messages
                errors = response.responseJSON.errors;
                $.each(errors, function(index, value){
                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span><br/>');
                });
            }
        });
    });
});
</script>

{{-- ///////////////////////////////////////////////////////////////////////////--}}






{{-- //////////////////////////////Delete Color////////////////////////////// --}}

<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Use document or a container element that is always present on the page
$(document).on('click', '.delete-color', function (e) {
    e.preventDefault();
    var color_id = $(this).data('id');

    if (confirm("Are you sure you want to delete this color?")) {
        $.ajax({
            url: 'colors/' + color_id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
                color: color_id
            },
            success: function (data) {
                if (data.status == true) {
                    // store was deleted successfully
                    $('#data-table2').load(location.href + ' #data-table2');

                    $('#success3').show();
                    /* hide success message after 4 seconds */
                    setTimeout(function () {
                        $('#success3').hide();
                    }, 2000);
                } else if (data.status == 422) {
                    // Color could not be deleted due to relationships
                    alert('You cannot delete this color as it is related to other tables.');
                } else if (data.status == 403) {
                    // color deletion forbidden due to relationships
                    alert('Deletion of this color is forbidden as it is related to other tables.');
                }
            },
            error: function (data) {
              console.log(data.responseJSON);

                if (data.status !== 500) {
                    alert('Cannot delete Color, It is related to other tables and it is used.');
                }
            }
        });
    }
});


</script>

{{-- /////////////////////////////////////////////////////////// --}}



{{-- /////////////////////////////Pagination Color///////////////////////////////////// --}}
<script>
  $(document).on('click', '.pagination a', function(e){

  e.preventDefault();
  let page = $(this).attr('href').split('page=')[1];
  color(page);
});

function color(page) {
    $.ajax({
      url: "/pagination/paginate-color?page=" + page,
        type: 'get',
        success: function(data) {
            $('.table-responsive').html(data);
        }
    });
}

</script>
{{-- ////////////////////////////////////////////////////////////// --}}


{{-- /////////////////////////////Search Color///////////////////////////////////// --}}
<script>
  $(document).on('keyup',function(e){
  e.preventDefault();
  let search_string=$('#search').val();
  // console.log(search_string);
  $.ajax({
    url:"{{ route('search.color') }}",
    method:'GET',
    data:{
      search_string:search_string
    },
    success:function(data){

      $('.table-responsive').html(data);
    }

  });



})

</script>


{{-- /////////////////////////////Search City///////////////////////////////////// --}}
