

$(document).ready(function () {
    console.log('hello')
    $('#hero_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            "copy",
            "csv",
            "excel",
            "pdf",
        ],
    });
});