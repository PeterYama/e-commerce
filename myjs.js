var id;
var path;
var session;
var cartArray = [];
// when a product is clicked save the product ID to a session;
// pass it to product details and display more details about a product
$(document).ready(function () {

    $(document).on('click', '#cart-btn', function () {
        if (sessionStorage.getItem("cart") == null) {
            cartArray.push(sessionStorage.getItem("product_id"));
            window.sessionStorage.setItem("cart", JSON.stringify(cartArray))
        } else {
            cartArray = (JSON.parse(window.sessionStorage.getItem('cart')));
            cartArray.push(sessionStorage.getItem("product_id"));
            window.sessionStorage.setItem("cart", JSON.stringify(cartArray))
        }
        $.post('/e-commerce/sections/cart.php', {
            'cart': cartArray,
        }, function (result) {
            $("#result").replaceWith(result);
            $('footer').remove();
            $('footer').css("position", " fixed");
            $('footer').css("bottom", "0");
        });
    });

    $(".productCard").click(function () {
        id = $(this).attr('id');
        sessionStorage.setItem("product_id", id);
        $.post('/e-commerce/sections/test.php', {
            'product_id': id,
        }, function (result) {
            $("#result").replaceWith(result);;
        });
    });

    //user should add the product to cart on every product click
    //cart page should render all the prodcuts that the user have selected
    //user can delete and add new items to the cart


    $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $(".dropdown-menu li").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });


    $(document).on('click', "#Adventure", function () {
        id = $(this).attr('id');
        sessionStorage.setItem("category", id);
        var sql = "SELECT * FROM `tabproduct` where `P_Category` = " + "'" + id + "'";
        $.post('/e-commerce/sections/products.php', {
            'category': id,
            'sql': sql,
        }, function (result) {
            $(".navbar").remove();
            $('footer').remove();
            $("#result").replaceWith(result);
            // $('#pid').remove();
        });
    });

    
})
// send the data to product detail .php
