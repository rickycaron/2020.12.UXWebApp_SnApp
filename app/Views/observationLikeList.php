<?php foreach ($like_list as $like): ?>
    <div class="like_list">
        <img class="profile_picture" src="<?= base_url()?>/image/profile.png">
        <h3><?=$like['username']?></h3>
    </div>
<?php endforeach; ?>