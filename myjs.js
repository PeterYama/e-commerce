var id;
var path;
var session;
var cartArray=[];
// when a product is clicked save the product ID to a session;
// pass it to product details and display more details about a product
$(document).ready(function(){
        $(".productCard").click(function(){
        id = $(this).attr('id');
        sessionStorage.setItem("product_id", id);
        $.post('/e-commerce/sections/product-details.php', {
            'product_id': id,
        }, function( data ) {
            $( "#result" ).html( data );
            $('#pid').remove();
          });

        // window.location.replace("/e-commerce/sections/product-details.php");
    })

    //user should add the product to cart on every product click
    //cart page should render all the prodcuts that the user have selected
    //user can delete and add new items to the cart
    $('#cart-btn').click(function(){

        if(sessionStorage.getItem("cart") == null){
            cartArray.push(sessionStorage.getItem("product_id"));
            window.sessionStorage.setItem("cart", JSON.stringify(cartArray))
        }else{
            cartArray=(JSON.parse(window.sessionStorage.getItem('cart')));
            cartArray.push(sessionStorage.getItem("product_id"));
            window.sessionStorage.setItem("cart", JSON.stringify(cartArray))
        }
        $.post('/e-commerce/sections/cart.php', {
            'cart': cartArray,
        }, function( data ) {
            $( "#result" ).html( data );
            $('footer').remove();
            $('footer').css("position"," fixed");
            $('footer').css("bottom","0");
          });
    });
})
// send the data to product detail .php
