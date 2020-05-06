var id;
var path;
var session;

// when a product is clicked save the product ID to a session;
// pass it to product details and display more details about a product
$(document).ready(function(){
    $(".productCard").click(function(){
        id = $(this).attr('id');
        sessionStorage.setItem("product_id", id);
        session = sessionStorage.getItem("product_id");
        
        console.log("session is: "+ session)
        
        $.post('/e-commerce/sections/product-details.php', {
            'product_id': id,
        }, function( data ) {
            $( "#result" ).html( data );
            $('#pid').remove();
          });
        // window.location.replace("/e-commerce/sections/product-details.php");
    })
})

// send the data to product detail .php
