const deleteButton = document.querySelector('.delete');

deleteButton.addEventListener('click',(e) => {
    e.preventDefault();
    // alert('ok')
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
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.'+ deleteButton.getAttribute('href'),
            'success'
          )
        }
      })
})