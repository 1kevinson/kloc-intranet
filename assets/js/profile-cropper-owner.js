import Croppie from 'croppie';
var $ = require('jquery');



    var image_demo_owner = document.getElementById('image-crop-owner');
    var c_o = new Croppie(image_demo_owner, {
        enableExif: true,
        enableOrientation: true,
        viewport: {
            width: 250,
            height: 250,
            type: 'square' //circle
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

console.log('test_tenant');

    console.log(document.getElementById("owner_profile_picture"));

    document.getElementById("owner_profile_picture").onchange = function () {

        console.log('own')
        var reader = new FileReader();
        reader.onload = function (event) {
            c_o.bind({
                url: event.target.result
            }).then(function () {
                console.log('Owner bind complete');
            });
        };
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal-owner').modal('show');
    };


    /* Save picture to BASE64 string*/
    document.getElementById("validate-crop-owner").onclick = function () {
        c_o.result({
            type: 'canvas',
            format: 'png',
            quality: '1',
            size: {
                width: 201,
                height: 201
            }
        }).then(function (canvas) {

            $('#uploaded-img-owner').attr('src', canvas);
            $('#uploadimageModal-owner').modal('hide');

            /* Set Value here to save in Symfony */
            if ($('#owner_image').length) {
                $("#owner_image").attr("value", canvas);
            } else {
                console.log("No owner attribute on this page");
            }

        })
    };

    /* Rotate selected picture to 90° */
    document.getElementById("img-rotate-owner").onclick = function () {
        c_o.rotate(90)
    };

