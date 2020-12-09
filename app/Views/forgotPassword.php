<h1 class="text-center">Forgot Password</h1>

<form class="form" action="forgotPassword" method="post">
    <?= csrf_field() ?>
    <label for="email" class="sr-only ">Email address</label>
    <input type="email" id="inputemail" class="form-control" placeholder="Email address" name="email" required autofocus>

    <label for="username" class="sr-only">Username</label>
    <input type="text" id="usereame" class="form-control" placeholder="Username" name="username" required>

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