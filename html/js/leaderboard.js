document.getElementById("radio_buttons_container").addEventListener("click", getLeaderboard);

function getLeaderboard() {
    let getUrl = window.location;
    let baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    let filter = document.querySelector('input[id="hidden_variable_filter"]').value;
    let period = document.querySelector('input[name="size"]:checked').value;
    //location.replace(baseUrl +"/html/leaderboard/"+filter+"/"+period)

    console.log(baseUrl +"/html/getLeaderboardHTMLajax/"+filter+"/"+period);
    /*
    fetch(baseUrl +"/html/getLeaderboardHTMLajax/"+filter+"/"+period)
        .then(resp => resp.text())
        .then(data => console.log(data))
        .then(myHTML => document.getElementsByTagName("leaderboard_container").innerHTML = myHTML)
        .catch(a => console.log(a));
        */
}