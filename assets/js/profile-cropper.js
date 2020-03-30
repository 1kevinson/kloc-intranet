import Croppie from 'croppie';
var $ = require('jquery');



/*  ---- CROPPING SECTION -----  */
if(document.getElementById('image-crop-owner') != null){
   ownerCropping()
} else if(document.getElementById('image-crop-tenant') != null) {
   tenantCropping();
}

function tenantCropping() {
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

    console.log('test_tenant');

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
}

function ownerCropping() {
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

console.log('own');

document.getElementById("owner_profile_picture").onchange = function () {
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


}
/*  ---- END CROPPING SECTION -----  */