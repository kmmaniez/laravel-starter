const formData      = document.querySelectorAll('form');
const BASE_URL      = document.documentURI;
const deleteButton  = document.querySelectorAll('.delete');

const newPassword   = document.querySelector('#password');
const confPassword  = document.querySelector('#password_confirmation');
const btnUpdatePass = document.querySelector('#update_pass');
const createpost = document.querySelector('#create-post')
// Default disable button update password
if (window.location.pathname === '/profile') {
  btnUpdatePass.disabled = true;
  confPassword.addEventListener('keyup', function () {
    if (newPassword.value === confPassword.value) {
      // button enabled
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

deleteButton.forEach(btn => {
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    // console.log(BASE_URL);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title:'Deleted',
            text:'Data has been deleted.',
            icon: 'success',
            showConfirmButton: false,
          })
        }
      })
  })
})



// Open modal
$('body').on('click', '#create-post', function () {
  $('#modal-create').modal('show');
});

// Save from modal
$('#save').click(function(e) {
  e.preventDefault();

  // Define variable & get value
  let categoryName    = $('#category_name').val();
  let token           = $("meta[name='csrf-token']").attr("content");

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

          Swal.fire({
              type: 'success',
              icon: 'success',
              title: `${response.message}`,
              showConfirmButton: false,
              timer: 3000
          });

          // Data
          let post = `
              <tr id="index_${response.data.id}">
                  <td>${response.data.name}</td>
                  <td class="text-center">
                      <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                      <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                  </td>
              </tr>
          `;
          //append to table
          $('#table-posts').prepend(post);
          
          //clear form
          $('#category_name').val('');
          
          //close modal
          $('#modal-create').modal('hide');
          setTimeout(() => {
            window.location.reload();
          }, 1500);

      },
      // If fails
      error:function(error){
          console.log(error);
          if(error.responseJSON.category_name[0]) {

              //show alert
              $('#alert_category').removeClass('d-none');
              $('#alert_category').addClass('d-block');

              //add message to alert
              $('#alert_category').html(error.responseJSON.category_name[0]);

          } 

      }

  });
  
}); 