jQuery(document).ready(function() {
    jQuery('.dt-custom').DataTable({
        dom: 'Bfrtip',
        buttons: [
            '', // excel
        ],
        className: 'btn btn-primary'
    });
});