

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

    $('.hapus').click(function(){
        let id = $(this).data('id');
        console.log(id);
        if(confirm('Yakin ingin menghapus data ?')) {
            $('#form-hapus-hero').attr('action', './skills/'+id );    
            $('#form-hapus-hero').submit();
        }
    })


});