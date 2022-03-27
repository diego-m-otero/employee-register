var table_employees

$(function(){
    table_employees = $('#table_employees').DataTable({
        fixedHeader: true,
        destroy: true,
        searching: true,
        processing: true,
        deferRender: false,
        scroller: true,
        ajax: {
            url: "/admin/employees/datatable",
            type: 'GET',
            async: true,
            dataSrc: function (response) {
                return response.data
            }
        },
        columnDefs: [
            { 'title': 'Nombre', 'targets': [0], 'className': 'text-center', 'width': '20%' },
            { 'title': 'Email', 'targets': [1], 'className': 'text-center', 'width': '15%' },
            { 'title': 'Sexo', 'targets': [2], 'className': 'text-center', 'width': '10%' },
            { 'title': 'Área', 'targets': [3], 'className': 'text-center', 'width': '20%' },
            { 'title': 'Boletín', 'targets': [4], 'className': 'text-center', 'width': '10%' },
            { 'title': 'Rol', 'targets': [5], 'className': 'text-center', 'width': '15%' },
            { 'title': 'Acciones', 'targets': [6], 'orderable': false, 'className': 'text-center', 'width': '10%' },
        ],
        columns: [
            { 'data': 'name', 'className': 'text-left' },
            { 'data': 'email', 'className': 'text-left' },
            { 'data': null, 'className': 'text-left',
                render: function(data){
                    return data.gender === 'F' ? 'Femenino' : 'Masculino'
                }
            },
            { 'data': 'area', 'className': 'text-left' },
            { 'data': null, 'className': 'text-left',
                render: function(data){
                    return data.notification === 0 || data.notification === null ? 'No' : 'Sí'
                }
            },
            { 'data': 'roles', 'className': 'text-left' },
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