let delete_friend_list = document.getElementById("send_friend_request").addEventListener("click",function() {
    let recieverID = document.querySelector('input[id="hidden_userID"]').value;
    sendRequest(recieverID);
});

function sendRequest(recieverID) {
    let baseUrl = document.querySelector('input[id="hidden_base_url"]').value;
    console.log(baseUrl + "/sendFriendRequest/" + recieverID);
    fetch(baseUrl + "/sendFriendRequest/" + recieverID)
        //.then(data => console.log(data))
        .catch(a => console.log(a));
    //window.location.reload(); //this line is not tested yet
}
