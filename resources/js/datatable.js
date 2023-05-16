import DataTable from 'datatables.net-dt';
import 'jquery'
import 'datatables.net/js/jquery.dataTables.min.js';
import 'datatables.net-bs5/js/dataTables.bootstrap5.min.js';
import 'datatables.net-buttons/js/dataTables.buttons.min.js';
import 'datatables.net-buttons/js/buttons.colVis.min.js';
import 'datatables.net-buttons/js/buttons.flash.min.js';
import 'datatables.net-buttons/js/buttons.html5.min.js';
import 'datatables.net-buttons/js/buttons.print.min.js';
import 'datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js';
import 'datatables.net-responsive/js/dataTables.responsive.min.js';
import 'datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js';

window.$ = window.jQuery = require('jquery')
/* Controller
------------------------------------------------ */
    var handleRenderTableData = function() {
        var table = $('#datatableDefault').DataTable({
            dom: "<'row mb-3'<'col-md-4 mb-3 mb-md-0'l><'col-md-8 text-right'<'d-flex justify-content-end'fB>>>t<'row align-items-center'<'mr-auto col-md-6 mb-3 mb-md-0 mt-n2 'i><'mb-0 col-md-6'p>>",
            lengthMenu: [ 10, 20, 30, 40, 50 ],
            responsive: true,
            buttons: [
                { extend: 'print', className: 'btn btn-outline-default btn-sm ms-2' },
                { extend: 'csv', className: 'btn btn-outline-default btn-sm' }
            ]
        });

    };

    $(document).ready(function () {
        handleRenderTableData();
    });
