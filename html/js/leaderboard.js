document.getElementById("radio_buttons_container").addEventListener("click", getLeaderboard);

function getLeaderboard() {
    let getUrl = window.location;
    let baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    let filter = document.querySelector('input[id="hidden_variable_filter"]').value;
    let period = document.querySelector('input[name="size"]:checked').value;
    //console.log(baseUrl +"/html/leaderboard/"+filter+"/"+period)
    fetch(baseUrl +"/html/leaderboard/"+filter+"/"+period)
        .then(resp => resp.text())
        .then(myHTML => document.getElementsByTagName("main").innerHTML = myHTML)
        .catch(a => console.log(a));
}