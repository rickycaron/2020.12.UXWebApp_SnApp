let addFriendButtonList = document.getElementsByClassName("btn");
let groupName = php_groupName;

for (let i = 0; i < addFriendButtonList.length; i++) {
    addFriendButtonList[i].addEventListener('click', function() {
        accept_clicked(addFriendButtonList[i].parentElement.getAttribute("value"))
        addFriendButtonList[i].disabled=true
    }, true);
}

function accept_clicked(nameString) {
    console.log('entered accept click:', nameString);
    let base_url = document.querySelector('input[id="hidden_base_url"]').value;
    fetch(base_url + "/addFriendToGroup/" + nameString.toString() + "/" + groupName)
        //.then(data => console.log(data))
        .catch(a => console.log(a));
}



// function addFriend(button) {
//     $(button).prop('disabled',true).css('opacity',0.5);
//     let parent = $(this).closest('.list-group-item');
//     //var friendName = $(this).closest.html('#friendName').text();
//     //var friendName = $("<div>").html($(this).closest('#friendName')).text();
//     //var friend = parent.getAttributeNames();
//     let name = $(this).parentElement.getAttribute("value");
//     console.log('entered button click:', name);
// }