<?php if($userid == session()->get('username')):?>
    <a href="logout" class="btn btn-lg btn-primary btn-block my-3" style="width:100%;max-width:600px">Logout</a>
<?php endif?>
<div class="d-flex flex-row m-3" style="width:100%;max-width:600px">

    <div class="">
        <img src="https://pic4.zhimg.com/ee44507a59989947c85d60e0b400f0c5_xl.jpg" class="rounded-circle" alt="templatemo easy profile" style="width: 100px;">
    </div>

    <div class="mx-4">
        <h3 class="user_name">Hello : <?= $username?></h3>
        <h4 class="personal_description">A guy who really likes photography.</h4>
        <div class = "trophyContainer">
            <span class="material-icons trophy">emoji_events</span>
            <span class="material-icons trophy">emoji_events</span>
            <span class="material-icons trophy">emoji_events</span>
            <span class="material-icons trophy">emoji_events</span>
        </div>
    </div>

</div>


<div class="d-flex flex-row my-3">
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > observations</span>
        <span class = "h6" > <?=$observationCount[0]->observationCount?></span>
    </div>
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > likes</span>
        <span class = "h6" > <?=$likeCount[0]->likeCount?></span>
    </div>
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > comments</span>
        <span class = "h6" > <?=$commentCount[0]->commentCount?></span>
    </div>
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > friends</span>
        <span class = "h6" > <?=$friendCount[0]->friendCount?></span>
    </div>
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > points</span>
        <span class = "h6" > <?=$pointCount[0]->pointCount?></span>
    </div>
</div>

<div id="observationCardsContainer">
<?php foreach ($observations as $ob): ?>

    <div class="card my-2 shadow-sm" style="width:100%;max-width:600px">
<div class="card my-2 shadow-sm" style="width:100%;max-width:600px">

        <a href="anobservation/<?=$ob->id?>">
            <div style="position: relative;">
                <img class="card-img" id="observationCardPicture" src="<?php echo data_uri($ob->imageData,$ob->imageType); ?>">
                <div class="card-img" style="box-shadow: inset 0px -50px 40px -20px black;position: absolute; width: 100%; height: 100%;top: 0; left: 0;"></div>
                <h4 class="text-white" style="position: absolute; bottom: 0px; right: 12px;"><?=$ob->username?></h4>
                <span class="material-icons text-white" style="font-size:30px;position: absolute; bottom: 6px; left: 8px">favorite_border</span>
            </div>
        </a>

        <div class="card-body pt-2 pb-0">
            <div class=" d-flex flex-row py-1">
                <div class="mr-auto">
                    <h3 class="mb-0"><?=$ob->specieName?></h3>
                </div>
                <span class="material-icons my-auto" style="font-size: 40px">expand_less</span>
            </div>
            <hr class="mt-0 mb-2">
            <div class="py-2">
                <h5 class="font-weight-bold d-inline">Joppe Leers: </h5>
                <h5 class="d-inline">Wow what a nice flower!</h5>
            </div>
            <div class="py-2">
                <h5 class="font-weight-bold d-inline">Robbe Abts: </h5>
                <h5 class="d-inline">Awesome!</h5>
            </div>
            <div class="d-flex flex-row my-3">
                <input type="txt" class="form-control" name="comment" placeholder="Create new comment">
                <span class="material-icons my-auto ml-3 mr-2 text-primary" style="font-size:30px">send</span>
            </div>
            <div class="my-2">
                <h6><?=$ob->date?> at <?=$ob->time?></h6>
            </div>
        </div>
        <div id="dateObject" hidden><?=$ob->date?></div>

    </div>

    <script type="text/javascript">
        var php_lastDate = "<?php echo $ob->date; ?>";
        var php_lastTime = "<?php echo $ob->time; ?>";
    </script>


<?php endforeach; ?>
</div>
<div id="upToDateDiv" hidden></div>
<div id="endOfObservations"></div>
<div id="placeholderLoading"></div>

<?php
function data_uri($file, $mime)
{
    $base64   = base64_encode($file);
    return ('data:' . $mime . ';base64,' . $base64);
}
?>
