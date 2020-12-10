<a href="<?=base_url()?>/addGroupMembers/<?=$groupID?>/<?=$groupName?>" class="btn btn-lg btn-primary btn-block my-3" style="width:400px">Add friends to <?=$groupName?></a>

<?php foreach ($groupmembers as $member): ?>
    <div class="card shadow my-2 col-lg-6 col-md-8 col-sm-8 col-xs-10" style="width:400px">
        <?php if(isset($member->p_imagedata)&&isset($member->p_imagetype)): ?>
            <img class="personCardPhoto card-header d-flex flex-row mx-auto mt-4 p-1 rounded-circle" width = "250" height = "250" alt="Bootstrap Image Preview" src="<?php echo data_uri($member->p_imagedata, $member->p_imagetype); ?>">
        <?php else:?>
            <img class="personCardPhoto card-header d-flex flex-row mx-auto mt-4 p-1 rounded-circle" width = "250" height = "250" alt="Bootstrap Image Preview" src="https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png">
        <?php endif?>
        <div class="card-body">
            <h4 class="card-title"><?= $member->username?></h4>
            <address class=" card-footer border p-3 mb-4">
                <strong>Email address </strong><br><?= $member->email?>
                <hr>
                <p>Weekly Points: <?= $member->weeklyPoints?></p>
                <p>Monthly Points: <?= $member->monthlyPoints?></p>
                <p>Total Points: <?= $member->points?></p>
            </address>
            <?php if(session()->get('id') == $member->id): ?>
                <a href="<?=base_url()?>/profile" class="btn btn-primary">See Own Profile</a>
            <?php endif;?>
            <?php if(session()->get('id') != $member->id): ?>
            <a href="<?=base_url()?>/otheruserprofile/<?= $member->id?>" class="btn btn-primary">See Profile</a>

<!--            --><?php //if(session()->get("id") == $groupadmin):?>
<!--                <a href="--><?//=base_url()?><!--/deletememberfromgroup" class="btn btn-third float-right">Delete</a>-->
<!--            --><?php //endif?>
            <?php endif;?>
            <a class="delete_friend btn btn-third float-right" href="<?=base_url()?>/deleteUserFromGroup/<?=$member->id?>/<?=$groupID?>/<?=$groupName?>">Delete From Group</a>
        </div>
    </div>
<?php endforeach?>

<?php
function data_uri($file, $mime)
{
    $base64   = base64_encode($file);
    return ('data:' . $mime . ';base64,' . $base64);
}
?>

