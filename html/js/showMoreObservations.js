//do this function when scrolled to the bottom of the page
$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
        console.log('Entered showMoreFriendsObservations.s scroll function');
        // ajax call get data from server and append to the div
        getOtherObservations()
    }
});

let base_url = window.location;
var lastDate = php_lastDate;
var lastTime = php_lastTime;

//var lastDate = $('dateObject:last');


function getOtherObservations() {
    console.log(php_lastDate, php_lastTime);

    document.getElementById("placeholderLoading").innerHTML = "<span style='color: green;'>Waiting...</span>"
    fetch(base_url + "?extra=true&lastDate=" + lastDate + "&lastTime=" + lastTime)
        .then(resp => resp.text())
        .then(myHTML => document.getElementById("observationCardsContainer").innerHTML += myHTML,)
        .catch(a => console.log(a));
    document.getElementById("placeholderLoading").innerHTML = "<span></span>"
}

document.getElementById("upToDateDiv").innerText = function showUpToDate() {
    document.getElementById("endOfObservations").innerHTML = "You are up to date"
};
