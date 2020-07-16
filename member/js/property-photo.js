$(document).ready(function() {
    $('#btn-save').click(function(event) {
        event.preventDefault();

        $('#btn-save').hide();
        $('#update-loading').show();

        if (!$('#image').val() || $('#image').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select image...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-save').show();
            $('#update-loading').hide();

        } else {

            var formData = new FormData($("form#property-photo-form")[0]);

            $.ajax({
                url: "ajax/property-photo.php",
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
                            text: "Property image saved successfully.",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        window.location.replace("view-property-photos.php?id=" + result.id);
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

        if (!$('#image_name_old').val() || $('#image_name_old').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select image111...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            $('#btn-update').show();
            $('#update-loading').hide();

        } else {

            var formData = new FormData($("form#edit-property-photo-form")[0]);

            $.ajax({
                url: "ajax/property-photo.php",
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
                        window.location.replace("edit-property-photo.php?id=" + result.id);
                    }
                }
            });
        }
        return false;
    });
    $('#btn-arrange').click(function(event) {
        event.preventDefault();

        var formData = new FormData($("form#arrange-property-photo-form")[0]);

        $.ajax({
            url: "ajax/property-photo.php",
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
                        text: "Property photos arranged successfully.",
                        type: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });

                    location.reload();
                }
            }
        });

        return false;
    });
    $('.delete-property-photo').click(function() {

        var id = $(this).attr("data-id");

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this property image!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function() {

            $.ajax({
                url: "ajax/property-photo.php",
                type: "POST",
                data: { id: id, option: 'delete' },
                dataType: "JSON",
                success: function(jsonStr) {
                    if (jsonStr.status) {

                        swal({
                            title: "Deleted!",
                            text: "Property image has been deleted.",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });

                        $('#div' + id).remove();

                    }
                }
            });
        });
    });
});