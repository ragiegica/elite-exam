'use strict';


$(document).on('click', '.delete-album', function () {

    let albumIndex = $(this).data('id');
    let newDeleteURL = deleteAlbumURL.replace(':id', albumIndex);

    $.ajax({
        url: newDeleteURL,
        type: "DELETE",
        headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
        success: function () {

            alert('Delete Successfully');
            index();

        },
        error: function (error) {
            alert('delete error occured');
            console.log(error);
        }
    });

});
