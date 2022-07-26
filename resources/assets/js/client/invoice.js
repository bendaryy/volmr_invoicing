'use strict';

$(document).ready(function () {
    // // on click client Invoices view invoice tab
     let activeTab = location.href;
     let tabParameter = activeTab.substring(activeTab.indexOf("?Active")+8);
     $('.nav-item button[data-bs-target="#' + tabParameter + '"]').click();
});
