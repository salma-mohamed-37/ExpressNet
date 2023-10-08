function like (id)
{
    var current = document.getElementById("like-"+id).innerHTML
    console.log(current)
    if(current.trim() == "like")
    {
        document.getElementById("like-"+id).innerHTML="liked"
    }
    else if(current.trim() == "liked")
    {
        document.getElementById("like-"+id).innerHTML="like"
    }

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if(this.status == 200 && this.readyState == 4)
        {
            console.log('receieved');
        }
    };
    xmlhttp.open("GET", "like/"+id,true);
    xmlhttp.send();
    console.log('sent');
}

function comment(id)
{
    var content = document.getElementById("comment-"+id).value ;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if(this.status == 200 && this.readyState == 4)
        {
            console.log('receieved');
            document.getElementById("comment-"+id).value =""

        }
    };
    xmlhttp.open("GET", "comment/"+id+"/"+encodeURIComponent(content),true);
    xmlhttp.send();
    console.log('sent');
}

