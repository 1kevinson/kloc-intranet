/* Install Jquery With Yarn */
var $ = require('jquery');

$(document).ready(function() {

    // Tooltip Header account
    $('body').tooltip({
        selector: '[data-toggle=tooltip]',
        animation: true
    });


    /* Remove transition CSS effect firing page loading */
    $('body').removeClass("preload");
});

$(document).on('change', '.custom-file-input', function (event) {
    $(this).next('.custom-file-label').html(event.target.files[0].name);
});


