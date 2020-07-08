//update
$(document).ready(function() {
    $('#btn-save').click(function(event) {
        event.preventDefault();

        $('#btn-update').hide();
        $('#update-loading').show();

        if (!$('#title').val() || $('#title').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the title...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else if (!$('#category').val() || $('#category').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select category...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else if (!$('#sub-category').val() || $('#sub-category').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select sub category...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else if (!$('#district').val() || $('#district').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select district...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else if (!$('#city').val() || $('#city').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select city...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else if (!$('#image').val() || $('#image').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select image...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else if (!$('#location').val() || $('#location').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the location...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else if (!$('#price').val() || $('#price').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the email...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else if (!$('#phone-number').val() || $('#phone-number').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the phone number...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else if (!$('#features').val() || $('#features').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the features...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else if (!$('#description').val() || $('#description').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the description...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else {

            var formData = new FormData($("form#property-form")[0]);

            $.ajax({
                url: "ajax/property.php",
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(result) {

                    if (result.status === 'error') {
                        swal({
                            title: "Error!",
                            text: "There was an error. Please try again later",
                            type: 'error',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $('#btn-update').show();
                        $('#update-loading').hide();

                        return false;
                    } else {
                        swal({
                            title: "Success.!",
                            text: "Property details updated successfully.",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        // window.location.replace("view-property-photos.php?id=" + result.id);
                        window.location.replace("add-new-property.php");
                    }
                }
            });
        }
        return false;
    });
});