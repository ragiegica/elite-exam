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
                <td>${v.artist.name}</td>
                <td>${v.name}</td>
                <td>${v.date_release}</td>
            </tr>`);
        });

    } else {
        $(document).find('#tbody').empty().append(`
            <tr class="text-center fw-bold">
                <td colspan="3">
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
