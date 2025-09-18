import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

let table = new DataTable("#myTable", {
    layout: {
        topStart: {
            buttons: [
                {
                    extend: "excelHtml5",
                    text: '<span class="material-symbols-outlined">grid_on</span><span>Excel</span>',
                    className: "btn-excel",
                },
                {
                    extend: "pdfHtml5",
                    text: '<span class="material-symbols-outlined">picture_as_pdf</span><span>PDF</span>',
                    className: "btn-pdf",
                },
                {
                    extend: "print",
                    text: '<span class="material-symbols-outlined">print</span><span>Imprimir</span>',
                    className: "btn-print",
                },
            ],
        },
        topEnd: {
            search: { placeholder: "Buscar…" },
        },
    },
    language: {
        decimal: ",",
        thousands: ".",
        processing: "Procesando...",
        lengthMenu: "Mostrar _MENU_ registros",
        zeroRecords: "No se encontraron resultados",
        emptyTable: "No hay datos disponibles en la tabla",
        info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
        infoEmpty: "Mostrando 0 a 0 de 0 registros",
        infoFiltered: "(filtrado de _MAX_ registros totales)",
        search: "Buscar:",
        loadingRecords: "Cargando...",
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior",
        },
        aria: {
            sortAscending: ": activar para ordenar la columna ascendente",
            sortDescending: ": activar para ordenar la columna descendente",
        },
    },
});
