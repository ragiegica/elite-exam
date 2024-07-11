'use strict';

/* preload artist selector */
function preloadArtistSelector() {
    $.ajax({
        url: artistListURL,
        type: "GET",
        dataType: "json",
        success: function (data) {

            if (data.length > 0) {
                $(document).find('#artist-selector').empty().append('<option value="" disabled selected>--- Select Artist ---</option>');
                $.each(data,function(i,v){
                    $(document).find('#artist-selector').append(`
                        <option value="${v.id}">${v.name}</option>
                    `)
                });
            } else {
                $(document).find('#artist-selector').empty().append('<option value="" disabled selected>--- No Data ---</option>');
            }

        },
        error: function (error) {
            alert('fetching all artist list error occured');
            console.log(error);
        }
    });
}
preloadArtistSelector()

/* on selecting artist */
$(document).on('change', '#artist-selector', function () {

    let artistIndex = $(this).val();
    let newOverviewURL = overviewURL.replace(':id', artistIndex);

    $.ajax({
        url: newOverviewURL,
        type: "GET",
        dataType: "json",
        success: function (data) {
            $(document).find('#overview-artist-name').html(data.artist);
            $(document).find('#album-sold').html(data.total_albums);
            $(document).find('#combined-sales').html(data.total_sales);
        },
        error: function (error) {
            alert('fetching details error occured');
            console.log(error);
        }
    });

});
