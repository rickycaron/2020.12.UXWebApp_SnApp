document.getElementById("weekly").addEventListener("click", weeklyClicked);
document.getElementById("monthly").addEventListener("click", monthlyClicked);
document.getElementById("overall").addEventListener("click",overallClicked);

function weeklyClicked() {
    console.log("weekly clicked");
    getLeaderboard("weeklyPoints")
}

function monthlyClicked() {
    console.log("monthly clicked");
    getLeaderboard("monthlyPoints")
}

function overallClicked() {
    console.log("overall clicked");
    getLeaderboard("points")
}

function getLeaderboard(period) {
    let baseUrl = document.querySelector('input[id="hidden_base_url"]').value;
    let filter = document.querySelector('input[id="hidden_variable_filter"]').value;

    console.log(baseUrl +"/getLeaderboardHTMLajax/"+filter+"/"+period);

    fetch(baseUrl +"/getLeaderboardHTMLajax/"+filter+"/"+period)
        .then(resp => resp.text())
        .then(data => document.getElementById("leaderboard_container").innerHTML = data)
        .catch(a => console.log(a));
    //.then(data => console.log(data))
    //.then(myHTML => document.getElementById("leaderboard_container").innerHTML = myHTML)
}
