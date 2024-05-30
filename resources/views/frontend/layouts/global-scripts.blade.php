<script>

/** Show sweet alert confirem message **/
$('body').on('click', '.delete-item', function(e) {
    e.preventDefault()

    let url = $(this).attr('href');

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

            $.ajax({
                method: 'DELETE',
                url: url,
                data: {_token: "{{ csrf_token() }}"},
                success: function(response) {
                    if(response.status === 'success'){
                        toastr.success(response.message)

                        window.location.reload();

                    }else if(response.status === 'error'){
                        toastr.error(response.message)
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            })
        }
    })
})

/** Show Loader*/
function showLoader(){
    $('.overlay-container').removeClass('d-none');
    $('.overlay').addClass('active');
}

/** Hide Loader*/
function hideLoader(){
    $('.overlay').removeClass('active');
    $('.overlay-container').addClass('d-none');
}


/** Loard product modal**/


/** Loard product modal**/


/** Update sidebar cart**/



/** Remove cart product from sidebar*/


/** get current cart total amount*/

function getCartTotal(){
    return parseInt("{{ cartTotal() }}");
}


</script>
