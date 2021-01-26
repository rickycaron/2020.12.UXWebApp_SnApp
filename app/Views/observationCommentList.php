<ul class="list-group my-3">
<?php foreach ($comment_list as $comment): ?>
    <li class="list-group-item list-group-item-action justify-content-start bg-secondary">
        <!--<img class="profile_picture" src="<?= base_url()?>/image/profile.png">-->
        <div class="row">
            <p class="font-weight-bold d-inline font-light mr-1"> <?=$comment['username']?>: </p>
            <p class="d-inline font-light "> <?=$comment['message']?> </p>

        </div>
    </li>
<?php endforeach; ?>
</ul>
