// tells the browser to run the code after you load the document
// selector when document is ready -> action
console.log('Form submitted');
$(document).ready(function () {
    var commentCount = 2;
    //when click 
    $("btn-primary").click(function () {
        commentCount = commentCount + 2;
        $("#comments").load("load-comments.php", {
            commentNewCount: commentCount,
        });
    })
    $('.carousel').carousel({
        interval: 1000
      })

});
// user login 
$(document).ready(function (){
})



