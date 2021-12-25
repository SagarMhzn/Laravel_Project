var count=999;
var clicked=false;
document.getElementById("upvote-count").innerHTML=count;




function upvoteHandler(){
    console.log("ahaaba")
    
    var count=document.getElementById("upvote-count").innerHTML;

    console.log(count)

    count=Number(count);

    console.log(count)
    if(!clicked){
        count=count+1;
        document.getElementById("upvote-icon").className += "upvoted"

        clicked=true;
    }
    else{
        count=count-1;
        document.getElementById("upvote-icon").className += "upvoted"
        clicked=false;
    }
    document.getElementById("upvote-count").innerHTML=count;
}
