'use strict';


$(document).on('click', '.delete-artist', function () {

    let artistIndex = $(this).data('id');
    let newDeleteURL = deleteArtistURL.replace(':id', artistIndex);

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
