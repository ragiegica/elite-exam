'use strict';

/* Preloading the table */
function index() {
    var searches = $(document).find('#search-albums').val();
    $.ajax({
        url: albumListURL,
        type: "GET",
        dataType: "json",
        data: {
            search: searches !== null ? searches : '',
        },
        success: function (response) {
            appendTableCells(response);
        },
        error: function (error) {
            console.log(error);
        }
    })
}

index();

/* appending the table cells */
function appendTableCells(response) {

    if (response.length > 0) {

        $(document).find('#tbody').empty();

        $.each(response, function (i, v) {

            $(document).find('#tbody').append(`
            <tr>
                <td>${v.id}</td>
                <td>${v.artist.name}</td>
                <td>${v.name}</td>
                <td>${v.date_release}</td>
                <td>
                    <div class="btn-group">
                        <button data-id="${v.id}" class="btn btn-sm btn-info text-white view-album">View</button>
                        <button data-id="${v.id}" class="btn btn-sm btn-primary edit-album">Edit</button>
                        <button data-id="${v.id}" class="btn btn-sm btn-danger delete-album">Delete</button>
                    </div>
                </td>
            </tr>`);
        });

    } else {
        $(document).find('#tbody').empty().append(`
            <tr class="text-center fw-bold">
                <td colspan="5">
                    --- No data found ---
                </td>
            </tr>
        `);
    }

}

/* Search Function */
$('#search-albums').on('input', function () {
    index();
});

/* preloading dropdown */
function preloadArtistSelector(id = null) {
    $.ajax({
        url: artistListURL,
        type: "GET",
        dataType: "json",
        success: function (data) {

            let elementName = id !== null ? '#edit-artist-selector' : '#artist-selector';
            if (data.length > 0) {
                $(document).find(elementName).empty().append('<option value="" disabled selected>--- Select Artist ---</option>');
                $.each(data, function (i, v) {
                    $(document).find(elementName).append(`
                        <option class="${id !== null && id === v.id ? 'bg-primary text-white' : ''}" value="${v.id}" ${id !== null && id === v.id ? 'selected' : ''}>${v.name}</option>
                    `)
                });
            } else {
                $(document).find(elementName).empty().append('<option value="" disabled selected>--- No Data ---</option>');
            }

        },
        error: function (error) {
            alert('fetching all artist list error occured');
            console.log(error);
        }
    });
}
