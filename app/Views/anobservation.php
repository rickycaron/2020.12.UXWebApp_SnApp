<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>An observation</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="keywords" content="Animals Plants Nature Social media" />
    <meta name="description" content="This website is a social madia like page where you can share your observations from nature with your friends and the world" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- stylesheet css -->
    <link href='css/main.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIwzALxUPNbatRBj3Xi1Uhp0fFzwWNBkE&callback=initMap&libraries=&v=weekly"
      defer
    >
    </script>
    <script>       
            // Initialize and add the map
        function initMap() {
          // The location of Uluru
          const uluru = { lat: -25.344, lng: 131.036 };
          // The map, centered at Uluru
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: uluru,
          });
          // The marker, positioned at Uluru
          const marker = new google.maps.Marker({
            position: uluru,
            map: map,
          });
        }
    </script>
</head>

    <div class="observationcontainer">
        <h1>An Observation</h1>
        <div id="observationCardPictureFooter" class="arow">
            <h1>Turtle</h1>
            <div id="observationCardPictureFooterButtons">              
                <span class="material-icons" >delete</span>
            </div>
        </div>

        <div class="arow">
            <span class="material-icons iconsforinformation">event_note</span>
            <span class="observationtext">DD/MM/YYYY</span>
        </div> 
        <div class="arow">
            <span class="material-icons iconsforinformation">schedule</span>
            <span class="observationtext">00:00 PM</span>
        </div> 
        <div class="arow">
            <span class="material-icons iconsforinformation">location_on</span>
            <span class="observationtext">On a mysterious place</span>
        </div> 

        <div id="observationCardPictureFooter" class="arow">
            <h1>Photos</h1>
        </div>

        
        <div class="image">
            <img src="beautiful_lotus.jpg" alt="Species photo">
        </div>

        <div id="observationCardPictureFooter" class="arow">
            <h1>My Google Maps Demo</h1>           
        </div>

        <!--The div element for the map -->
        <div id="map"></div>

        <div id="observationCardPictureFooter" class="arow">
            <h1>Details</h1>                      
        </div>
        <p class="textforobservation">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper diam at erat pulvinar, at pulvinar felis blandit. Vestibulum volutpat tellus diam, consequat gravida libero rhoncus ut.
        </p> 
            

        <div id="observationCardPictureFooter" class="arow">
            <h1>Description</h1>           
        </div>

        <p class="textforobservation">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper diam at erat pulvinar, at pulvinar felis blandit. Vestibulum volutpat tellus diam, consequat gravida libero rhoncus ut.
        </p> 




       

        



        
        

    </div>
















    <!-- <div id="addaphoto">
        <div class="container">
            <div class="wrapper">
                <div class="image">
                    <img src="beautiful lotus.jpg">
                </div>
                <div class="content">
                    <div class="material-icons icon">backup</div>
                     <div class="text">No file chosen, yet!</div>
                </div>
                <div id="cancel-btn" class="material-icons">close</div>
                <div class="file-name">File name here</div>
            </div>
            <input id="default-btn" type="file" hidden>
            <button id="custom-btn">Choose a file</button>
        </div>
    </div>

    <div class="center">
        <form method="post">

            <div class="txt_field">
                <input type="text" placeholder="Species will be shown here">
                <span></span>
                <label>Species</label>
            </div>

            <div class="txt_field">
                <input type="date" id="date" name="date" required>
                <span></span>
                <label for="date">Date:</label>
            </div>

            <div class="txt_field">
                <input type="time" id="time" name="time" min="06:00" max="23:00" required>
                <span></span>
                <label for="time">Time:</label>
            </div>

            <div class="txt_field">
                <input type="number" required>
                <span></span>
                <label>Number of individuals</label>
            </div>

            <div class="txt_field">
                <input type="Address" required>
                <span></span>
                <label>Address</label>
            </div>

            <div class="txt_field">
                <input type="text" required>
                <span></span>
                <label for="description">Description</label>
            </div>

            <input type="submit" value="submit">
            <input type="submit" value="cancel">
        </form>
    </div>
     -->