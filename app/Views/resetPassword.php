<h1 class="text-center">Reset Password</h1>

<form class="form" action='resetPassword' method="post">
    <?= csrf_field() ?>
    <label for="password" class="sr-only ">New password</label>
    <input type="password" id="newPassword" class="form-control" placeholder="New password" name="newpassword" required autofocus>

    <label for="confirmpassword" class="sr-only">confirm password</label>
    <input type="password" id="confirmpassword" class="form-control" placeholder="Confirm password" name="confirmpassword" required>

    <div role="alert" style="color: red; font-size: 14px; padding: 5px;text-space: 1px;">
        <?= \Config\Services::validation()->listErrors(); ?>
        <?=$error_message?>
    </div>
    <button class="btn btn-lg btn-primary btn-block my-3" type="submit">Create a new password</button>
</form>