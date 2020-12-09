<h1 class="text-center mb-5">snAPP Nature</h1>
<?php if (session()->get('success')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php endif; ?>
<form class="form-signin" action="login" method="post">
    <?= csrf_field() ?>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="demo@test.com" required autofocus>

    <label for="password" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

    <div class="d-flex justify-content-between">

        <a class="text-info text-left w-100 mb-3" href="forgotPassword">Forgot password?</a>
        <a class="text-info text-right w-100 mb-3" href="register">Register</a>
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
    <button onclick=location.href='hub' class="btn btn-lg btn-primary btn-block mt-9" type="submit">Log in</button>
</form>

<hr class="mt-2 mb-3 my-3"/>
<button onclick=location.href='addObservation' class="btn btn-lg btn-primary btn-block mt-1" type="submit">Make an observation</button>






