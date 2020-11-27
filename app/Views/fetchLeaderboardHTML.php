
<div id="top_three" class="d-none d-sm-block ">
    <div row d-flex>
            <div id="second" class=" col d-flex justify-content-center top_three_person">
                <?php if(isset($name_second)):?>
                <!--<img src="<?= base_url()?>/image/profile.png">-->
                <h3><?=$name_second?> <?=$points_second?></h3>
                <?php endif?>
            </div>
        <div id="first" class=" col d-flex justify-content-center top_three_person">
            <!--<img src="<?= base_url()?>/image/profile.png">-->
            <h3><?=$name_first?> <?=$points_first?></h3>
        </div>
            <div id="third" class=" col d-flex justify-content-center top_three_person">
                <?php if(isset($name_third)): ?>
                <!--<img src="<?= base_url()?>/image/profile.png">-->
                <h3><?=$name_third?> <?=$points_third?></h3>
                <?php endif?>
            </div>
        </div>
    </div>
    <img class="d-none d-sm-block" id="podium_img" src="<?= base_url()?>/image/podiumv2.png" alt="podium">
    <div class="d-md-none d-lg-none d-xl-none">
        <ul class="list-group my-3">

            <li href="#" class="list-group-item list-group-item-action d-flex justify-content-between bg-third">
                <h3>1.<?=$name_first?></h3>
                <h3><?=$points_first?></h3>
            </li>
            <?php if(isset($name_second)):?>
            <li href="#" class="list-group-item list-group-item-action d-flex justify-content-between bg-secondary">
                <h3>2.<?=$name_second?></h3>
                <h3><?=$points_second?></h3>
            </li>
            <?php endif?>
            <?php if(isset($name_third)): ?>
            <li href="#" class="list-group-item list-group-item-action d-flex justify-content-between bg-third">
                <h3>3.<?=$name_third?></h3>
                <h3><?=$points_third?></h3>
            </li>
            <?php endif?>
        </ul>
    </div>

<ul class="list-group my-3">
    <?php $loopcounter = 0;?>
        <?php foreach ($persons_list as $person): ?>
    <li href="#" class="list-group-item list-group-item-action d-flex justify-content-between bg-secondary">
        <h3><?=$person['place']?>. <?=$person['name']?></h3>
        <!--<img src="<?= base_url()?>/image/profile.png">-->
        <h3><?=$person['point']?></h3>
    </li><?php $loopcounter++;?>
            <?php if ($loopcounter == 7) break;?>
        <?php endforeach; ?>
        <?=$user_placeholder?>
</ul>