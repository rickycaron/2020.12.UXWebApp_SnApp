<?php foreach ($groupmembers as $member): ?>
    <div class="card shadow my-2 col-lg-6 col-md-8 col-sm-8 col-xs-10" style="width:400px">
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
            <a href="/html/otheruserprofile/<?= $member->id?>" class="btn btn-primary">See Profile</a>
            <a href="/html/deletememberfromgroup" class="btn btn-primary">Delete</a>
        </div>
    </div>
<?php endforeach?>
<!--<div class="card shadow my-2 col-lg-6 col-md-8 col-sm-8 col-xs-10" style="width:400px">-->
<!--    <img class="personCardPhoto card-header d-flex flex-row m-0 p-1" alt="Bootstrap Image Preview" src="https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png">-->
<!--    <div class="card-body">-->
<!--        <h4 class="card-title">Joppe Leers</h4>-->
<!--        <address class=" card-footer border p-3 mb-4">-->
<!--            <strong>Twitter, Inc.</strong><br> 795 Folsom Ave, Suite 600<br> San Francisco, CA 94107<br> <abbr title="Phone">P:</abbr> (123) 456-7890 -->
<!--        </address>-->
<!---->
<!--        <a href="#" class="btn btn-primary">See Profile</a>-->
<!--    </div>-->
<!--</div>-->


