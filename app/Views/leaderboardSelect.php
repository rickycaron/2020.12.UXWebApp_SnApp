<?php
$uri = service('uri');
?>
<?php if(session()->get('isLoggedIn')): ?>
<?php else: ?>
<?php endif; ?>
<a  <?= ($uri->getSegment(1) == 'leaderboardSelect'?'active' : null)?> href="/"></a>

<div class="w-100 mt-2">

    <a class="w-100" style="color: black;" href="leaderboard/friends">
        <div class="card my-2 shadow-sm d-flex flex-row" style="width:100%;max-width:600px">
            <div class="ml-3 mr-auto my-2">
                <h2 class="font-light"> <?php echo lang('app.Friends') ?> </h2>
            </div>
            <span class="material-icons my-auto mx-3" style="font-size: 40px">navigate_next</span>
        </div>
    </a>

    <a class="w-100" style="color: black;" href="leaderboard/worldwide">
        <div class="card my-2 shadow-sm d-flex flex-row" style="width:100%;max-width:600px">
            <div class="ml-3 mr-auto my-2">
                <h2 class="font-light"> <?php echo lang('app.Worldwide') ?> </h2>
            </div>
            <span class="material-icons my-auto mx-3" style="font-size: 40px">navigate_next</span>
        </div>
    </a>

    <?php foreach ($groups as $groupname): ?>
        <a class="w-100" style="color: black;" href="leaderboard/<?=$groupname?>">
            <div class="card my-2 shadow-sm d-flex flex-row" style="width:100%;max-width:600px">
                <div class="ml-3 mr-auto my-2">
                    <h2 class="font-light"> <?=$groupname?> </h2>
                </div>
                <span class="material-icons my-auto mx-3" style="font-size: 40px">navigate_next</span>
            </div>
        </a>
    <?php endforeach; ?>

</div>