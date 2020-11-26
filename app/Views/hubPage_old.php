<div id="hubPageContainer">
    <?php foreach ($observations as $ob): ?>
        <a class="observationcard_hyperlink" href="anobservation/<?=$ob->id?>">
            <div id="observationCardContainer">
                <div id="observationCard">
                    <div id="observationCardProfile">
                        <img id="profilePicture" src="https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png"> <! -- icons need to be imported in correct way!!! -->
                        <h3 id="profileName"><?=$ob->username?></h3>
                    </div>
                    <div id="observationCardPicture">
                        <img id="observationPicture" src="<?php echo data_uri($ob->imageData,$ob->imageType); ?>">
                    </div>
                    <div id="observationCardPictureFooter">
                        <div id="observationCardPictureFooterSpecie">
                            <h3><?=$ob->specieName?></h3>
                        </div>
                        <div id="observationCardPictureFooterButtons">
                            <span class="material-icons">favorite_border</span>
                            <span class="material-icons">chat</span>
                        </div>
                    </div>
                    <div id="observationCardSpecieDescription">
                        <p><?=$ob->description?></p>
                    </div>
                    <div id="observationCardTime">
                        <h4><?=$ob->date?> at <?=$ob->time?></h4>
                    </div>
                </div>
            </div>
        </a>
        <script type="text/javascript">
            var php_lastDate = "<?php echo $ob->date; ?>";
            var php_lastTime = "<?php echo $ob->time; ?>";
        </script>


    <?php endforeach; ?>

</div>
<div id="placeholderLoading"></div>

<?php
function data_uri($file, $mime)
{
    $base64   = base64_encode($file);
    return ('data:' . $mime . ';base64,' . $base64);
}
?>