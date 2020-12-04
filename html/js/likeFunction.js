let likeButton = document.getElementsByClassName("likeButton");
let likeStatus = document.getElementsByClassName("status");

for (let i = 0; i < likeButton.length; i++) {
    likeButton[i].addEventListener('click', function() {
        let likeS = likeStatus[i].parentElement.getAttribute("value")

        if(likeS == 1) {
            likeButton[i].className = "material-icons text-white likeButton"
            cancel_clicked(likeButton[i].parentElement.getAttribute("value"))
            likeStatus[i] = 0
            console.log(i);
            console.log('likeStatus:', likeStatus[i]);
        }
        else if(likeS == 0) {
            likeButton[i].className = "material-icons text-danger likeButton"
            accept_clicked(likeButton[i].parentElement.getAttribute("value"))
            likeStatus[i] = 1
            console.log(i);
            console.log('likeStatus:', likeStatus[i]);
        }
    }, true);
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
