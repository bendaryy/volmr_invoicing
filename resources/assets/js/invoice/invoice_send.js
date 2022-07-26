'use strict';

$(document).ready(function () {
    $(document).on('click', '.send-btn', function (event) {
        event.preventDefault();
        let invoiceId = $(event.currentTarget).data('id');
        let status = 1;

        // const swalWithBootstrapButtons = Swal.mixin({
        //     customClass: {
        //         confirmButton: 'swal2-confirm btn fw-bold btn-danger mt-0',
        //         cancelButton: 'swal2-cancel btn fw-bold btn-bg-light btn-color-primary mt-0',
        //     },
        //     buttonsStyling: false,
        // });

        swal({
            title: 'Send Invoice !',
            text: 'Are you sure want to send this invoice to client ?',
            icon: 'warning',
            buttons: ["No, Cancel","Yes, Send"],
        }).then(function (willSend) {
            if (willSend) {
                changeInvoiceStatus(invoiceId, status);
            }
        });
    });

    function changeInvoiceStatus (invoiceId, status) {
        $.ajax({
            url: route('send-invoice', { invoice: invoiceId, status: status }),
            type: 'post',
            dataType: 'json',
            success: function (obj) {
                if (obj.success) {
                    swal({
                        icon: 'success',
                        title: 'Send!',
                        confirmButtonColor: '#009ef7',
                        text: obj.message,
                        timer: 2000,
                    });
                    window.location.reload();
                }
            },
            error: function (data) {
                swal({
                    title: '',
                    text: data.responseJSON.message,
                    confirmButtonColor: '#009ef7',
                    icon: 'error',
                    timer: 5000,
                });
            },
        });
    }
});

