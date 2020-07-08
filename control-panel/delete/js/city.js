$(document).ready(function () {
    $(document).on('click','.delete-city',function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");

        Swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!", 
        }).then((result) => {
            if (result.value) { 
                $.ajax({
                    url: "delete/ajax/city.php",
                    type: "POST",
                    data: {id: id, option: 'delete'},
                    dataType: "JSON",
                    success: function (jsonStr) {
                        if (jsonStr.status) {
                            Swal.fire('Deleted!','District has been deleted.','success')  
                            $('#row_' + id).remove();

                        }
                    }
                });
            }
        });
    });
});