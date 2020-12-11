<h1 class="text-center"><?php echo lang('app.Forgot_password?') ?></h1>

<form class="form" action="forgotPassword" method="post">
    <?= csrf_field() ?>
    <label for="email" class="sr-only "><?php echo lang('app.Email_address') ?></label>
    <input type="email" id="email" class="form-control" placeholder="<?php echo lang('app.Email_address') ?>" name="email" required autofocus>

    <label for="username" class="sr-only"><?php echo lang('app.Username') ?></label>
    <input type="text" id="username" class="form-control" placeholder="<?php echo lang('app.Username') ?>" name="username" required>

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

    <button class="btn btn-lg btn-primary btn-block my-3" type="submit"><?php echo lang('app.Create_a_new_password') ?></button>
</form>