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
{{-- ///////////////////////////////to delete country ////////////////////////////// --}}

<style>
  label.required:after {
    content: " *";
    color: red;
  }
</style>






<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function () {
        // Update image preview when a file is selected
        $('#image').change(function () {
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







{{-- /** to fetch list of the data of Currencies and populate the dropdown*/// --}}
<script>
  $(document).ready(function(){

    $.ajax({
  url: "{{ route('currencies.display') }}",
  method: 'GET',
  dataType: "json",
  success: function (data) {
    // populate the dropdown with the received country data
    var options='<option value=""> Select Currency </option>';
    $.each(data, function (index, currency) {
      options += '<option value="' + currency.id + '">' + currency.name + '</option>';
    });
    $('#currency_id').html(options);
  },
  error: function (response) {
    // Handle error if fetching countries fails
    console.error('Error fetching currencies:', response);
  }
});


  });

</script>





{{-- /***update City*// --}}

<script>
  $(document).on("click", ".close-btn", function(e) {
    $('.errMsgContainer').empty(); // Clear error messages when form is closed
});


$(document).on("click", '.update_country_form', function() {
    /* To retrieve the data values from the form */
    let id = $(this).data('id');
    let name_en = $(this).data('name_en');
    let name_ar = $(this).data('name_ar');
    let district_en = $(this).data('district_en');
    let district_ar = $(this).data('district_ar');
    let population = $(this).data('population');
    let countrycode = $(this).data('countrycode');

    /** To set the values for each input **/
    $('#up_id').val(id);
    $('#up_name_en').val(name_en);
    $('#up_name_ar').val(name_ar);
    $('#up_district_en').val(district_en);
    $('#up_district_ar').val(district_ar);
    $('#up_population').val(population);
    $('#up_code').val(countrycode); // Assuming 'countrycode' corresponds to 'code' field
    $('#up_continent').val($(this).data('continent')); // Assuming 'continent' corresponds to 'continent' field
    // Set other input fields as needed
});

$(document).on("click", ".update_country", function(e) {
    e.preventDefault();
    let id = $('#up_id').val();
    let up_name_en = $('#up_name_en').val();
    let up_name_ar = $('#up_name_ar').val();
    let up_district_ar = $('#up_district_ar').val();
    let up_district_en = $('#up_district_en').val();
    let up_code = $('#up_code').val(); // Assuming 'code' corresponds to 'countrycode' field
    let up_continent = $('#up_continent').val(); // Assuming 'continent' corresponds to 'continent' field
    let up_population = $('#up_population').val();

    $('.errMsgContainer').empty(); // Clear previous error messages

    $.ajax({
        url: "{{ route('countries.update', ['country' => ':id']) }}".replace(':id', id),
        method: "put",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            up_name_en: up_name_en,
            up_name_ar: up_name_ar,
            up_district_en: up_district_en,
            up_district_ar: up_district_ar,
            up_code: up_code, // Assuming 'code' corresponds to 'countrycode' field
            up_continent: up_continent, // Assuming 'continent' corresponds to 'continent' field
            up_population: up_population
            // Add other fields as needed
        },
        dataType: "json",
        success: function(data) {
            console.log('AJAX request successful:', data);

            if (data.status) {
                console.log(data);
                // Update successful
                $('#updateModal').modal('hide');
                $('#data-table2').load(location.href + ' #data-table2');
                $('#success2').show();
                /* hide success message after 4 seconds */
                setTimeout(function() {
                    $('#success2').hide();
                }, 2000); // 2000 milliseconds = 2 seconds
            } else {
                // Update failed
                console.error('Failed to update Country');
            }
        },
        error: function(response) {
            $('.errMsgContainer').empty(); // Clear previous error messages
            errors = response.responseJSON.errors;
            $.each(errors, function(index, value) {
                $('.errMsgContainer').append('<span class="text-danger">' + value + '</span></br>');
            });
        }
    });
});

</script>


{{-- ////////////////////////////////////////**add country///////////////////////////////////--}}
<script>
  $(document).ready(function(){
    $(document).on("click", '.add_country', function(e){
        e.preventDefault();
        let name_en = $('#name_en').val();
        let name_ar= $('#name_ar').val();
        let country_code = $('#country_code').val();
        let image = $('#image')[0].files[0];

        var formData = new FormData();
        formData.append('name_en', name_en);
        formData.append('image', image); // Corrected here
        formData.append('name_ar', name_ar);
        formData.append('country_code', country_code);

        $('.errMsgContainer').empty(); // Clear previous error messages

        $.ajax({
            url: "{{ route('countries.store') }}",
            method: 'post',
            data: formData,
            processData: false, // Set processData to false to prevent jQuery from automatically processing the data
            contentType: false, // Set contentType to false to prevent jQuery from setting the content type
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
              console.log(data);
              $('.errMsgContainer').empty(); // Clear previous error messages
              $("#addModal").modal("hide");
              $('#addCountryForm')[0].reset();
              $('#data-table2').load(location.href+' #data-table2');
              $('#success1').show();
                /* hide success message after 4 seconds */
                setTimeout(function() {
                    $('#success1').hide();
                }, 2000); // 2000 milliseconds = 2 seconds
              $('.errMsgContainer').empty(); // Clear previous error messages

            },
            error: function(response) {
              console.log(response);

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

{{-- ////////////////////////////////////////**add country///////////////////////////////////--}}





{{-- //////////////////////////////Delete country////////////////////////////// --}}

<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



$(document).on('click', '.delete-country', function (e) {
  $('.errMsgContainer').empty(); // Clear previous error messages
    e.preventDefault();

    e.stopPropagation();
    var country_id = $(this).data('id');

    if (confirm("Are you sure you want to delete this Country?")) {
        $.ajax({
            url: '/countries/' + country_id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
                country: country_id,

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
              alert('Deletion of this Country is forbidden as it is used.');
                console.log(data);
                if(data.status==false){
                  alert('Deletion of this Country is forbidden as it is used.');
                }
                if (data.status !== 500) {
                    alert('An error occurred while deleting the Country.');
                }
            }
        });
    }
});


</script>

            {{-- //////////////////////////////DElete City////////////////////////////// --}}



            {{-- /////////////////////////////Pagination City///////////////////////////////////// --}}
<script>


 $(document).on('click', '.pagination a', function(e){

  e.preventDefault();
  let page = $(this).attr('href').split('page=')[1];
  country(page);
});

function country(page) {
    $.ajax({
      url: "/pagination/paginate-country?page=" + page,
        type: 'get',
        success: function(data) {
            $('.table-responsive').html(data);
        }
    });
}
</script>
            {{-- /////////////////////////////Pagination City///////////////////////////////////// --}}


                        {{-- /////////////////////////////Search City///////////////////////////////////// --}}
<script>
$(document).on('keyup',function(e){
  e.preventDefault();
  let search_string=$('#search').val();
  // console.log(search_string);
  $.ajax({
    url:"{{ route('search.country') }}",
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
