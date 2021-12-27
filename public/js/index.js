var count = 999;
var clicked = false;
document.getElementById("upvote-count").innerHTML = count;




function upvoteHandler() {
    
    var count = document.getElementById("upvote-count").innerHTML;

    console.log(count)

    count = Number(count);

    console.log(count)
    if (!clicked) {
        count = count + 1;
        document.getElementById("upvote-icon").className += " upvoted";
        document.getElementById("upvote-icon").style.color = "red";
        clicked = true;
    } else {
        count = count - 1;
        document.getElementById("upvote-icon").className += " upvoted";
        document.getElementById("upvote-icon").style.color = "white";

        clicked = false;
    }
    document.getElementById("upvote-count").innerHTML = count;
}



// addpost js
document.getElementById('addPost').onclick = function () {
    location.href = "/user/form";
}
