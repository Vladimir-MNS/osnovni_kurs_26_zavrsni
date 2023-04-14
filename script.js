
const comments = document.getElementById("comments")
const commentButton = document.getElementById("comment-button")


commentButton.addEventListener("click", () => {
    comments.classList.toggle('hide-comments')
    commentButton.textContent == 'Show Comments' ? commentButton.textContent = 'Hide Comments' : commentButton.textContent = 'Show Comments'; 
})


function delcomment(commentId, postId){
    var msg = confirm("Are you sure you want to delete this comment?");

if (msg) {
    window.location = `singlepost.php?id=${postId}&did=${commentId}`
}
}


function delpost(postId){
    var msg = confirm("Are you sure you want to delete this post?");

if (msg) {
    window.location = `posts.php?did=${postId}`
}
}