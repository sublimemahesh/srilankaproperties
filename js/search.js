$(document).ready(function () {
    $('#btn-search').click(function (event) {
        event.preventDefault();

        // $('#btn-search').hide();
        $('#update-loading').show();

        if ((!$('#category').val() || $('#category').val().length === 0) &&
                (!$('#keyword').val() || $('#keyword').val().length === 0) &&
                (!$('#sub-category').val() || $('#sub-category').val().length === 0) &&
                (!$('#district').val() || $('#district').val().length === 0) &&
                (!$('#city').val() || $('#city').val().length === 0)) {
            swal({
                title: "Error!",
                text: "Please select at least one filter...",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            // $('#btn-update').show();
            $('#update-loading').hide();
            return false;
        } else {
            $("form#search-form").submit();
        }
        $("form#search-form").submit();
        return false;
    });
});