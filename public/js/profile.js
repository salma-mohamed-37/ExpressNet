function viewCommentBox(id)
{
    var commentContainer = document.getElementById("comment-container-"+id);
    var computedStyle = window.getComputedStyle(commentContainer);

    if (computedStyle.display === 'block')
    {
      commentContainer.style.display = 'none';
      console.log("none");
    }
    else
    {
      commentContainer.style.display = 'block';
      console.log("block");
    }
}
