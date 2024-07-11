'use strict';

$(document).on('click', '.add-album', function () {

    preloadArtistSelector()
    $('#add-album-form')[0].reset();
    $(document).find('#add-album-modal').modal('show');

})

$('#add-album-form').submit(function (e) {
    e.preventDefault();

    $.ajax({
        url: addAlbumURL,
        type: "POST",
        headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
            $(document).find('#add-album-modal').modal('hide');
            alert('Saved Successfully');
            index();
        },
        error: function (error) {
            alert('add error occured');
            console.log(error);
        }
    });

});
