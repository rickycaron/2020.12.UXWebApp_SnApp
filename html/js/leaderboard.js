document.getElementById("weekly").addEventListener("click", weeklyClicked);
document.getElementById("monthly").addEventListener("click", monthlyClicked);
document.getElementById("overall").addEventListener("click",overallClicked);

let filter = document.querySelector('input[id="hidden_variable_filter"]').value;
let baseUrl = document.querySelector('input[id="hidden_base_url"]').value;

function weeklyClicked() {
    console.log("weekly clicked");
    let url = getLeaderboardURL("weeklyPoints");
    fetchLeaderboardData(url);
}

function monthlyClicked() {
    console.log("monthly clicked");
    let url = getLeaderboardURL("monthlyPoints");
    fetchLeaderboardData(url);
}

function overallClicked() {
    console.log("overall clicked");
    let url = getLeaderboardURL("points");
    fetchLeaderboardData(url);
}

function fetchLeaderboardData(url) {
    console.log(url);
    fetch(url)
        .then(resp => resp.text())
        .then(data => document.getElementById("leaderboard_container").innerHTML = data)
        .catch(a => console.log(a));
    //.then(data => console.log(data))
    //.then(myHTML => document.getElementById("leaderboard_container").innerHTML = myHTML)
}

function getLeaderboardURL(period) {
    switch(filter) {
        case "friends":
            return baseUrl + '/fetchFriendsLeaderboard/' + period;
        case "worldwide":
            return baseUrl + '/fetchWorldwideLeaderboard/' + period;
        default:
            return baseUrl + '/fetchGroupLeaderboard/' + filter +'/' + period;
    }
}
