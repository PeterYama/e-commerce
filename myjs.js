
$(document).ready(function(){
    $(".productCard").click(function(){
        console.log($(this).attr('id'))
        var data = $(this).attr('id');
        sessionStorage.setItem("Product_ID", data);
        $path = "/e-commerce/sections/product-details.php";
        console.log($path);
        window.location.replace("/e-commerce/sections/product-details.php");
        // var post = $.post("/e-commerce/sections/product-details.php", { product_ID : data, time: "2pm" } );
        // post.done(function( data ) {
        //     alert("data inside $.post" + data);
        //   });
    })
})

// send the data to product detail .php
