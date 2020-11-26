<?php
$uri = service('uri');
?>
<?php if(session()->get('isLoggedIn')): ?>
<?php else: ?>
<?php endif; ?>
<a  <?= ($uri->getSegment(1) == 'leaderboardSelect'?'active' : null)?> href="/"></a>

<div style="width:100%;max-width:600px">

    <a class="w-100 active" href="leaderboard/friends">
        <div class="card my-2 shadow-sm d-flex flex-row" style="width:100%;max-width:600px">
            <div class="ml-3 mr-auto my-2">
                <h2> Friends </h2>
            </div>
            <span class="material-icons my-auto mx-3" style="font-size: 40px">navigate_next</span>
        </div>
    </a>

    <a class="w-100 active" href="leaderboard/worldwide">
        <div class="card my-2 shadow-sm d-flex flex-row" style="width:100%;max-width:600px">
            <div class="ml-3 mr-auto my-2">
                <h2> Worldwide </h2>
            </div>
            <span class="material-icons my-auto mx-3" style="font-size: 40px">navigate_next</span>
        </div>
    </a>

    <?php foreach ($groups as $groupname): ?>
        <a class="w-100 active" href="leaderboard/<?=$groupname?>">
            <div class="card my-2 shadow-sm d-flex flex-row" style="width:100%;max-width:600px">
                <div class="ml-3 mr-auto my-2">
                    <h2> <?=$groupname?> </h2>
                </div>
                <span class="material-icons my-auto mx-3" style="font-size: 40px">navigate_next</span>
            </div>
        </a>
    <?php endforeach; ?>

</div>

<!--
<?php
$uri = service('uri');
?>
<?php if(session()->get('isLoggedIn')): ?>
<?php else: ?>
<?php endif; ?>
<a  <?= ($uri->getSegment(1) == 'leaderboardSelect'?'active' : null)?> href="/"></a>

<div class="addObservationContainer">
<div id="leaderboard_select_container">
    <div class="filter_container">
        <h2>Groups</h2>
        <hr class="big_ruler">
        <?php foreach ($groups as $groupname): ?>
            <div class="leaderboard_select_element">
                <h3 class="h3_leaderboard_filter"><?=$groupname?></h3>
                <a href="leaderboard/<?=$groupname?>"><span class="material-icons">navigate_next</span></a>
            </div>
            <hr class="small_ruler">
        <?php endforeach; ?>
    </div>

    <div class="filter_container">
        <h2>Other filters</h2>
        <hr class="big_ruler">
        <div class="leaderboard_select_element">
            <h3 class="h3_leaderboard_filter">friends</h3>
            <a href="leaderboard/friends"><span class="material-icons">navigate_next</span></a>
        </div>
        <hr class="small_ruler">
        <div class="leaderboard_select_element">
            <h3 class="h3_leaderboard_filter">worldwide</h3>
            <a href="leaderboard/worldwide"><span class="material-icons">navigate_next</span></a>
        </div>
        <hr class="small_ruler">
    </div>
</div>
</div>
-->
