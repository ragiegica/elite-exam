'use strict';

$(document).on('click', '.view-artist', function () {

    let artistIndex = $(this).data('id');
    let newDetailArtistURL = detailArtistURL.replace(':id', artistIndex);

    $.ajax({
        url: newDetailArtistURL,
        type: "GET",
        dataType: "json",
        success: function (response) {

            $(document).find('#view-title').html(response.name);
            $(document).find('#view-code').html(response.code);
            $(document).find('#view-artist-modal').modal('show');

        },
        error: function (error) {
            alert('fetching details error occured');
            console.log(error);
        }
    });

});
