<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7KOWpmjEHMRXKd19aMz8CT4ig14kHDw4&callback=initMap&libraries=&v=weekly" defer></script>
<div style="width:100%;max-width:600px">
    <div class="d-flex flex-row my-4">
        <img class="rounded-circle" id="observation_profilePicture" style="width: 100px;" src="<?= base_url()?>/image/profile.png">
        <h3 id="observation_profileName" class="my-auto mx-4"><?=$username?></h3>
    </div>

    <div id="observation_title_description">
        <h2><?=$specie_name?></h2>
        <p><?=$user_note?></p>
    </div>

    <img class="img-fluid" id="observation_picture" src="https://cdn.britannica.com/84/73184-004-E5A450B5/Sunflower-field-Fargo-North-Dakota.jpg" alt="picture of the observation">
    <!-- src="<?php echo data_uri($image_data, $image_type); ?>" -->
    <div class="d-flex flex-row py-4 justify-content-center">
        <div class="information_container mx-auto">
            <span class="material-icons">event_note</span>
            <p><?=$date?></p>
        </div>
        <div class="information_container mx-auto">
            <span class="material-icons">schedule</span>
            <p><?=$time?></p>
        </div>
        <div class="information_container mx-auto">
            <span class="material-icons">location_on</span>
            <p id="observation_location"><?=$location?></p>


        </div>
    </div>

    <div id="map" class="jumbotron" style="height: 200px" ></div>
    <div>
        <h2>Details</h2>
        <p><?=$description?></p>
    </div>
    <div id="like_and_comment_button" class="d-flex"  >
        <div id="like_button" class=" btn btn-primary btn-block my-3 mr-5 ml-5">
            <span class="material-icons">favorite_border</span>
            <p><?=$like_count?> likes</p>
        </div>
        <div id="comment_button" class="btn btn-primary btn-block my-3 mr-5 ml-5">
            <span class="material-icons">chat</span>
            <p><?=$comment_count?> comments</p>
        </div>
    </div>
    <hr>
    <div id="likes_or_comment_placeholder">
        <?=$likes_comments?>
    </div>
</div>

<input type="hidden" id="hidden_variable_filter" value="<?=$id?>"/>

<?php
function data_uri($file, $mime)
{
    $base64   = base64_encode($file);
    return ('data:' . $mime . ';base64,' . $base64);
}
?>