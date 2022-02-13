(function() {
    var oTable = $('#student-datatable').DataTable({
        iDisplayLength: 25,
        lengthMenu: [10, 25, 50, 100, 150],
        serverSide: true,
        processing: true,
        language: {
            processing: "Please wait...",
            infoFiltered: ""
        },
        "order": [[4, "DESC" ]],
        ajax: {
            url: url('/subjects/datatable'),
            dataType: "json",
            type: "POST",
            data:  function (d){}
        },
        createdRow: function ( row, data, index ) {},
        initComplete: function(settings, json) {},
        drawCallback: function() {},
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: 50, orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'created_by', name: 'created_by', width: 100},
            {data: 'created_at', name: 'created_at', width: 100},
            {data: 'status', name: 'status', width: 50},
            {data: 'actions', width: 100, name: 'actions', orderable: false, searchable: false},

        ]
    });

})()