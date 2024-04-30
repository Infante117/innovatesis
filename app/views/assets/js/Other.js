    $(document).ready(function() {
        function initializeExampleDataTable() {
            new DataTable('#example', {
                responsive: {
                    details: {
                    display: DataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Detalle de: ' + data[2];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            lengthChange: false,
            language: {
                search: 'Buscar:',
                zeroRecords: "No se encontró nada - lo siento",
                info: "Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros disponibles",
                infoFiltered: "(filtrado de _MAX_ registros totales)"
            }
        });
        new DataTable('#tableuser', {
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Detalle de: ' + data[3];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            lengthChange: false,
            language: {
                search: 'Buscar:',
                zeroRecords: "No se encontró nada - lo siento",
                info: "Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros disponibles",
                infoFiltered: "(filtrado de _MAX_ registros totales)"
            }
        });
    }


    initializeExampleDataTable();
    });

    new DataTable('#example2', {
    fixedColumns: {leftColumns: 3},
    paging: false,
    scrollCollapse: true,
    scrollX: true,
    scrollY: 300,
            language: {
                search: 'Buscar:',
                zeroRecords: "No se encontró nada - lo siento",
                info: "Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros disponibles",
                infoFiltered: "(filtrado de _MAX_ registros totales)"
            }});
