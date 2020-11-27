<ul class="list-group my-3">
<?php foreach ($like_list as $like): ?>
    <li class="list-group-item list-group-item-action justify-content-start bg-secondary">
        <!--<img class="profile_picture" src="<?= base_url()?>/image/profile.png">-->
        <h3><?=$like['username']?></h3>
    </li>
<?php endforeach; ?>
</ul>
