//update
$(document).ready(function() {
    $('#btn-save').click(function(event) {
        event.preventDefault();

        $('#btn-save').hide();
        $('#update-loading').show();

        if (!$('#title').val() || $('#title').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the title...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-save').show();
            $('#update-loading').hide();

        } else if (!$('#category').val() || $('#category').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select category...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-save').show();
            $('#update-loading').hide();

        } else if (!$('#sub-category').val() || $('#sub-category').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select sub category...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-save').show();
            $('#update-loading').hide();

        } else if (!$('#district').val() || $('#district').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select district...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-save').show();
            $('#update-loading').hide();

        } else if (!$('#city').val() || $('#city').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select city...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-save').show();
            $('#update-loading').hide();

        } else if (!$('#image').val() || $('#image').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select image...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-save').show();
            $('#update-loading').hide();

        } else if (!$('#email').val() || $('#email').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the email...",
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
            $('#btn-save').show();
            $('#update-loading').hide();

        } else if (!$('#phone-number').val() || $('#phone-number').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the phone number...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-save').show();
            $('#update-loading').hide();

        } else if (!$('#description').val() || $('#description').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the description...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-save').show();
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

                        $('#btn-save').show();
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

                        window.location.replace("manage-properties.php?status=0");
                    }
                }
            });
        }
        return false;
    });
    $('#btn-update').click(function(event) {
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

        } else if (!$('#image_name_old').val() || $('#image_name_old').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select image...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else if (!$('#email').val() || $('#email').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please enter the email...",
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

            var formData = new FormData($("form#edit-property-form")[0]);

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

                        window.location.replace("edit-property.php?id=" + result.id);
                    }
                }
            });
        }
        return false;
    });
    $('.delete-property').click(function() {

        var id = $(this).attr("data-id");

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this property!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function() {

            $.ajax({
                url: "ajax/property.php",
                type: "POST",
                data: { id: id, option: 'delete' },
                dataType: "JSON",
                success: function(jsonStr) {
                    if (jsonStr.status) {

                        swal({
                            title: "Deleted!",
                            text: "Property has been deleted.",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $('#row_' + id).remove();

                    }
                }
            });
        });
    });
});