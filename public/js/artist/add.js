'use strict';

$(document).on('click', '.add-artist', function(){

    $('#add-artist-form')[0].reset();
    $(document).find('#add-artist-modal').modal('show');

})

$('#add-artist-form').submit(function(e){
    e.preventDefault();

    $.ajax({
        url: addArtistURL,
        type: "POST",
        headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content') },
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
            $(document).find('#add-artist-modal').modal('hide');
            alert('Saved Successfully');
            index();
        },
        error: function(error) {
            alert('add error occured');
            console.log(error);
        }
    });

});
