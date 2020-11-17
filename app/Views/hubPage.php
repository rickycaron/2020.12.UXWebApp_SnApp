

<?php foreach ($observations as $ob): ?>
    <div id="observationCardContainer">
        <div id="observationCard">
            <div id="observationCardProfile">
                <img id="profilePicture" src="https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png"> <! -- icons need to be imported in correct way!!! -->
                <h3 id="profileName"><?=$ob->username?></h3>
            </div>
            <div id="observationCardPicture">
                <img id="observationPicture" src=<?=$ob->picture?>>
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
        </div>
    </div>


<?php endforeach; ?>