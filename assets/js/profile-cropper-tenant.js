import Croppie from 'croppie';
var $ = require('jquery');




    var image_demo = document.getElementById('image-crop-tenant');
    var c = new Croppie( image_demo ,{
        enableExif: true,
        enableOrientation: true,
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

console.log('test_owner');

    document.getElementById("tenant_profile_picture").onchange = function() {
        var reader = new FileReader();
        reader.onload = function(event) {
            c.bind({
                url: event.target.result
            }).then(function() {
                console.log('Tenant bind complete');
            });
        };
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal-tenant').modal('show');
    };


    /* Save picture to BASE64 string*/
    document.getElementById("validate-crop-tenant").onclick = function () {
        c.result({
            type : 'canvas',
            format : 'png',
            quality: '1',
            size: {
                width: 201,
                height: 201
            }
        }).then(function (canvas) {

            $('#uploaded-img-tenant').attr('src',canvas);
            $('#uploadimageModal-tenant').modal('hide');

            /* Set Value here to save in Symfony */
            if($('#tenant_image').length){
                $("#tenant_image").attr("value", canvas);
            }else{
                console.log("No tenant attribute on this page");
            }

        })
    };

    /* Rotate selected picture to 90° */
    document.getElementById("img-rotate-tenant").onclick = function () {
        c.rotate(90)
    };


