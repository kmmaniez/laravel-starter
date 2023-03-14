const formData      = document.querySelectorAll('form');
const BASE_URL      = document.documentURI;
const deleteButton  = document.querySelectorAll('.delete');

const newPassword   = document.querySelector('#password');
const confPassword  = document.querySelector('#password_confirmation');
const btnUpdatePass = document.querySelector('#update_pass');

// Default disable button update password
btnUpdatePass.disabled = true;
confPassword.addEventListener('keyup', function () {
  if (newPassword.value === confPassword.value) {
    // button enabled
    btnUpdatePass.disabled = false;
  }else{
    btnUpdatePass.disabled = true;
  }
})

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

$(document).ready(function () {
  setTimeout(() => {
    $('.alert-notif').remove()
  }, 1800);
})

$('body').on('click', '#create-posts', function () {

  //open modal
  $('#modal-create').modal('show');
});