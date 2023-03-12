const formData     = document.querySelectorAll('form');
const BASE_URL     = document.documentURI
const deleteButton = document.querySelectorAll('.delete');

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

$('body').on('click', '#create-post', function () {

  //open modal
  $('#modal-create').modal('show');
});