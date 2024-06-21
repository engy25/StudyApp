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



{{-- /////////////////////////////Pagination Group///////////////////////////////////// --}}
<script>
  $(document).on('click', '.pagination a', function(e){

  e.preventDefault();
  let page = $(this).attr('href').split('page=')[1];
  group(page);

});

function group(page) {
    $.ajax({
      url: "/pagination/paginate-group/"  + "?page=" + page, // Updated URL
        type: 'get',
        success: function(data) {
            $('.table-responsive').html(data);
        }
    });
}

</script>
{{-- ////////////////////////////////////////////////////////////////// --}}


{{-- /////////////////////////////Search User///////////////////////////////////// --}}
<script>
  function performSearch() {
    let search_string = $('#search').val();
    let feature = $('#feature').val();
    let private = $("#private").val();
    let user = $('#user').val();
    let category = $("#category").val();
    console.log(user);
    console.log(private);
    console.log(feature);
    console.log(search_string);
    console.log(category);
    $.ajax({
      url: "/search-group/",
      method: 'GET',
      data: {
        search_string: search_string,
        feature: feature,
        private: private,
        user:user,
        category:category

      },
      success: function (data) {
        console.log(data);
        $('.table-responsive').html(data);
      },
      error: function (response) {
        console.log(response);
      }
    });
  }

  $(document).on('keyup', function (e) {

    performSearch();
  });

  $('#category').change(function () {

    performSearch();
  });

  $('#feature').change(function () {

    performSearch();
  });
  $('#user').change(function () {
    performSearch();
  });
  $('#private').change(function () {

    performSearch();
  });


</script>






<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Use document or a container element that is always present on the page
$(document).on('click', '.delete-user', function (e) {
    e.preventDefault();
    var user_id = $(this).data('id');

    if (confirm("Are you sure you want to delete this user?")) {
        $.ajax({
            url: 'users/' + user_id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
                user: user_id
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
              alert('Deletion of this User is forbidden as it is used.');
                console.log(data);
                if(data.status==false){
                  alert('Deletion of this User is forbidden as it is used.');
                }
                if (data.status !== 500) {
                    alert('An error occurred while deleting the User.');
                }
            }
        });
    }
});


</script>
