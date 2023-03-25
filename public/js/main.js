// Get token from your app
let token             = document.getElementsByTagName('meta')[5].getAttribute('content');

// Profile section
const newPassword     = document.querySelector('#password');
const confPassword    = document.querySelector('#password_confirmation');
const btnUpdatePass   = document.querySelector('#update_pass');

// Category section
const btnCreatePost   = document.querySelector('#create-post');
const deleteButton    = document.querySelectorAll('#delete-post');

// Default disable button update password
if (window.location.pathname === '/profile') {
  btnUpdatePass.disabled = true;
  confPassword.addEventListener('keyup', function () {
    if (newPassword.value === confPassword.value) {
      btnUpdatePass.disabled = false;
    }else{
      btnUpdatePass.disabled = true;
    }
  })

  $(document).ready(function () {
    setTimeout(() => {
      $('.alert-notif').remove()
    }, 1800);
  })
}
// Event delete button category
deleteButton.forEach(btn => {
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    let categoryId  = btn.getAttribute('data-id');

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to delete this data ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        })
        .then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: window.location.pathname + '/' + categoryId,
              type: "DELETE",
              cache: false,
              data: {
                  "_token": token
              },
              success:function(response){ 
                  Swal.fire({
                      type: 'success',
                      icon: 'success',
                      title: `${response.message}`,
                      showConfirmButton: false
                  });
                  reloadPage(1000);
              }
            });
            }
        })
      })
})

/* START MODAL CATEGORY */

// Open modal create
$('body').on('click', '#create-post', function () {
  $('#modal-create').modal('show');

  // Save from modal
  $('#save').click(function(e) {
    e.preventDefault();

    // Define variable & get value
    let categoryName    = $('#category_name').val();

    $.ajax({
        url: window.location.pathname,
        type: "POST",
        cache: false,
        data: {
            "category_name": categoryName,
            "_token": token
        },
        // If success
        success:function(response){
          console.log(response);
            Swal.fire({
                icon: 'success',
                title: `${response.message}`,
                showConfirmButton: false,
                timer: 2000
            });

            // Clear form
            $('#category_name').val('');
            // Close modal
            $('#modal-create').modal('hide');

        },
        // If fails
        error:function(error){
            if(error.responseJSON.category_name[0]) {
                // Show alert
                $('#alert_category').removeClass('d-none');
                $('#alert_category').addClass('d-block');

                // Add message to alert
                $('#alert_category').html(error.responseJSON.category_name[0]);
            }
        }

    });
  });
});

// Open modal edit
$('body').on('click', '#edit-post', function () {
  let categoryId    = $(this).data('id');
  let url           = window.location.pathname + '/' + categoryId;

  // Get data
  $.ajax({
    url: url,
    type: "GET",
    cache: false,
    success:function(response){
      $('#category_name_update').val(response.data.name);
      $('#modal-update').modal('show');
    }
  });
  
  // Process update
  $('#update').click(function(e) {
    e.preventDefault();

    let categoryName    = $('#category_name_update').val();

    $.ajax({
        url: url,
        type: "PUT",
        cache: false,
        data: {
            "id": categoryId,
            "category_name_update": categoryName,
            "_token": token
        },
        // If success
        success:function(response){
            Swal.fire({
                type: 'success',
                icon: 'success',
                title: `${response.message}`,
                showConfirmButton: false,
            });
            
            $('#category_name_update').val('');
            $('#modal-update').modal('hide');
            reloadPage(1500);
  
        },
        // If fails
        error:function(error){
            if(error.responseJSON.category_name[0]) {
                $('#alert_category_update').removeClass('d-none');
                $('#alert_category_update').addClass('d-block');
  
                $('#alert_category_update').html(error.responseJSON.category_name[0]);
            }
        }
  
    });
    
  });

});

/* END MODAL CATEGORY */

// Post section
const titlePost = document.querySelector('#title');
const slugPost  = document.querySelector('#slug');
if (window.location.pathname === '/blog/post/create') {
  
  titlePost.addEventListener('change', () => {
    fetch('/blog/checkSlug?slug=' + titlePost.value)
        .then(response => response.json())
        .then(data => slugPost.value = data.slug)
        .catch(error => console.error(error))
  })
  
}


/* Product DataTable */
$(document).ready(function () {
  $('#productDataTable').DataTable({
       processing: true,
       serverSide: true,
       ajax: '/products',
       columns: [
           { data: 'DT_RowIndex', name: 'id' },
           { data: 'name', name: 'name' },
           { data: 'quantity', name: 'quantity' },
           { data: 'price', name: 'price' },
           {
             data: 'action', 
             name: 'action', 
             orderable: true, 
             searchable: true
         },
       ],
       "language": {
           "processing": "<div class=\"spinner-border bg-transparent\" role=\"status\"></div>"
       }
   })
});

/* START MODAL PRODUCT */

// Open modal create
$('body').on('click', '#create-product', function () {
  $('#modal-create').modal('show');

  // Save from modal
  $('#saveProduct').click(function (e){
    e.preventDefault()
    const productName     = $('#name').val();
    const productQuantity = $('#quantity').val();
    const productPrice    = $('#price').val();

    $.ajax({
        url: window.location.pathname,
        type: "POST",
        cache: false,
        data: {
          "_token": token,
          "name": productName,
          "quantity": productQuantity,
          "price": productPrice
        },
        success:function(response){
          console.log(response);
            Swal.fire({
                icon: 'success',
                title: `${response.message}`,
                showConfirmButton: false,
                timer: 2000
            });

            // Clear form
            $('#name').val('');
            $('#quantity').val('');
            $('#price').val('');

            // Close modal
            $('#modal-create').modal('hide');

        },
        error:function(error){
          
          if(error.responseJSON.errors.hasOwnProperty('name')) {
            $('#name').addClass('is-invalid')
            $('#invalidName').text(`${error.responseJSON.errors.name[0]}`)
          }

          if(error.responseJSON.errors.hasOwnProperty('quantity')) {
            $('#quantity').addClass('is-invalid')
            $('#invalidQuantity').text(`${error.responseJSON.errors.quantity[0]}`)
          }
          
          if(error.responseJSON.errors.hasOwnProperty('price')) {
            $('#price').addClass('is-invalid')
            $('#invalidPrice').text(`${error.responseJSON.errors.price[0]}`)
          }
        }

    });
  })
});

// ---------- FUNCTION ---------- // 

/* Preview image */
function previewImage() {
  const image         = document.querySelector('#thumbnail');
  const imgPreview    = document.querySelector('.img-preview');
  
  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);
  oFReader.onload = function (oFREvent) {
      imgPreview.src = oFREvent.target.result;
  }
}

/* Reload/refresh page */
function reloadPage(milisec){
  setTimeout(() => {
    window.location.reload();
  }, milisec);
}