<h1 class="text-center">Forgot Password</h1>

<form class="form" action="forgotPassword" method="post">
    <?= csrf_field() ?>
    <label for="email" class="sr-only ">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>

    <label for="username" class="sr-only">Username</label>
    <input type="text" id="userName" class="form-control" placeholder="Username" name="username" required>

    <div role="alert" style="color: red; font-size: 14px; padding: 5px;text-space: 1px;">
        <?= \Config\Services::validation()->listErrors(); ?>
        <?=$error_message?>
    </div>
    <button class="btn btn-lg btn-primary btn-block my-3" type="submit">Create a new password</button>
</form>