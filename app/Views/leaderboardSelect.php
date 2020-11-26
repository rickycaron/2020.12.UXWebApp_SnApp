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