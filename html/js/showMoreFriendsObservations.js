//do this function when scrolled to the bottom of the page
$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
        console.log('Entered showMoreFriendsObservations.s scroll function');
        // ajax call get data from server and append to the div
        getOtherObservations()
    }
});

var base_url = window.location;
var lastDate =

function getOtherObservations() {
    document.getElementById("placeholderLoading").innerHTML = "<span style='color: green;'>Waiting...</span>"
    console.log('Entered showMoreFriends', base_url);
    fetch(base_url + "/hub?extra=true&lastDate=2020-11-17&lastTime=10:24:00")
        .then(resp => resp.text())
        .then(myHTML => document.getElementById("hubPageContainer").innerHTML += myHTML)
        .catch(a => console.log(a))
    document.getElementById("placeholderLoading").innerHTML = "<span></span>"
}