<a href="logout" class="btn btn-lg btn-primary btn-block my-3" style="width:100%;max-width:600px">Add friend to group</a>
<?php foreach ($groupmembers as $member): ?>
    <div class="card shadow my-2 col-lg-6 col-md-8 col-sm-8 col-xs-10" style="width:100%;max-width:600px">
        <img class="personCardPhoto card-header d-flex flex-row m-0 p-1" alt="Bootstrap Image Preview" src="https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png">
        <div class="card-body">
            <h4 class="card-title"><?= $member->username?></h4>
            <address class=" card-footer border p-3 mb-4">
                <strong>Email address </strong><br><?= $member->email?>
                <hr>
                <p>Weekly Points: <?= $member->weeklyPoints?></p>
                <p>Monthly Points: <?= $member->monthlyPoints?></p>
                <p>Total Points: <?= $member->points?></p>
            </address>
            <a href="<?= base_url()?>/otheruserprofile/<?=$member->id?>" class="btn btn-primary">See Profile</a>
            <a href="<?=base_url()?>/deleteUserFromGroup/<?=$member->id?>/<?=$groupID?>/<?=$groupName?>" class="btn btn-primary">Delete</a>
        </div>
    </div>
<?php endforeach?>



