<div id="groupCardContainer">
    <form method="post">
        <div class="txt_field">
            <input type="text" name="Username/email">
            <span></span>
            <label>Search</label>
        </div>
    </form>
    <?php foreach ($groups as $groupname): ?>
        <div onclick="location.href='group';" id="groupCard">
            <div id="groupCardName">
                <h2 id="groupName"> <?=$groupname?> </h2>
            </div>
            <div id="groupCardInformation">
                <div id="groupCardPicture">
                    <img id="observationPicture" src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png">
                </div>
                <div id="groupInformationText">
                    <div id="groupDescription">
                        <h4 id="groupDescriptionHeader">Description: </h4>
                        <p id="groupDescriptionInfo">Observations from the members of UXWD6</p>
                    </div>
                    <div id="groupMembers">
                        <h4 id="groupMembersHeader">Members: </h4>
                        <p id="groupMembersInfo">6</p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


    <div class="leaderboard_select_element">
        <h3 class="h3_leaderboard_filter"><?=$groupname?></h3>
        <a href="leaderboard/<?=$groupname?>"><span class="material-icons">navigate_next</span></a>
    </div>
    <hr class="small_ruler">
