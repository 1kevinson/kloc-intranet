import Croppie from 'croppie';
var $ = require('jquery');


var image_demo = document.getElementById('image-crop');
var c = new Croppie( image_demo ,{
    enableExif: true,
    viewport: {
        width: 250,
        height: 250,
        type:'square' //circle
    },
    boundary:{
        width:  300,
        height: 300
    }
});

document.getElementById("tenant_profile_picture").onchange = function() {

    var reader = new FileReader();
    reader.onload = function(event) {
        console.dir(event);
        c.bind({
            url: event.target.result
        }).then(function() {
            console.log('VanillaJS bind complete');
        });
    };
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
};


document.getElementById("validate-crop").onclick = function () {
    c.result({
        type : 'canvas',
        format : 'png',
        quality: '1',
        size: {
            width: 201,
            height: 201
        }
    }).then(function (canvas) {

        $('#uploaded-img').attr('src',canvas);
        $('#uploadimageModal').modal('hide');

        /* Set Value here to save in Symfony */
        if($('#tenant_image').length){
            $("#tenant_image").attr("value", canvas);
        }else{
            console.log("No tenant attribute on this page");
        }

    })
};