function like (id)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if(this.status == 200 && this.readyState == 4)
        {
            console.log('receieved');
            document.getElementById("like-"+id).innerHTML = 'liked'
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

