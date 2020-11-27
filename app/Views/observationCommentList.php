<ul class="list-group my-3">
<?php foreach ($comment_list as $comment): ?>
    <li class="list-group-item list-group-item-action justify-content-start bg-secondary">
        <!--<img class="profile_picture" src="<?= base_url()?>/image/profile.png">-->
        <div>
            <h3><?=$comment['username']?>: </h3>
            <hr class="mt-2 mb-3 my-3"/>
            <p><?=$comment['message']?></p>
        </div>
    </li>
<?php endforeach; ?>
</ul>
