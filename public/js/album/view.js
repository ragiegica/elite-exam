'use strict';

$(document).on('click', '.view-album', function () {

    let albumIndex = $(this).data('id');
    let newDetailAlbumURL = detailAlbumURL.replace(':id', albumIndex);

    $.ajax({
        url: newDetailAlbumURL,
        type: "GET",
        dataType: "json",
        success: function (response) {

            console.log(response);
            if (response.cover === null) {
                $(document).find('#view-cover').attr('alt', 'No Image Available');
            } else {
                $(document).find('#view-cover').attr('src', response.cover);
            }

            $(document).find('#view-title').html(response.name);
            $(document).find('#view-artist').html(response.artist_name);
            $(document).find('#view-sales').html(response.sales_data_formatted);
            $(document).find('#view-release-date').html(response.release_date);
            $(document).find('#view-last-date').html(response.last_update);
            $(document).find('#view-cover').attr('src', response.cover);
            $(document).find('#view-album-modal').modal('show');

        },
        error: function (error) {
            alert('fetching details error occured');
            console.log(error);
        }
    });

});
