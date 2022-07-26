'use strict';

$(document).ready(function () {
    'use strict';
    // payment mail in click after view payment transitions
    let activeTab = location.href;
    let tabParameter = activeTab.substring(activeTab.indexOf("?active") + 8);
    $('.nav-item button[data-bs-target="#' + tabParameter + '"]').click();
});
