<!-- javascript API key = AIzaSyC7KOWpmjEHMRXKd19aMz8CT4ig14kHDw4 -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7KOWpmjEHMRXKd19aMz8CT4ig14kHDw4&callback=initMap&libraries=&v=weekly" defer></script>

    <div id="anobservation_profile_info">
        <img id="observation_profilePicture" src="<?= base_url()?>/image/profile.png"> <! -- icons need to be imported in correct way!!! -->
        <h3 id="observation_profileName"><?=$username?></h3>
    </div>
    <div id="observation_title_description">
        <h2><?=$specie_name?></h2>
        <p><?=$user_note?></p>
    </div>
    <img id="observation_picture" src="<?php echo data_uri($image_data, $image_type); ?>" alt="picture of the observation">
    <div id="information_wrapper">
        <div class="information_container">
            <span class="material-icons">event_note</span>
            <p><?=$date?></p>
        </div>
        <div class="information_container">
            <span class="material-icons">schedule</span>
            <p><?=$time?></p>
        </div>
        <div class="information_container">
            <span class="material-icons">location_on</span>
            <p id="observation_location"><?=$location?></p>
        </div>
    </div>
    <div id="map"></div>
    <div>
        <h2>Details</h2>
        <p><?=$description?></p>
    </div>
    <div id="like_and_comment_button">
        <div id="like_button">
            <span class="material-icons">favorite_border</span>
            <p><?=$like_count?> likes</p>
        </div>
        <div id="comment_button">
            <span class="material-icons">chat</span>
            <p><?=$comment_count?> comments</p>
        </div>
    </div>
    <hr>
    <div id="likes_or_comment_placeholder">
        <?=$likes_comments?>
    </div>

<input type="hidden" id="hidden_variable_filter" value="<?=$id?>"/>

<?php
function data_uri($file, $mime)
{
    $base64   = base64_encode($file);
    return ('data:' . $mime . ';base64,' . $base64);
}
?>