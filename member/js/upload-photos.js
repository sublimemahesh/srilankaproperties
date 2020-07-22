$(document).ready(function() {
    $('#upload_first_image').change(function() {
        if ($('.property-images-section ._uploadedimagesbox').length < 8) {

            $('.flipScrollableArea').removeClass('hidden');
            $('._uploadloaderbox').css('display', 'inline-block');

            var left = $('._uploadouterbox').css('left');
            var newleft = parseInt(left) + 105;
            $('._uploadouterbox').css('left', newleft + 'px');
            //        $('._uploadloaderbox').append()

            $('#img_loader').show();

            setTimeout(function() {
                var fi = document.getElementById('upload_first_image'); // GET THE FILE INPUT.
                if (fi.files.length > 0) {

                    for (var i = 0; i <= fi.files.length - 1; i++) {
                        var fsize = fi.files.item(i).size; // THE SIZE OF THE FILE.
                        if (Math.round((fsize / 1024)) > 10000) {
                            $('._uploadloaderbox').css('display', 'none');

                            swal({
                                title: "Error!",
                                text: "Image is too large and please upload a image size less than 10MB",
                                type: 'error',
                                timer: 2000,
                                showConfirmButton: false

                            });
                            return false;
                        }
                    }
                }
                var formData = new FormData($('form#property-form')[0]);

                $.ajax({
                    url: "ajax/upload-photos.php",
                    type: "POST",
                    data: formData,
                    async: true,
                    dataType: 'json',
                    success: function(mess) {

                        var arr = mess.filename.split('.');
                        var html = '';
                        html += '<div class="_uploadedimagesbox" role="presentation" id="col_' + arr[0] + '">';
                        html += '<div data-testid="media-attachment-photo">';
                        html += '<span>';
                        html += '<div class="_uploadedimages" style="width: 100px; height: 100px;" id="js_3mg" aria-controls="js_3mh" aria-haspopup="true">';
                        html += '<img alt="Thaksalawa users" class="img" src="../upload/properties/gallery/thumb/' + mess.filename + '" width="100" height="100">';
                        html += '<input type="hidden" class="post-all-images" name="post-all-images[]" value="' + mess.filename + '"/>';
                        html += '<i class="img-post-delete _buttons _btn _removebtn _5upp _42ft fa fa-times" title="Remove Photo" id="' + arr[0] + '"></i>';
                        html += '</div>';
                        html += '</span>';
                        html += '</div>';
                        html += '</div>';
                        $('#img_loader').hide();
                        $('.flipScrollableArea').removeClass('hidden');
                        $('._uploadloaderbox').css('display', 'none');
                        $('.flipScrollableAreaContent1').prepend(html);
                        $('#upload_first_image').val('');

                        //                if ($('#image-list ._uploadedimagesbox').length > 1) {
                        //                    var left = $('._uploadouterbox').css('left');
                        var left1 = $('._uploadloaderbox').css('left');
                        //                    var newleft = parseInt(left) + 100;
                        var newleft1 = parseInt(left1) + 105;
                        //                    $('._uploadouterbox').css('left', newleft + 'px');
                        $('._uploadloaderbox').css('left', newleft1 + 'px');
                        $('.share-post').removeAttr('disabled');
                        //                }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

            }, 2000);
        } else {
            swal({
                title: "Error!",
                text: "You are exceeding the maximum photo limit.",
                type: 'error',
                timer: 2000,
                showConfirmButton: false

            });
            return false;
        }


    });

    $('#image-list').on('click', '.img-post-delete', function() {

        var image = this.id;

        $.ajax({
            url: 'ajax/upload-photos.php',
            type: "POST",
            dataType: "JSON",
            data: {
                image_name: image,
                option: 'DELETEIMAGE'
            },
            success: function(response) {
                $('#col_' + image).remove();
                var left = $('._uploadouterbox').css('left');
                if (left == '112px') {

                    $('.flipScrollableArea').addClass('hidden');
                } else {
                    var newleft = parseInt(left) - 100;
                    $('._uploadouterbox').css('left', newleft + 'px');
                    var left1 = $('._uploadloaderbox').css('left');
                    var newleft1 = parseInt(left1) - 110;
                    $('._uploadloaderbox').css('left', newleft1 + 'px');
                }
            }
        });
    });
});

function removePhoto(input) {
    input.parentNode.remove();

    var left = $('._uploadouterbox').css('left');

    if (left == '112px') {
        $('.flipScrollableArea').addClass('hidden');
    } else {
        var newleft = parseInt(left) - 100;
        $('._uploadouterbox').css('left', newleft + 'px');
    }

    var input = document.getElementById('rem-photo');
    var image = input.defaultValue;
    alert(image);
    $('#col1_' + image).addClass('removeItems');
    $.ajax({
        url: 'ajax/upload-photos.php',
        type: "POST",
        dataType: "JSON",
        data: {
            image_name: image,
            option: 'DELETEIMAGE'
        },
        success: function(response) {
            return true;
        }
    });
}