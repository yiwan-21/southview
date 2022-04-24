

$(document).ready(function () {
    $('#dataTable').on('click', '.update', function () {
        var pageParamTable = $('#dataTable').DataTable();
        var tableRow = pageParamTable.row($(this).parents('tr'));
        var rData = [
            yourdata1,
            yourdata2,
            '<a href="#" data-href="1" class="update">Update</a>',
            '<a href="#" data-href="2" class="delete">Delete</a>'
        ];
        pageParamTable
                .row( tableRow )
                .data(rData)
                .draw();
    });
});