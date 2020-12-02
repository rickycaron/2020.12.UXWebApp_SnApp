
<div style="width:100%;max-width:600px">
<?php foreach ($groups as $group): ?>
    <?php if ($group[3] ==session()->get('id')):?>
        <h4>Groups created by me:</h4>
        <?php break;?>
    <?php endif?>
<?php endforeach;?>

<?php foreach ($groups as $group): ?>
    <?php if ($group[3] ==session()->get('id')):?>
        <div  class="card my-2  active shadow-sm d-flex flex-row" style="width:100%;max-width:600px" onclick="location.href='group/<?=$group[0]?>';">
            <div class="ml-3 mr-auto my-2 mt-3">
                <h2><?=$group[0]?></h2>
                <p><?=$group[1]?></p>
                <a href="<?=base_url()?>/groupmembers/<?=$group[0]?>"><?=$group[2]?> members</a>
            </div>
            <span class="material-icons my-auto mx-3" style="font-size: 40px">navigate_next</span>
        </div>
    <?php endif?>
<?php endforeach; ?>


    <?php foreach ($groups as $group): ?>
        <?php if ($group[3] !=session()->get('id')):?>
            <h4>Groups I joined: </h4>
            <?php break;?>
        <?php endif?>
    <?php endforeach;?>

<?php foreach ($groups as $group): ?>
    <?php if ($group[3] !=session()->get('id')):?>
        <div  class="card my-2 shadow-sm d-flex flex-row" style="width:100%;max-width:600px">
            <div class="ml-3 mr-auto mb-2 mt-3">
                <h2><?=$group[0]?></h2>
                <p><?=$group[1]?></p>
                <a href="<?=base_url()?>/groupmembers/<?=$group[0]?>"><?=$group[2]?> members</a>
            </div>
            <span onclick="location.href='group/<?=$group[0]?>';" class="material-icons my-auto mx-3" style="font-size: 40px">keyboard_arrow_right</span>
        </div>
    <?php endif?>
<?php endforeach; ?>

</div>

<a href="newgroup" class="btn btn-lg btn-primary btn-block my-3" style="width:100%;max-width:600px">Create a new group</a>



