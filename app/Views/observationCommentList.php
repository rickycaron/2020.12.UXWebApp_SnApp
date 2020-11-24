<?php foreach ($comment_list as $comment): ?>
    <div class="comment_list">
        <div class="person_info">
            <img src="<?= base_url()?>/image/profile.png">
            <h3><?=$like['username']?></h3>
        </div>
        <p><?=$comment['message']?></p>
    </div>
<?php endforeach; ?>
