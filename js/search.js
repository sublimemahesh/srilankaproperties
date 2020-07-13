$(document).ready(function() {
    $('#btn-search').click(function(event) {
        event.preventDefault();

        // $('#btn-search').hide();
        $('#update-loading').show();

        if (!$('#category').val() || $('#category').val().length === 0) {
            swal({
                title: "Error!",
                text: "Please select category...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            // $('#btn-update').show();
            $('#update-loading').hide();

        } else {
            $("form#search-form").submit();
        }
        return false;
    });
});