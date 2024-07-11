'use strict';

/* Preloading the table */
function index() {
    var searches = $(document).find('#search-artists').val();
    $.ajax({
        url: artistListURL,
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
                <td>${v.code}</td>
                <td>${v.name}</td>
                <td>
                    <div class="btn-group">
                        <button data-id="${v.id}" class="btn btn-sm btn-info text-white view-artist">View</button>
                        <button data-id="${v.id}" class="btn btn-sm btn-primary edit-artist">Edit</button>
                        <button data-id="${v.id}" class="btn btn-sm btn-danger delete-artist">Delete</button>
                    </div>
                </td>
            </tr>`);
        });

    } else {
        $(document).find('#tbody').empty().append(`
            <tr class="text-center fw-bold">
                <td colspan="4">
                    --- No data found ---
                </td>
            </tr>
        `);
    }

}

/* Search Function */
$('#search-artists').on('input', function () {
    index();
});
