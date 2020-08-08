$(document).ready(function () {
    $('.delete-property').click(function () {

        var id = $(this).attr("data-id");
        Swal.fire({
            title: 'Are you sure?',
            text: `You'r about to delete this proprty!`,
            icon:  `warning`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Yes, delete it!`
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "delete/ajax/property.php",
                    type: "POST",
                    data: {
                        id,
                        option: 'delete'
                    },
                    dataType: "JSON",
                    success: function (data) {
                        if (data.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Proprty has been deleted.',
                                showConfirmButton: false,
                                timer: 1500
                              })
                            $('#row_' + id).remove();
                        }
                        
                    }
        
                })
            }
          })
    });
});