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




{{-- ////////////////////////////////////////**add Detail///////////////////////////////////--}}
{{-- <script>
  $(document).ready(function(){
    $(document).on("click", '.add_detail', function(e){
        e.preventDefault();
         let colors = $('#colors').val();
         let model= $('#model').val();
         let brand_id= $('#brand_id').val();
         console.log(brand_id);
         console.log(model);
         console.log(colors);
        $('.errMsgContainer').empty(); // Clear previous error messages

        $.ajax({
            url: "{{ route('details.store') }}",
            method: 'post',
            data: {
                colors: colors,
                model: model,
                brand_id: brand_id,
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
              console.log(data);
              $('.errMsgContainer').empty(); // Clear previous error messages
              $("#addDetailModal").modal("hide");
              $('#addDetailForm')[0].reset();
              $('#brandmodel-table').load(location.href+' #brandmodel-table');
              $('#brandmodeladd').show();
                /* hide success message after 4 seconds */
                setTimeout(function() {
                    $('#brandmodeladd').hide();
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
</script> --}}


<script>
  $(document).ready(function(){
    $(document).on("click", '.add_detail', function(e){
      e.preventDefault();

      let branch = $('#branch').val();
      let study_id = $('#study_id').val();

      // Clear previous error messages
      $('.errMsgContainer').empty();

      $.ajax({
        url: "{{ route('details.store') }}",
        method: 'post',
        data: {
          branch: branch,
          study_id: study_id,
        },
        dataType: "json",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
          handleSuccess(data);
        },
        error: function(response) {
          handleError(response);
        }
      });
    });

    function handleSuccess(data) {
      console.log(data);
      $('.errMsgContainer').empty();
      $("#addDetailsModal").modal("hide");
      $('#addDetailForm')[0].reset();
      $('#brandmodel-table').load(location.href + ' #brandmodel-table');
      $('#brandmodeladd').show();

      // Hide success message after 2 seconds
      setTimeout(function() {
        $('#brandmodeladd').hide();
      }, 2000);
    }

    function handleError(response) {
      console.log(response.responseJSON);
      $('.errMsgContainer').empty();
      errors = response.responseJSON.errors;
      $.each(errors, function(index, value){
        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span><br/>');
      });
    }
  });
</script>

{{-- ///////////////////////////////////////////////////////////////////////////--}}











{{-- //////////////////////////////Delete Details////////////////////////////// --}}

<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Use document or a container element that is always present on the page
$(document).on('click', '.delete-detailModel', function (e) {
    e.preventDefault();
    var detail_id = $(this).data('id');

    if (confirm("Are you sure you want to delete this Detail?")) {
        $.ajax({
          url: "{{ route('details.destroy', ['detail_id' => ':id']) }}".replace(':id', detail_id),

            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
               // detail_id: detail_id
            },
            success: function (data) {
              console.log(data);
                if (data.status == true) {
                    // store was deleted successfully
                    $('#brandmodel-table').load(location.href + ' #brandmodel-table');

                    $('#brandmodeldelete').show();
                    /* hide success message after 4 seconds */
                    setTimeout(function () {
                        $('#brandmodeldelete').hide();
                    }, 2000);
                } else if (data.status == 422) {
                    // brand could not be deleted due to relationships
                    alert('You cannot delete this Branch as it is related to other tables.');
                } else if (data.status == 403) {
                    // brand deletion forbidden due to relationships
                    alert('Deletion of this Branch is forbidden as it is related to other tables.');
                }
            },
            error: function (data) {
              alert('Deletion of this Branch is forbidden as it is used.');
                console.log(data);
                if(data.status==false){
                  alert('Deletion of this Branch is forbidden as it is used.');
                }
                if (data.status !== 500) {
                    alert('An error occurred while deleting the Branch.');
                }
            }
        });
    }
});


</script>

{{-- /////////////////////////////////////////////////////////// --}}



