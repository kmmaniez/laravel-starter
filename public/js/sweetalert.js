const formData     = document.querySelectorAll('form');
const BASE_URL     = document.documentURI
const deleteButton = document.querySelectorAll('.delete');

let dataId;
formData.forEach((form, idx) => {
  deleteButton.forEach((btn, id) => {

    btn.addEventListener('click', (e) => {
      e.preventDefault();
      dataId = btn.getAttribute('id');
      // console.log(BASE_URL);
      console.log(form, idx);
      console.log(btn, id);
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

            window.location.href = BASE_URL+ '/' +dataId;
            Swal.fire({
              title:'Deleted',
              text:'Your file has been deleted.',
              icon: 'success'
            })
          }
        })
    })

})
  })