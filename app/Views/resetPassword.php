<h1 class="text-center">Reset Password</h1>
<?php  $uri = service('uri'); ?>

<form class="form" action='<?= base_url()?>/resetPassword/<?=session()->get('id')?>' method="post">
    <?= csrf_field() ?>
    <div class="form-group mb-1">
    <label for="newPassword">New password</label>
    <input type="password" id="newPassword" class="form-control" placeholder="New password" name="newPassword" required autofocus>
    </div>

    <div class="form-group mb-1">
    <label for="password_confirm">confirm password</label>
    <input type="password" id="password_confirm" class="form-control" placeholder="Confirm password" name="password_confirm" required>
    </div>

    <?php if ( isset($validation)): ?>
        <div class="alert alert-danger" role="alert">
            <?= \Config\Services::validation()->listErrors(); ?>
        </div>
    <?php endif; ?>
    <?php if ( isset($error_message)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error_message?>
        </div>
    <?php endif; ?>
    <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Create a new password</button>
</form>
<button onclick=location.href='<?= base_url()?>/resetPassword/<?=session()->get('id')?>' class="btn btn-lg btn-primary w-100 my-4" type="submit">Cancel</button>