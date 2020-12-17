<?php if (count($requests)): ?>
<h4><?php echo lang('app.Friend_request') ?></h4>
<?php endif;?>
<?php foreach ($requests as $r): ?>
<a class="w-100 active" style="color: black;" href="<?=$base_url?>/otheruserprofile/<?= $r->userID?>">
    <div class="card my-2 shadow-sm d-flex flex-row" style="width:100%;max-width:600px">
        <div class="ml-3 mr-auto my-2">
            <h4><?= $r->username?></h4>
        </div>
        <div class="d-flex flex-row" value="<?= $r->mappingID?>">
            <a class="accept_friend material-icons my-auto mx-3" style="font-size: 40px" >check</a>
            <a class="decline_friend material-icons my-auto mx-3" style="font-size: 40px">clear</a>
        </div>
    </div>
</a>
<?php endforeach?>
<?php if (count($requests)): ?>
<h4><?php echo lang('app.Friend_List') ?></h4>
<?php endif;?>

<?php foreach ($friends as $f): ?>
<a class="w-100 active" style="color: black;" href="<?=$base_url?>/otheruserprofile/<?= $f->id?>">
    <div class="card my-2 shadow-sm d-flex flex-row" style="width:100%;max-width:600px">
        <div class="d-flex flex-row">
            <?php if(isset($f->p_imagedata)&&isset($f->p_imagetype)): ?>
                <img class="personCardPhoto card-header ml-1 my-1 p-1 rounded-circle" width = "70" height="70" alt="Bootstrap Image Preview" src="<?=$f->encoded_image; ?>">
            <?php else:?>
                <img class="personCardPhoto card-header ml-1 my-1 p-1 rounded-circle" width = "70" height="70" alt="Bootstrap Image Preview" src="https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png">
            <?php endif?>
            <h4 class="my-auto m-3"><?= $f->username?></h4>
        </div>
        <a class="delete_friend material-icons my-auto mx-3" value="<?= $f->mappingID?>" style="font-size: 40px;">clear</a>
    </div>
</a>
<?php endforeach?>
<!--
<?php foreach ($friends as $f): ?>
<div class="card shadow my-2 w-100" style="max-width:400px">
    <?php if(isset($f->p_imagedata)&&isset($f->p_imagetype)): ?>
        <img class="personCardPhoto card-header d-flex flex-row mx-auto mt-4 p-1 rounded-circle" width = "250" height = "250" alt="Bootstrap Image Preview" src="<?=$f->encoded_image; ?>">
    <?php else:?>
        <img class="personCardPhoto card-header d-flex flex-row mx-auto mt-4 p-1 rounded-circle" width = "250" height = "250" alt="Bootstrap Image Preview" src="https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png">
    <?php endif?>
    <div class="card-body">
        <h4 class="card-title"><?= $f->username?></h4>
        <address class=" card-footer border p-3 mb-4">
            <strong>Email address </strong><br><?= $f->email?>
            <hr>
            <p>Weekly Points: <?= $f->weeklyPoints?></p>
            <p>Monthly Points: <?= $f->monthlyPoints?></p>
            <p>Total Points: <?= $f->points?></p>
        </address>
        <a href="<?=$base_url?>/otheruserprofile/<?= $f->id?>" class="btn btn-primary"><?php echo lang('app.See_Profile') ?></a>
        <a class="delete_friend btn btn-third float-right" value="<?= $f->mappingID?>"><?php echo lang('app.Delete') ?></a>
    </div>
</div>
<?php endforeach?>
-->
