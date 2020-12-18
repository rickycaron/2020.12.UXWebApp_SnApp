let likeButton = document.getElementsByClassName("likeButton");
let likeStatus = document.getElementsByClassName("status");
let commentButton = document.getElementsByClassName("commentButton");
let commentContent = document.getElementsByClassName("commentContent");
let commentShow = document.getElementsByClassName("collapse");

for (let i = 0; i < commentButton.length; i++) {
    commentButton[i].addEventListener('click', function () {
        console.log('test comment button:');
        document.getElementById('commentForm').submit()
        sendComment(commentContent[i].commentID.value, commentButton[i].parentElement.getAttribute("value"))

        username = getUsername()

        commentShow[i].insertAdjacentHTML("afterend", "<div class=\"py-2\"> <h5 class=\"font-weight-bold d-inline\">You: </h5>\n" +
            "<h5 class=\"d-inline font-light\">" + commentContent[i].commentID.value + "</h5></div>")

        //alert("comment success!")
    }, true)
}

for (let i = 0; i < likeButton.length; i++) {
    likeButton[i].addEventListener('click', function() {


        if(likeStatus[i].parentElement.getAttribute("value") == 1) {
            likeButton[i].className = "material-icons text-white likeButton"
            cancel_clicked(likeButton[i].parentElement.getAttribute("value"))
            likeStatus[i].parentElement.setAttribute("value",0)

            console.log('likeStatus:', likeStatus[i].parentElement.getAttribute("value"));
        }
        else if(likeStatus[i].parentElement.getAttribute("value") == 0) {
            likeButton[i].className = "material-icons text-danger likeButton"
            accept_clicked(likeButton[i].parentElement.getAttribute("value"))
            likeStatus[i].parentElement.setAttribute("value",1)

            console.log('likeStatus:', likeStatus[i].parentElement.getAttribute("value"));
        }
    }, true);
}

function getUsername() {
    let base_url = document.querySelector('input[id="hidden_base_url"]').value;
    fetch(base_url + "/getUsername")
        //.then(data => console.log(data))
        .catch(a => console.log(a));
}
function sendComment(comment, observationID) {
    console.log('observationID + comment:', observationID, comment);
    let base_url = document.querySelector('input[id="hidden_base_url"]').value;
    fetch(base_url + "/sendComment/" + comment + "/" +observationID)
        //.then(data => console.log(data))
        .catch(a => console.log(a));
}

function accept_clicked(observationID) {
    console.log('set + observation ID:', observationID);
    let base_url = document.querySelector('input[id="hidden_base_url"]').value;
    fetch(base_url + "/changeLikeStatus/" + observationID)
        //.then(data => console.log(data))
        .catch(a => console.log(a));
}

function cancel_clicked(observationID) {
    console.log('cancel + observation ID:', observationID);
    let base_url = document.querySelector('input[id="hidden_base_url"]').value;
    fetch(base_url + "/cancelLikeStatus/" + observationID)
        //.then(data => console.log(data))
        .catch(a => console.log(a));
}

function getStatus() {
    let base_url = document.querySelector('input[id="hidden_base_url"]').value;
    fetch(base_url + "/checkUserLikeStatus/" + observationID)
        //.then(data => console.log(data))
        .catch(a => console.log(a));
}

function getNewButtons() {
    console.log("getNewButtons called");
    likeButton = document.getElementsByClassName("likeButton");
    likeStatus = document.getElementsByClassName("status");
    commentButton = document.getElementsByClassName("commentButton");
    commentContent = document.getElementsByClassName("commentContent");
    commentShow = document.getElementsByClassName("collapse");
}

function likeButtonListenerActivate() {
    console.log("like activate function");
    console.log(likeButton.length);
    for (let i = 0; i < likeButton.length; i++) {
        likeButton[i].addEventListener('click', function() {


            if(likeStatus[i].parentElement.getAttribute("value") == 1) {
                likeButton[i].className = "material-icons text-white likeButton"
                cancel_clicked(likeButton[i].parentElement.getAttribute("value"))
                likeStatus[i].parentElement.setAttribute("value",0)

                console.log('likeStatus:', likeStatus[i].parentElement.getAttribute("value"));
            }
            else if(likeStatus[i].parentElement.getAttribute("value") == 0) {
                likeButton[i].className = "material-icons text-danger likeButton"
                accept_clicked(likeButton[i].parentElement.getAttribute("value"))
                likeStatus[i].parentElement.setAttribute("value",1)

                console.log('likeStatus:', likeStatus[i].parentElement.getAttribute("value"));
            }
        }, true);
    }

    for (let i = 0; i < commentButton.length; i++) {
        commentButton[i].addEventListener('click', function () {
            console.log('test comment button:');
            document.getElementById('commentForm').submit()
            sendComment(commentContent[i].commentID.value, commentButton[i].parentElement.getAttribute("value"))

            username = getUsername()

            commentShow[i].insertAdjacentHTML("afterend", "<div class=\"py-2\"> <h5 class=\"font-weight-bold d-inline\">You: </h5>\n" +
                "<h5 class=\"d-inline font-light\">" + commentContent[i].commentID.value + "</h5></div>")

            //alert("comment success!")
        }, true)
    }
}

