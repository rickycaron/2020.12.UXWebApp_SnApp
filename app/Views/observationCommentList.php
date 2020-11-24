<?php foreach ($comment_list as $comment): ?>
    <div class="comment_list">
        <div class="person_info">
            <img class="profile_picture" src="<?= base_url()?>/image/profile.png">
            <h3><?=$comment['username']?></h3>
        </div>
        <p><?=$comment['message']?></p>
    </div>
<?php endforeach; ?>
