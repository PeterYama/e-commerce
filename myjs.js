var id;
var path;
var session;
var cartArray = [];
var favArray = [];
// when a product is clicked save the product ID to a session;
// pass it to product details and display more details about a product
$(document).ready(function () {

    var path = window.location.href;
    if (path.includes('products')){
        $('#search-bar').show();
        $('#cart-icon').show();
    }

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }

    $(document).on('click','#continue-shopping-btn',function(event){
        event.preventDefault();
        location.reload();
    })


    $(document).on('click','#check-out-btn',function(event){
        event.preventDefault();
        $('.panel-info').replaceWith(
        '<strong>Processing your order. Thank you =)<strong><br>' 
        );
    })

    $(document).on('click', "#fav-delete-btn", function (event) {
        event.preventDefault();
        var ProductID = $(this).attr('value');
        cartArray = (JSON.parse(window.sessionStorage.getItem('favSession')));
        cartArray.splice($.inArray(ProductID,cartArray),1);
        window.sessionStorage.setItem("favSession", JSON.stringify(cartArray))
        console.log(cartArray);
        $.post('/e-commerce/sections/cart.php', {
            'favSession': cartArray,
        }, function (result) {
            $("#Product_"+ ProductID).remove();
            if(cartArray.length === 0){
                $('#cart-footer').hide();
                $('#fav-empty-message').show();
            }
        });
    });
    
    $(document).on('keypress','#search-bar', function (e) {         
        if (e.keyCode == 13) {
            var userSelection = $("#search-bar ").val();
            e.preventDefault(); 
            $.post('/e-commerce/searchLogic.php', {
                'sql': "select * from tabproduct WHERE P_Name LIKE '%" +userSelection+"%'",
            }, function (result) {
                $("#products-row").replaceWith(result);
            });
        }
    });
        
    $(document).on('click','#fav-btn',function(e){
        if (sessionStorage.getItem("favSession") == null) {
            favArray.push(sessionStorage.getItem("product_id"));
            window.sessionStorage.setItem("favSession", JSON.stringify(favArray))
        } else {
            favArray = (JSON.parse(window.sessionStorage.getItem('favSession')));
            favArray.push(sessionStorage.getItem("product_id"));
            window.sessionStorage.setItem("favSession", JSON.stringify(favArray))
        }
        $.post('/e-commerce/sections/fav.php', {
            'favSession': favArray,
        }, function (result) {
            $("#result").replaceWith(result);
            if(favArray.length === 0){
                $('#cart-footer').hide();
                $('#friendly-message').show();
                $('footer').css("bottom", "0");
            }
        });
    });

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
            $('footer').css("bottom", "0");
        });
    });

    $(document).on('click','#profile-icon',function(e){
        $.get('/e-commerce/sections/loginPage.php', function (result) {
            $("#result").replaceWith(result);
            $('#search-bar').hide();
            $('#cart-icon').hide();
        });
    });
    
    $(document).on('click','#leave-review-btn',function(e){
        e.preventDefault();
        $.get('/e-commerce/sections/productsReview.php', function (result) {
            $("#product-review-tag").replaceWith(result);
        });
    });


    $(document).on('click','#cart-icon',function(e){
        if (sessionStorage.getItem("cart") == null) {
            window.sessionStorage.setItem("cart", JSON.stringify(cartArray))
        } else {
            cartArray = (JSON.parse(window.sessionStorage.getItem('cart')));
            window.sessionStorage.setItem("cart", JSON.stringify(cartArray))
        }
        $.post('/e-commerce/sections/cart.php', {
            'cart': cartArray,
        }, function (result) {
            $("#result").replaceWith(result);
            if(cartArray.length === 0){
                $('#cart-footer').hide();
                $('#friendly-message').show();
                $('footer').css("bottom", "0");
            }
        });
    });

    $(document).on('click', "#cart-delete-btn", function (event) {
        event.preventDefault();
        var ProductID = $(this).attr('value');
        cartArray = (JSON.parse(window.sessionStorage.getItem('cart')));
        cartArray.splice($.inArray(ProductID,cartArray),1);
        window.sessionStorage.setItem("cart", JSON.stringify(cartArray))
        console.log(cartArray);
        $.post('/e-commerce/sections/cart.php', {
            'cart': cartArray,
        }, function (result) {
            $("#Product_"+ ProductID).remove();
            $("#total").text('Refresh to update');
            if(cartArray.length === 0){
                $('#cart-footer').hide();
                $('#friendly-message').show();
            }
        });
    });

    $(document).on('click', ".productCard", function (event) {
        id = $(this).attr('id');
        sessionStorage.setItem("product_id", id);
        $.post('/e-commerce/sections/product-details.php', {
            'product_id': id,
        }, function (result) {
            $("#result").replaceWith(result);
        });
    });

    $(document).on('click', "#Adventure", function (event) {
        event.preventDefault();
        var sql = "SELECT * FROM `tabproduct` where `P_Category` = 'Adventure'";
        $.post('/e-commerce/sections/requestProducts.php', {
            'sql': sql,
        }, function (result) {
            $("#products-row").replaceWith(result);
        });
    });

    $(document).on('click', "#FPS", function (event) {
        event.preventDefault();
        var sql = "SELECT * FROM `tabproduct` where `P_Category` = 'FPS'";
        $.post('/e-commerce/sections/requestProducts.php', {
            'sql': sql,
        }, function (result) {
            $("#products-row").replaceWith(result);
        });
    });

    $(document).on('click', "#Horror", function (event) {
        event.preventDefault();
        var sql = "SELECT * FROM `tabproduct` where `P_Category` = 'Horror'";
        $.post('/e-commerce/sections/requestProducts.php', {
            'sql': sql,
        }, function (result) {
            $("#products-row").replaceWith(result);
        });
    });

    $(document).on('click', "#RPG", function (event) {
        event.preventDefault();
        var sql = "SELECT * FROM `tabproduct` where `P_Category` = 'RPG'";
        $.post('/e-commerce/sections/requestProducts.php', {
            'sql': sql,
        }, function (result) {
            $("#products-row").replaceWith(result);
        });
    });

    $(document).on('click', "#Sport", function (event) {
        event.preventDefault();
        var sql = "SELECT * FROM `tabproduct` where `P_Category` = 'Sport'";
        $.post('/e-commerce/sections/requestProducts.php', {
            'sql': sql,
        }, function (result) {
            $("#products-row").replaceWith(result);
        });
    });

    $(document).on('click', "#Strategy", function () {
        event.preventDefault();
        var sql = "SELECT * FROM `tabproduct` where `P_Category` = 'Strategy'";
        $.post('/e-commerce/sections/requestProducts.php', {
            'sql': sql,
        }, function (result) {
            $("#products-row").replaceWith(result);
        });
    });

    $(document).on('click', "#Cheaper", function () {
        event.preventDefault();
        var sql = "SELECT * FROM `tabproduct` WHERE `P_DiscPrice` = 0 ORDER BY `P_DiscPrice` ASC, `P_Price` ASC";
        $.post('/e-commerce/sections/requestProducts.php', {
            'sql': sql,
        }, function (result) {
            $("#products-row").replaceWith(result);
        });
    });

    $(document).on('click', "#Expensive", function () {
        event.preventDefault();
        var sql = "SELECT * FROM `tabproduct` WHERE `P_DiscPrice` = 0 ORDER BY `P_Price` DESC";
        $.post('/e-commerce/sections/requestProducts.php', {
            'sql': sql,
        }, function (result) {
            $("#products-row").replaceWith(result);
        });
    });
    
    $(document).on('click', "#Newer", function () {
        event.preventDefault();
        var sql = "SELECT * FROM `tabproduct` ORDER BY `tabproduct`.`P_ReleaseDate` DESC";
        $.post('/e-commerce/sections/requestProducts.php', {
            'sql': sql,
        }, function (result) {
            $("#products-row").replaceWith(result);
        });
    });

    $(document).on('click', "#Clasics", function () {
        event.preventDefault();
        var sql = "SELECT * FROM `tabproduct` ORDER BY `tabproduct`.`P_ReleaseDate` ASC";
        $.post('/e-commerce/sections/requestProducts.php', {
            'sql': sql,
        }, function (result) {
            $("#products-row").replaceWith(result);
        });
    });

    $(document).on('click', "#Name", function () {
        event.preventDefault();
        var sql = "SELECT * FROM `tabproduct` ORDER BY `tabproduct`.`P_Name` ASC";
        $.post('/e-commerce/sections/requestProducts.php', {
            'sql': sql,
        }, function (result) {
            $("#products-row").replaceWith(result);
        });
    });

    $(document).on('click', "#Promotion", function () {
        event.preventDefault();
        var sql = "SELECT * FROM `tabproduct` Where `P_DiscPrice` > 0 ORDER BY `tabproduct`.`P_Price` ASC, `tabproduct`.`P_DiscPrice` ASC";
        $.post('/e-commerce/sections/requestProducts.php', {
            'sql': sql,
        }, function (result) {
            $("#products-row").replaceWith(result);
        });
    });
})
