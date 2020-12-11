<h3>Observations:</h3>
<?php foreach ($ob as $o): ?>
    <div>

        <div class="card my-2 shadow-sm" style="width:100%;max-width:600px">
            <input type = "hidden" name="obID" id = "obID" value = "<?=$o->observationID?>">
            <input type = "hidden" name="username" id = "username" value = "<?=$o->username?>">
            <a href="<?= base_url()?>/anobservation/<?=$o->observationID?>">
                <div style="position: relative;">
                    <img class="card-img" id="observationCardPicture" src="<?php echo data_uri($o->imageData,$o->imageType); ?>">
                    <div class="card-img" style="box-shadow: inset 0px -50px 40px -20px black;position: absolute; width: 100%; height: 100%;top: 0; left: 0;"></div>
                    <h4 class="text-white" style="position: absolute; bottom: 0px; right: 12px;"><?=$o->username?></h4>
                    <span class="material-icons text-white" style="font-size:30px;position: absolute; bottom: 6px; left: 8px" >favorite_border</span>
                </div>
            </a>

            <div class="card-body pt-2 pb-0">
                <div class=" d-flex flex-row py-1">
                    <div class="mr-auto">
                        <h3 class="mb-0"><?=$o->specieName?></h3>
                    </div>
                </div>
                <hr class="mt-0 mb-2">
                <div class="my-2">
                    <h6><?=$o->date?> at <?=$o->time?></h6>
                </div>
            </div>

            <div id="dateObject" hidden><?=$o->date?></div>

        </div>

        <script type="text/javascript">
            var php_lastDate = "<?php echo $o->date; ?>";
            var php_lastTime = "<?php echo $o->time; ?>";
        </script>

    </div>
<?php endforeach?>

<div id="placeholderLoading"></div>

<?php
function data_uri($file, $mime)
{
    $base64   = base64_encode($file);
    return ('data:' . $mime . ';base64,' . $base64);
}
?>
