// tells the browser to run the code after you load the document
// selector when document is ready -> action
$(document).ready(function () {
    var commentCount = 2;
    //when click 
    $("btn-primary").click(function () {
        // auto increment the number of comments
        commentCount = commentCount + 2;
        // load new comments ( select the div to load new comments )
        // inside load, pass the data
        $("#comments").load("load-comments.php", {
            commentNewCount: commentCount,
        });
    })

    $('.carousel').carousel({
        interval: 1000
      })
    // $('#target').ajaxSubmit(function () {
    //     alert("Thank you for your comment!");
    // });

});



// $("#target").submit(function (event) {
//     var user = {
//         email: $("#inputEmail").val(),
//         password: $("#inputPassword").val(),
//         savePassowrd: $("#customCheck1").prop('checked')
//     }
//     // Compare the user input to existing users in the database
//     console.log(user)
//     $("#userLoginConfirmation").load("userLogin.php", user);
//     // if user don't exsist, create a new user
//     // if user exist and credentials are ok, login
//     // if user exist and credentials are not ok, redirect to login page

//     event.preventDefault();
// });



