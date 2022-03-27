var table_areas

$(function(){
    table_areas = $('#table_areas').DataTable({
        fixedHeader: true,
        destroy: true,
        searching: true,
        processing: true,
        deferRender: false,
        scroller: true,
        ajax: {
            url: "/admin/areas/datatable",
            type: 'GET',
            async: true,
            dataSrc: function (response) {
                return response.data
            }
        },
        columnDefs: [
            { 'title': 'ID', 'targets': [0], 'className': 'text-center', 'width': '10%' },
            { 'title': 'Nombre', 'targets': [1], 'className': 'text-center', 'width': '70%' },
            { 'title': 'Acciones', 'targets': [2], 'orderable': false, 'className': 'text-center', 'width': '20%' },
        ],
        columns: [
            { 'data': 'id', 'className': 'text-center' },
            { 'data': 'name', 'className': 'text-left' },
            { 'data': 'actions', 'className': 'text-center' }
        ],
        select: 'multi',
        order: [[0,'asc'],[1,'asc']],
        language: {
            url: "/js/libs/datatable/i18n/es_es.json",
        },
        lengthMenu: [[10, 20, 50, 100, -1], [10, 20, 50, 100, "TODOS"]],
        scrollY: '',
        initComplete: function(){}
    })
})