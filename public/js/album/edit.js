'use strict';


$(document).on('click', '.edit-album', function () {

    $('#edit-album-form')[0].reset();
    let albumIndex = $(this).data('id');
    let newDetailAlbumURL = detailAlbumURL.replace(':id', albumIndex);

    $.ajax({
        url: newDetailAlbumURL,
        type: "GET",
        dataType: "json",
        success: function (response) {
            preloadArtistSelector(response.artist_id);
            $(document).find('#album-id').val(response.id);
            $(document).find('#edit-name').val(response.name);
            $(document).find('#edit-sales-data').val(response.sales_data);
            $(document).find('#edit-release-date').val(response.release_date);
            $(document).find('#edit-last-date').val(response.last_update);
            $(document).find('#edit-album-modal').modal('show');
        },
        error: function (error) {
            alert('fetching details error occured');
            console.log(error);
        }
    });

});

$('#edit-album-form').submit(function (e) {
    e.preventDefault();

    $.ajax({
        url: editAlbumURL,
        type: "POST",
        headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
            $(document).find('#edit-album-modal').modal('hide');
            alert('Updated Successfully');
            index();
        },
        error: function (error) {
            alert('update error occured');
            console.log(error);
        }
    });

});
