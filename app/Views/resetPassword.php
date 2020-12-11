<h1 class="text-center">Reset Password</h1>
<?php  $uri = service('uri'); ?>

<form class="form" action='/html/resetPassword/<?=session()->get('id')?>' method="post">
    <?= csrf_field() ?>
    <label for="newPassword" class="sr-only ">New password</label>
    <input type="password" id="newPassword" class="form-control" placeholder="New password" name="newPassword" required autofocus>

    <label for="password_confirm" class="sr-only">confirm password</label>
    <input type="password" id="password_confirm" class="form-control" placeholder="Confirm password" name="password_confirm" required>

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

    <button class="btn btn-lg btn-primary btn-block my-3" type="submit">Create a new password</button>
</form>