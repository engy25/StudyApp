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
        $(document).on("click", '.add_category', function (e) {
            e.preventDefault();

            let name = $('#name').val();

            let icon = $('#icon')[0].files[0];

            var formData = new FormData();
            formData.append('name', name);
            formData.append('icon', icon);


            $('.errMsgContainer').empty(); // Clear previous error messages

            $.ajax({
                url: "{{ route('categories.store') }}",
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
                    $('#addCategoryForm')[0].reset();
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







{{-- //////////////////////////////Delete Category////////////////////////////// --}}

<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



$(document).on('click', '.delete-category', function (e) {
  $('.errMsgContainer').empty(); // Clear previous error messages
    e.preventDefault();

    e.stopPropagation();
    var category_id = $(this).data('id');

    if (confirm("Are you sure you want to delete this Category?")) {
        $.ajax({
            url: '/categories/' + category_id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
                 category: category_id,

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
              alert('Deletion of this Category is forbidden as it is used.');
                console.log(data);
                if(data.status==false){
                  alert('Deletion of this Category is forbidden as it is used.');
                }
                if (data.status !== 500) {
                    alert('An error occurred while deleting the Category.');
                }
            }
        });
    }
});


</script>









{{-- /////////////////////////////////////////////////////////// --}}



{{-- /////////////////////////////Pagination category///////////////////////////////////// --}}
<script>
  $(document).on('click', '.pagination a', function(e){

  e.preventDefault();
  let page = $(this).attr('href').split('page=')[1];
  category(page);
});

function category(page) {
    $.ajax({
      url: "/pagination/paginate-category?page=" + page,
        type: 'get',
        success: function(data) {
            $('.table-responsive').html(data);
        }
    });
}

</script>
{{-- ////////////////////////////////////////////////////////////// --}}


{{-- /////////////////////////////Search category///////////////////////////////////// --}}
<script>
  $(document).on('keyup',function(e){
  e.preventDefault();
  let search_string=$('#search').val();

  $.ajax({
    url:"{{ route('search.category') }}",
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















