//do this function when scrolled to the bottom of the page
$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
        console.log('Entered showMoreFriendsObservations.s scroll function');
        // ajax call get data from server and append to the div
        getOtherObservations()
    }
});

var base_url = window.location;
var lastDate = php_lastDate;
var lastTime = php_lastTime;

var lastDateObject = new Date(lastDate);
var tomorrowObject = new Date(lastDateObject.getTime()+1000*60*60*24);
var tomorrow = formatDate(tomorrowObject);
tomorrow = tomorrow.toString();

function getOtherObservations() {
    document.getElementById("placeholderLoading").innerHTML = "<span style='color: green;'>Waiting...</span>"
    console.log('Entered showMoreFriends', tomorrow);
    fetch(base_url + "?extra=true&lastDate=" + lastDate + "&lastTime=" + lastTime + "&tomorrow=" + tomorrow)
        .then(resp => resp.text())
        .then(myHTML => document.getElementById("hubPageContainer").innerHTML += myHTML)
        .catch(a => console.log(a))
    document.getElementById("placeholderLoading").innerHTML = "<span></span>"
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}