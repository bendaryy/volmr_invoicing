'use strict';

let tableName = '#clientTable';

$(document).ready(function () {

    $(document).on('click', '.delete-btn', function (event) {
        let recordId = $(event.currentTarget).attr('data-id');
        deleteItem(route('clients.destroy', recordId), tableName, 'Client');
    });
});
