'use strict';


$(document).on('click', '.edit-artist', function () {

    $('#edit-artist-form')[0].reset();
    let artistIndex = $(this).data('id');
    let newDetailArtistURL = detailArtistURL.replace(':id', artistIndex);

    $.ajax({
        url: newDetailArtistURL,
        type: "GET",
        dataType: "json",
        success: function (response) {

            $(document).find('#artist-id').val(response.id);
            $(document).find('#edit-name').val(response.name);
            $(document).find('#edit-code').val(response.code);
            $(document).find('#edit-artist-modal').modal('show');

        },
        error: function (error) {
            alert('fetching details error occured');
            console.log(error);
        }
    });

});

$('#edit-artist-form').submit(function (e) {
    e.preventDefault();

    $.ajax({
        url: editArtistURL,
        type: "POST",
        headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            $(document).find('#edit-artist-modal').modal('hide');
            alert('Updated Successfully');
            index();
        },
        error: function (error) {
            alert('update error occured');
            console.log(error);
        }
    });

});
