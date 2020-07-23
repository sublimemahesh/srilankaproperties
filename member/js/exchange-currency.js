$(document).ready(function() {
    $('#price_loader').hide();
    $('#price').change(function() {
        var price = $(this).val();
        $('#price_loader').show();
        $.ajax({
            url: "ajax/exchange-price.php",
            type: 'POST',
            data: {
                price,
                option: 'EXCHANGECURRENCY'
            },
            dataType: "JSON",
            success: function(result) {

                if (result.status === 'success') {
                    $('#price-dollar').val(result.price);
                    $('#price_loader').hide();
                }
            }
        });
    });
});