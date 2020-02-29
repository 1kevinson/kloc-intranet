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

    /* Add file name in registers view */
/*    $('.custom-file-input').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        var cleanFileName = fileName.replace('C:\\fakepath\\', "..\\");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(cleanFileName);
    })*/

});

$(document).on('change', '.custom-file-input', function (event) {
    $(this).next('.custom-file-label').html(event.target.files[0].name);
});


