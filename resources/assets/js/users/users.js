'use strict';

let tableName = '#usersTable';

$(document).ready(function () {

    let tbl = $(tableName).DataTable({
        processing: true,
        serverSide: true,
        'info': false,
        'pageLength': 10,
        'lengthChange': false,
        'language': {
            'lengthMenu': 'Show _MENU_',
        },
        'order': [[1, 'desc']],
        ajax: {
            url: route('users.index'),
        },
        columnDefs: [
            {
                'targets': [0],
                'width': '50%',
            },
            {
                'targets': [2],
                'orderable': false,
                'className': 'text-center',
                'width': '8%',
            },
        ],
        columns: [
            {
                data: function (row) {
                    return `<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                        <a href="#">
                            <div class="symbol-label">
                                <img src="${row.profile_image}" alt=""
                                     class="w-100">
                            </div>
                        </a>
                    </div>
                    <div class="d-inline-block align-top">
                        <a href="${route('users.show', row.id)}"
                           class="text-primary-800 mb-1 d-block">${row.full_name}</a>
                           <span class="d-block">${row.email}</span>
                    </div>`;
                },
                name: 'first_name',
            },
            {
                data: function (row) {
                    if (row.role_name === 'Admin')
                        return '<span class="badge badge-light-success fs-7">' +
                            row.role_name + '</span>';
                    else if (row.role_name === 'Client')
                        return '<span class="badge badge-light-primary fs-7">' +
                            row.role_name + '</span>';
                },
                // data: 'role_name',
                name: 'roles.name',
            },
            {
                data: function (row) {
                    let data = [
                        {
                            'id': row.id,
                            'editUrl': route('users.edit', row.id),
                        },
                    ];

                    return prepareTemplateRender('#actionsTemplates',
                        data);
                },
                name: 'id',
            },
        ],
    });
    handleSearchDatatable(tbl);
});

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(route('users.destroy', recordId), tableName, 'User');
});
