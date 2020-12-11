
<div style="width:100%;max-width:600px">
<?php foreach ($groups as $group): ?>
    <?php if ($group[3] == session()->get('id')):?>
        <h4 class="font-light"><?php echo lang('app.Groups_created_by_me') ?></h4>
        <?php break;?>
    <?php endif?>
<?php endforeach;?>

<?php foreach ($groups as $group): ?>
    <?php if ($group[3] ==session()->get('id')):?>

    <div  class="card my-2 shadow-sm" style="width:100%;max-width:600px";">
        <a class="w-100 active" href="<?=$base_url?>/group/<?=$group[0]?>">
                <div class="d-flex flex-row">
                    <div class="ml-3 mr-auto my-2 mt-3">
                        <h2><?=$group[0]?></h2>
                        <p class="mb-1 font-light"><?=$group[1]?></p>
                    </div>
                    <span class="material-icons my-auto mx-3" style="font-size: 40px">navigate_next</span>
                </div>
        </a>
        <a class="px-3 pb-3" href="<?=base_url()?>/groupmembers/<?=$group[0]?>"><?=$group[2]?> members</a>

    </div>

    <?php endif?>
<?php endforeach; ?>

<a href="newgroup" class="btn btn-lg btn-primary btn-block my-3" style="width:100%;max-width:600px"><?php echo lang('app.Create_a_new_group') ?></a>


    <?php foreach ($groups as $group): ?>
        <?php if ($group[3] !=session()->get('id')):?>
            <h4 class="font-light"><?php echo lang('app.Groups_I_joined') ?></h4>
            <?php break;?>
        <?php endif?>
    <?php endforeach;?>

<?php foreach ($groups as $group): ?>
    <?php if ($group[3] !=session()->get('id')):?>
        <div  class="card my-2 shadow-sm" style="width:100%;max-width:600px";">
        <a class="w-100 active" href="<?=$base_url?>/group/<?=$group[0]?>">
            <div class="d-flex flex-row">
                <div class="ml-3 mr-auto my-2 mt-3">
                    <h2><?=$group[0]?></h2>
                    <p class="mb-1"><?=$group[1]?></p>
                </div>
                <span class="material-icons my-auto mx-3" style="font-size: 40px">navigate_next</span>
            </div>
        </a>
        <a class="px-3 pb-3" href="<?=base_url()?>/groupmembers/<?=$group[0]?>"><?=$group[2]?> <?php echo lang('app.members') ?></a>

        </div>
    <?php endif?>
<?php endforeach; ?>

</div>





