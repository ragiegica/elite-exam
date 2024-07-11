'use strict';

/* preload artist selector */
function loadTopArtist() {
    $.ajax({
        url: topArtistURL,
        type: "GET",
        dataType: "json",
        success: function (data) {

            if (data.message === null) {
                $(document).find('#top-artist').html(data.artist);
                $(document).find('#top-sales').html(data.total_sales);
            } else {
                $(document).find('#top-artist').html(data.message);
                $(document).find('#top-sales').html('---');
            }

        },
        error: function (error) {
            alert('fetching all artist list error occured');
            console.log(error);
        }
    });
}
loadTopArtist()
