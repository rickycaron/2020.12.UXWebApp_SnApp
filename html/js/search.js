document.getElementById("All").addEventListener("click", AllClicked);
document.getElementById("Observations").addEventListener("click", ObClicked);
document.getElementById("Groups").addEventListener("click", GroupsClicked);
document.getElementById("Users").addEventListener("click",UsersClicked);

document.getElementById("search").addEventListener("keyup", keyboardPressed);

//all = 0, observations = 1, groups = 2, users=3
let currentSearchFilter = 0;
let currentInput;
let baseUrl = document.querySelector('input[id="hidden_base_url"]').value;

function fetchSearchResult(){
    console.log(currentInput + " " + currentSearchFilter);
    //TODO: only fetch search results if currentInput is not empty
    switch (currentSearchFilter) {
        case 0:
            fetchObservations()
            fetchGroups()
            fetchUsers()
            break;
        case 1:
            fetchObservations()
            break;
        case 2:
            fetchGroups()
            break;
        case 3:
            fetchUsers()
            break;

    }
}

function fetchObservations(){
    console.log(baseUrl + "/searchGetObservations/" + currentInput);
    fetch(baseUrl + "/searchGetObservations/" + currentInput)
        .then(resp => resp.text())
        .then(data => document.getElementById("search_result_container").innerHTML = data)
        .catch(a => console.log(a));

}

function fetchGroups(){
    console.log(baseUrl + "/searchGetGroups/" + currentInput);
}

function fetchUsers(){
    console.log(baseUrl + "/searchGetUsers/" + currentInput);
}

function keyboardPressed() {
    currentInput = document.getElementById("search").value;
    fetchSearchResult()
}
function AllClicked() {
    currentSearchFilter = 0;
    fetchSearchResult()
}

function ObClicked() {
    currentSearchFilter = 1;
    fetchSearchResult()
}

function GroupsClicked() {
    currentSearchFilter = 2;
    fetchSearchResult()
}

function UsersClicked() {
    currentSearchFilter = 3;
    fetchSearchResult()
}
