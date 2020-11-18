document.getElementById("radio_buttons_container").addEventListener("click", getLeaderboard);

function getLeaderboard() {
    console.log(document.querySelector('input[name="size"]:checked').value);
    let getUrl = window.location;
    let baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    fetch(baseUrl +"/html/leaderboard/Jack/25/weeklyPoints")
        .then(resp => resp.text())
        .then(myHTML => document.getElementsByTagName("main").innerHTML = myHTML)
        .catch(a => console.log(a))
}
/*
let xhr

function getLeaderboard() {
    //console.log(document.querySelector('input[name="size"]:checked').value);
    let getUrl = window.location;
    let baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    //console.log(baseUrl +"/html/leaderboard/Jack/25/weeklyPoints");
    document.getElementById("leaderboard_container").textContent = "Waiting...";
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = myCallback;
    xhr.open("GET", baseUrl +"/html/leaderboard/Jack/25/weeklyPoints", true);
    xhr.send();
}

function myCallback() {
    console.log("readystate: " + xhr.readyState)
    if (xhr.readyState == 4) {
        if (xhr.status = 200) {
            fetch("http://localhost/PotluckCI/public/potluckcontroller/events?output=table")
                .then(resp => resp.text())
                .then(myHTML => document.getElementById("leaderboard_container").innerHTML = myHTML)
                .catch(a => console.log(a))
        } else {
            alert("Message returned, error status: " +  xhr.status + ".")
        }
    }
}
*/


/*
function (e){
    e.preventDefault();

    var name = document.getElementById('name2').value;
    var params = "name="+name;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'process.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        console.log(this.responseText);
    }

    xhr.send(params);
}

document.getElementById("changestyle").addEventListener('click', colorH1sRed)
document.getElementById("addh1").addEventListener('click', addH1)
document.getElementById("getEvents").addEventListener('click', getEvents)
document.getElementById("fetchtestJSON").addEventListener('click', getJsonData)
document.getElementById("fetchtestHTML").addEventListener('click', getHTMLData)


function colorH1sRed() {
    h1s = document.getElementsByTagName("h1")
    // HTMLCollection
    Array.from(h1s).forEach(h => h.style.color = 'red')
}

function addH1() {
    const h1 = document.createElement("h1")
    const title = document.createTextNode("here comes a new h1")
    h1.appendChild(title)
    document.getElementById("container").appendChild(h1)
}

let xhr

function getEvents() {
    document.getElementById("placeholder").textContent = "Waiting..."
    xhr = new XMLHttpRequest()
    xhr.onreadystatechange = myCallback
    xhr.open("GET", "http://localhost/PotluckCI/public/potluckcontroller/events?output=json", true)
    xhr.send()
}

function myCallback() {
    console.log("readystate: " + xhr.readyState)
    if (xhr.readyState == 4) {
        if (xhr.status = 200) {
            document.getElementById("placeholder").textContent = xhr.responseText
        } else {
            alert("Message returned, error status: " +  xhr.status + ".")
        }
    }
}

function getJsonData() {
    document.getElementById("placeholder").innerHTML = "<span style='color: green;'>Waiting...</span>"
    fetch("http://localhost/PotluckCI/public/potluckcontroller/events?output=json")
        .then(resp => resp.json())
        .then(myJson => document.getElementById("placeholder").textContent = JSON.stringify(myJson))
        .catch(a => console.log(a))
}

function getHTMLData() {
    document.getElementById("placeholder").innerHTML = "<span style='color: green;'>Waiting...</span>"
    fetch("http://localhost/PotluckCI/public/potluckcontroller/events?output=table")
        .then(resp => resp.text())
        .then(myHTML => document.getElementById("placeholder").innerHTML = myHTML)
        .catch(a => console.log(a))
}
 */