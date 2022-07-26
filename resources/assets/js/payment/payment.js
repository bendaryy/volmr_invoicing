'use strict';

$(document).ready(function () {
    $('#invoice_id').select2({
        dropdownParent: $('#paymentModal')
    });
    let tableName = '#tblPayments';
    // let tbl = $(tableName).DataTable({
    //     processing: true,
    //     serverSide: true,
    //     searchDelay: 500,
    //     'language': {
    //         'lengthMenu': 'Show _MENU_',
    //     },
    //     'order': [[3, 'desc']],
    //     ajax: {
    //         url: route('payments.index'),
    //         data: function (data) {
    //             data.payment_mode = $('#paymentModeFilter').
    //                 find('option:selected').
    //                 val();
    //         },
    //     },
    //     columnDefs: [
    //         {
    //             'targets': [6],
    //             'className': 'text-center  text-nowrap',
    //             'orderable': false,
    //         },
    //         {
    //             'targets': [7],
    //             'orderable': false,
    //         },
    //         {
    //             targets: '_all',
    //             defaultContent: 'N/A',
    //             'className': 'text-start align-middle text-nowrap',
    //         },
    //     ],
    //     columns: [
    //         {
    //             data: function (row) {
    //                 let clientShowLink = route('clients.show', row.invoice.client.id);
    //                 let invoiceShowLink = route('invoices.show', row.invoice.id);
    //                 return `<div class="d-flex align-items-center">
    //                     <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
    //                         <a href="${clientShowLink}">
    //                             <div>
    //                                 <img src="${row.invoice.client.user.profile_image}" alt=""
    //                                      class="user-img">
    //                             </div>
    //                         </a>
    //                     </div>
    //                     <div class="d-flex flex-column">
    //                     <div class="row">
    //                         <div class="col-lg-12">
    //                             <a href="${clientShowLink}" class="mb-1">${row.invoice.client.user.full_name}</a>
    //                              <a href="${invoiceShowLink}" class=" badge badge-light-info mb-1">${row.invoice.invoice_id}</a>
    //                         </div>
    //                      </div>
    //                         <span>${row.invoice.client.user.email}</span>
    //                     </div>
    //                </div>`;
    //             },
    //             name: 'invoice_id',
    //         },
    //         {
    //             data: function (row) {
    //                 return row.invoice.client.user.first_name;
    //             },
    //             name: 'invoice.client.user.first_name',
    //             searchable: true,
    //             visible: false,
    //         },
    //         {
    //             data: function (row) {
    //                 return row.invoice.client.user.last_name;
    //             },
    //             name: 'invoice.client.user.last_name',
    //             searchable: true,
    //             visible: false,
    //         },
    //         {
    //             data: function (row) {
    //                 return row.updated_at;
    //             },
    //             name: 'updated_at',
    //             searchable: false,
    //             visible: false,
    //         },
    //         {
    //             data: function (row) {
    //                 if (row.payment_date === null) {
    //                     return 'N/A';
    //                 }
    //                 return `<div class="badge badge-light">
    //                             <div>${moment(row.payment_date).
    //                     format(momentDateFormat)}</div>
    //                         </div>`;
    //             },
    //             name: 'payment_date',
    //         },
    //         {
    //             data: function (row) {
    //                 if (row.amount === null) {
    //                     return 'N/A';
    //                 }
    //                 return `<span>${currency}</span>&nbsp;${number_format(
    //                     row.amount)}`;
    //             },
    //             name: 'amount',
    //         },
    //         {
    //             data: function (row) {
    //                 if(row.payment_mode == 4){
    //                     return `<span class="badge badge-light-info fs-7">Cash</span>`;   
    //                 }
    //             },
    //             name: 'payments_mode',
    //             searchable: false,
    //         },
    //         {
    //             data: function (row) {
    //                 let data = [
    //                     {
    //                         'id': row.id,
    //                     }];
    //                 return prepareTemplateRender('#modalTemplate', data);
    //             }, name: 'id',
    //             searchable: false,  
    //         },
    //         {
    //             data: function (row) {
    //                 return row.invoice_id;
    //             }, name: 'invoice.invoice_id',
    //             searchable: true,
    //             sortable: true,
    //             visible: false,
    //         },
    //     ],
    //    
    // });
    // handleSearchDatatable(tbl);

    $(document).on('click', '.delete-btn', function (event) {
        let id = $(event.currentTarget).attr('data-id');
        deleteItem(route('payments.destroy', id), tableName, 'Payments');
    });

    $(document).on('click', '.addPayment', function () {
        $('#payment_date').flatpickr({
            defaultDate: new Date(),
            dateFormat: currentDateFormat,
            maxDate: new Date(),
        });
        $('#paymentModal').appendTo('body').modal('show');
    });

    $(document).on('shown.bs.modal', '.modal', function () {
        $('#invoice_id').select2('open');
    });

    $(document).on('hidden.bs.modal', '#paymentModal', function () {
        $('#invoice_id').val(null).trigger('change');
        resetModalForm('#paymentForm');
    });

    $(document).on('submit', '#paymentForm', function (e) {
        e.preventDefault();
        let btnSubmitEle = $(this).find('#btnPay');
        setAdminBtnLoader(btnSubmitEle);
        $.ajax({
            url: route('payments.store'),
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                if (result.success) {
                    $('#paymentModal').modal('hide');
                    displaySuccessMessage(result.message);
                    livewire.emit('refreshDatatable');
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
            complete: function () {
                setAdminBtnLoader(btnSubmitEle);
            },
        });
    });

    $(document).on('change', '.invoice', function () {
        let invoiceId = $(this).val();
        if (isEmpty(invoiceId)) {
            $('#due_amount').val(0);
            $('#paid_amount').val(0);
            return false;
        }
        $.ajax({
            url: route('payments.get-invoiceAmount', invoiceId),
            type: 'get',
            dataType: 'json',
            success: function (result) {
                if (result.success) {
                    $('#due_amount').val(number_format(result.data.totalDueAmount));
                    $('#paid_amount').val(number_format(result.data.totalPaidAmount));
                }
            }, error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
        });
    });
});

$(document).on('click', '.edit-btn', function (event) {
    let paymentId = $(event.currentTarget).attr('data-id');
        renderData(paymentId);
});

window.renderData = function (id) {
    $.ajax({
        url:route('payments.edit',id),
        type: 'GET',
        beforeSend: function () {
            startLoader();
        },
        success: function (result) {
            if (result.success) {
                $('#edit_invoice_id').val(result.data.invoice.invoice_id);
                $('#edit_amount').val(result.data.amount);
                $('#edit_payment_date').flatpickr({
                    defaultDate: result.data.payment_date,
                    dateFormat: currentDateFormat,
                    maxDate: new Date(),
                });
                $('#edit_payment_note').val(result.data.notes);
                $('#paymentId').val(result.data.id);
                $('#transactionId').val(result.data.payment_id);
                $('#invoice').val(result.data.invoice_id);
                $('#totalDue_amount').val(number_format(result.data.DueAmount.original.data.totalDueAmount));
                $('#totalPaid_amount').val(number_format(result.data.DueAmount.original.data.totalPaidAmount));
                $('#editModal').appendTo('body').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            stopLoader();
        },
    });
};

$(document).on('submit', '#editPaymentForm', function (event) {
    event.preventDefault();
    const id = $('#paymentId').val();
    $.ajax({
        url: route('payments.update', { payment: id }),
        type: 'put',
        data: $(this).serialize(),
        beforeSend: function () {
            startLoader();
        },
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                livewire.emit('refreshDatatable');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            stopLoader();
        },
    });
});
