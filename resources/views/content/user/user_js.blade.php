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



<script>
  $(document).ready(function () {
    var fileInput = $('#demo');
    var previewImage = $('#preview'); // Updated ID

    // Listen for changes to the file input field
    fileInput.on('change', function () {
      // Get the selected file
      var file = fileInput.get(0).files[0];

      // Create a new FileReader object
      var reader = new FileReader();

      // Set the image source when the file is loaded
      reader.onload = function (event) {
        previewImage.attr('src', event.target.result);
      };

      // Read the selected file as a data URL
      reader.readAsDataURL(file);
    });
  });

  function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function () {
      var dataURL = reader.result;
      var img = document.getElementById('preview');
      img.src = dataURL;
      img.style.display = 'block';
      img.style.maxWidth = '200px';
    };
    reader.readAsDataURL(input.files[0]);
  }
</script>






{{-- /////////////////////////////Pagination User///////////////////////////////////// --}}
<script>
  $(document).on('click', '.pagination a', function(e){

  e.preventDefault();
  let page = $(this).attr('href').split('page=')[1];
  user(page);

});

function user(page) {
    $.ajax({
      url: "/pagination/paginate-user/"  + "?page=" + page, // Updated URL
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
    let role = $('#role').val();
    let status = $("#status").val();
  console.log(role);
  console.log(status);
    $.ajax({
      url: "/search-user/",
      method: 'GET',
      data: {
        search_string: search_string,
        role: role,
        status: status
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

  $('#role').change(function () {

    performSearch();
  });

  $('#status').change(function () {

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
