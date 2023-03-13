const formData      = document.querySelectorAll('form');
const BASE_URL      = document.documentURI;
const deleteButton  = document.querySelectorAll('.delete');

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
    $('.alert-notif').css('display','none');
  }, 2000);
})

$('body').on('click', '#create-posts', function () {

  //open modal
  $('#modal-create').modal('show');
});