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
        $('#image').change(function () {
            var input = this;
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-preview').attr('src', e.target.result);
                $('#image-preview').attr('src', e.target.result).width(200).height(200); // Adjust width and height as needed
            };

            reader.readAsDataURL(input.files[0]);
        });
    });
</script>











{{-- Add Brand with colors and models --}}

<script>
  let branchId = 1;


  function addModel() {
    const container = document.getElementById('modelsContainer');

    const branchDiv = document.createElement('div');
    branchDiv.className = 'model mb-3';

    function createInput(type, name, placeholder, step, marginLeft = '20px') {
      const input = document.createElement('input');
      input.type = type;
      input.className = 'form-control';
      input.name = name;
      input.placeholder = placeholder;
      if (step) {
        input.step = step;
      }
      input.style.marginLeft = marginLeft;
      input.style.width = '480px';
      return input;
    }

    // model Name
    branchDiv.appendChild(createInput('text', `branches[${branchId}][name]`,  'Branch Name'));
    branchDiv.appendChild(document.createElement('br'));


    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.className = 'btn btn-danger';
    removeButton.textContent = 'Remove Model';
    removeButton.style.marginLeft = "20px";
    removeButton.onclick = function () {
      container.removeChild(branchDiv);
    };

    branchDiv.appendChild(removeButton);

    container.appendChild(branchDiv);
    branchId++;
  }


</script>






{{-- ----------------------------------------------------------------------- --}}




{{-- /***update Brand*// --}}

<script>
  $(document).on("click", ".close-btn", function(e) {
    $('.errMsgContainer').empty(); // Clear error messages when form is closed
});


  $(document).on("click", '.update_brand_form', function() {
    /* To retrieve the data values from the form */
    let id = $(this).data('id');
    let name = $(this).data('name');

    /** To set the values for each input **/
    $('#up_id').val(id);
    $('#up_name').val(name);

});

$(document).on("click", ".update_brand", function(e) {
    e.preventDefault();
    let id = $('#up_id').val();
    let up_name = $('#up_name').val();
    $('.errMsgContainer').empty(); // Clear previous error messages

    $.ajax({
        url: "{{ route('studies.update', ['study' => ':id']) }}".replace(':id', id),
        method: "put",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            up_name: up_name,
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
                console.error('Failed to update Brand');
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


{{-- /////////////////////////////////////////////////Add Study with branches///////////////////////////////////////////////////--}}
<script>
$(document).ready(function() {
  $(document).on("click", '.add_study', function(e) {
    e.preventDefault();
    let name = $('#name').val();
    let image = $('#image')[0].files[0];
    let branches = [];


    // Extract model data from the dynamic form
    $('.model').each(function(index, element) {
      let branchName = $(element).find('input[name^="branches["]').val();
      branches.push({
        name: branchName // Assuming you have `modelName` defined elsewhere
      });
    });
    console.log(branches);

    var formData = new FormData();
    formData.append('name', name);
    formData.append('image', image);
    formData.append('branches', JSON.stringify(branches)); //

    $('.errMsgContainer').empty(); // Clear previous error messages
    console.log(name);

    $.ajax({
      url: "{{ route('studies.store') }}",
      method: 'post',
      data: formData,
      processData: false, // Set processData to false to prevent jQuery from automatically processing the data
      contentType: false, // Set contentType to false to prevent jQuery from setting the content type
      // Remove unnecessary dataType: "json"
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function(data) {
        console.log(data);
        $('.errMsgContainer').empty(); // Clear previous error messages
        $("#addModal").modal("hide");
        $('#addStudyForm')[0].reset();
        // Consider a more specific approach to update the table data
        $('#data-table2').load(location.href+' #data-table2');
        $('#success1').show();
        setTimeout(function() { /* hide success message after 4 seconds */
          $('#success1').hide();
        }, 2000);
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


{{-- /////////////////////////////////////////////////////////////////////////////////////// --}}







{{-- //////////////////////////////Delete Brand////////////////////////////// --}}

<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Use document or a container element that is always present on the page
$(document).on('click', '.delete-study', function (e) {
    e.preventDefault();
    var study_id = $(this).data('id');

    if (confirm("Are you sure you want to delete this brand?")) {
        $.ajax({
            url: 'studies/' + study_id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
                study: study_id
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
              alert('Deletion of this Study is forbidden as it is used.');
                console.log(data);
                if(data.status==false){
                  alert('Deletion of this Study is forbidden as it is used.');
                }
                if (data.status !== 500) {
                    alert('An error occurred while deleting the Study.');
                }
            }
        });
    }
});


</script>

{{-- /////////////////////////////////////////////////////////// --}}



{{-- /////////////////////////////Pagination Brand///////////////////////////////////// --}}
<script>
  $(document).on('click', '.pagination a', function(e){

  e.preventDefault();
  let page = $(this).attr('href').split('page=')[1];
  study(page);
});

function brand(page) {
    $.ajax({
      url: "/pagination/paginate-study?page=" + page,
        type: 'get',
        success: function(data) {
            $('.table-responsive').html(data);
        }
    });
}

</script>
{{-- ////////////////////////////////////////////////////////////// --}}


{{-- /////////////////////////////Search Brand///////////////////////////////////// --}}
<script>
  $(document).on('keyup',function(e){
  e.preventDefault();
  let search_string=$('#search').val();
  // console.log(search_string);
  $.ajax({
    url:"{{ route('search.study') }}",
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

{{-- ///////////////////////////////////////////////////////////////////////////--}}




















{{-- /////////////////////////////////////////////////Add Brand with models and
colors///////////////////////////////////////////////////--}}
{{-- <script>
  $(document).ready(function(){
    $(document).on("click", '.add_brandcolor', function(e){
        e.preventDefault();
         let brandname = $('#brandname').val();
         let models = [];
         console.log(brandname);

// Extract model data from the dynamic form
$('.color').each(function(index, element) {

  let modelOptions = $(element).find('select[name^="models["]').val();


  models.push({

    options: modelOptions,
  });
});



        $('.errMsgContainer').empty(); // Clear previous error messages
        console.log(brandname);

        $.ajax({
            url: "{{ route('brandcolors.store') }}",
            method: 'post',
            data: {
                name: brandname,
                models: models,
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
              console.log(data);
              $('.errMsgContainer').empty(); // Clear previous error messages
              $("#addModalColor").modal("hide");
              $('#addBrandcolorForm')[0].reset();
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
</script> --}}

{{-- ///////////////////////////////////////////////////////////////////////////--}}
