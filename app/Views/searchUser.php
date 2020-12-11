<h3>Users:</h3>
<?php foreach ($user as $u): ?>
    <div class="card shadow my-2 " style="width:100%;max-width:600px">
        <img class="personCardPhoto card-header d-flex flex-row m-0 p-1" alt="Bootstrap Image Preview" src="https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png">
        <div class="card-body">
            <h4 class="card-title"><?= $u->username?></h4>
            <address class=" card-footer border p-3 mb-4">
                <strong>Email address </strong><br><?= $u->email?>
                <hr>
                <p>Weekly Points: <?= $u->weeklyPoints?></p>
                <p>Monthly Points: <?= $u->monthlyPoints?></p>
                <p>Total Points: <?= $u->points?></p>
            </address>
            <a href="<?=base_url()?>/otheruserprofile/<?= $u->id?>" class="btn btn-primary">See Profile</a>
        </div>
    </div>
<?php endforeach?>
