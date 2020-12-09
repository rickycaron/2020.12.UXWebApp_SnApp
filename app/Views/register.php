<h1 class="text-center mb-5">Register</h1>

<form action="register" method="post"  autocomplete="on">
    <?= csrf_field() ?>
    <div class="form-group mb-1">
        <label for="username">Username</label>
        <input type="txt" class="form-control" name="username" value="<?= set_value('username')?>">
    </div>

    <div class="form-group mb-1">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email')?>" />
    </div>

    <div class="form-group mb-1">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group mb-5">
        <label for="password_confirm">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirm">
    </div>

    <?php if ( isset($validation)): ?>
        <div class="alert alert-danger" role="alert">
            <?= \Config\Services::validation()->listErrors(); ?>
        </div>
    <?php endif; ?>

    <div>
        <input type="submit" name="submit" class="btn btn-lg btn-primary w-100" value="Create your account" />
    </div>
    <a class="text-info" href="login">Alreay have an account?</a>
</form>

