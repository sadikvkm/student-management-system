(function() {
    var oTable = $('#students-datatable').DataTable({
        iDisplayLength: 25,
        lengthMenu: [10, 25, 50, 100, 150],
        serverSide: true,
        processing: true,
        language: {
            processing: "Please wait...",
            infoFiltered: ""
        },
        "order": [[6, "DESC" ]],
        ajax: {
            url: url('/students/datatable'),
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
            {data: 'email', name: 'email'},
            {data: 'age', name: 'age'},
            {data: 'gender', name: 'gender'},
            {data: 'assigned_teacher', name: 'assigned_teacher'},
            {data: 'created_by', name: 'created_by', width: 100},
            {data: 'created_at', name: 'created_at', width: 100},
            {data: 'status', name: 'status', width: 50},
            {data: 'actions', width: 100, name: 'actions', orderable: false, searchable: false},

        ]
    });

})()