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





<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function () {
        // Update image preview when a file is selected
        $('#icon').change(function () {
            var input = this;
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview').attr('src', e.target.result).width(400).height(300); // Adjust width and height as needed
            };

            reader.readAsDataURL(input.files[0]);
        });
    });
</script>






{{-- /////////////////////////////////////////////////Add Services///////////////////////////////////////////////////--}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on("click", '.add_wisdom', function (e) {
            e.preventDefault();

            let title = $('#title').val();
            let owner = $('#owner').val();

            var formData = new FormData();
            formData.append('title', title);
            formData.append('owner', owner);

            $('.errMsgContainer').empty(); // Clear previous error messages

            $.ajax({
                url: "{{ route('wisdoms.store') }}",
                method: 'post',
                data: formData,
                processData: false, // Set processData to false to prevent jQuery from automatically processing the data
                contentType: false, // Set contentType to false to prevent jQuery from setting the content type
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                    $('.errMsgContainer').empty(); // Clear previous error messages
                    $("#addModal").modal("hide");
                    $('#addWisdomForm')[0].reset();
                    $('#data-table2').load(location.href + ' #data-table2');
                    $('#success1').show();
                    /* hide success message after 4 seconds */
                    setTimeout(function () {
                        $('#success1').hide();
                    }, 2000); // 2000 milliseconds = 2 seconds
                    $('.errMsgContainer').empty(); // Clear previous error messages
                },
                error: function (response) {
                    console.log(response.responseJSON);

                    $('.errMsgContainer').empty(); // Clear previous error messages
                    errors = response.responseJSON.errors;
                    $.each(errors, function (index, value) {
                        $('.errMsgContainer').append('<span class="text-danger">' + value + '</span><br/>');
                    });
                }
            });
        });
    });
</script>

{{-- ///////////////////////////////////////////////////////////////////////////--}}







{{-- //////////////////////////////Delete Wisdom////////////////////////////// --}}

<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



$(document).on('click', '.delete-wisdom', function (e) {
  $('.errMsgContainer').empty(); // Clear previous error messages
    e.preventDefault();

    e.stopPropagation();
    var wisdom_id = $(this).data('id');

    if (confirm("Are you sure you want to delete this Wisdom?")) {
        $.ajax({
            url: '/wisdoms/' + wisdom_id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
                wisdom: wisdom_id,

            },
            success: function (data) {
              ///
              if (data.status === true) {
                $('#data-table2').load(location.href + ' #data-table2');
                $('#success3').show();
                setTimeout(function () {
                  $('#success3').hide();
                }, 2000);
              } else if (data.status === false) {
                 // side could not be deleted due to relationships
                alert(data.msg);
              } else if (data.status === 403) {
                 // side deletion forbidden due to relationships
                alert(data.msg);

              }
            },
            error: function (data) {
              alert('Deletion of this Wisdom is forbidden as it is used.');
                console.log(data);
                if(data.status==false){
                  alert('Deletion of this Wisdom is forbidden as it is used.');
                }
                if (data.status !== 500) {
                    alert('An error occurred while deleting the Wisdom.');
                }
            }
        });
    }
});


</script>







{{-- /***update Wisdom*// --}}

<script>
  $(document).on("click", ".close-btn", function(e) {
    $('.errMsgContainer').empty(); // Clear error messages when form is closed
});


  $(document).on("click", '.update_wisdom_form', function() {
    /* To retrieve the data values from the form */
    let id = $(this).data('id');
    let title = $(this).data('title');
    let owner = $(this).data('owner');

    /** To set the values for each input **/
    $('#up_id').val(id);
    $('#up_title').val(title);
    $('#up_owner').val(owner);

});

$(document).on("click", ".update_wisdom", function(e) {
    e.preventDefault();
    let id = $('#up_id').val();
    let up_title = $('#up_title').val();
    let up_owner = $('#up_owner').val();
    $('.errMsgContainer').empty(); // Clear previous error messages

    $.ajax({
        url: "{{ route('wisdoms.update', ['wisdom' => ':id']) }}".replace(':id', id),
        method: "put",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            up_title: up_title,
            up_owner: up_owner,
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
                console.error('Failed to update Wisdom');
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



















{{-- /////////////////////////////////////////////////////////// --}}



{{-- /////////////////////////////Pagination Wisdom///////////////////////////////////// --}}
<script>
  $(document).on('click', '.pagination a', function(e){

  e.preventDefault();
  let page = $(this).attr('href').split('page=')[1];
  wisdom(page);
});

function wisdom(page) {
    $.ajax({
      url: "/pagination/paginate-wisdom?page=" + page,
        type: 'get',
        success: function(data) {
            $('.table-responsive').html(data);
        }
    });
}

</script>
{{-- ////////////////////////////////////////////////////////////// --}}


{{-- /////////////////////////////Search wisdom///////////////////////////////////// --}}
<script>
  $(document).on('keyup',function(e){
  e.preventDefault();
  let search_string=$('#search').val();

  $.ajax({
    url:"{{ route('search.wisdom') }}",
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


{{-- ///////////////////////////////////////////////////////////////// --}}















