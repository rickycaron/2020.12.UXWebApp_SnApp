<h1 class="text-center mb-5">snAPP Nature</h1>

<form class="form-signin" action="login" method="post">
    <?= csrf_field() ?>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="demo@test.com" required autofocus>

    <label for="password" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" value="password" required>
    <div class="d-flex justify-content-between">
        <a class="text-info text-left w-100 my-4" href="forgotPassword">Forgot password?</a>
        <a class="text-info text-right w-100 my-4" href="register">Register</a>
    </div>
    <div role="alert" style="color: red; font-size: 14px; padding: 5px;text-space: 1px;">
        <?= \Config\Services::validation()->listErrors(); ?>
        <?=$error_message?>
    </div>

    <button onclick=location.href='hub' class="btn btn-lg btn-primary btn-block mt-7" type="submit">Log in</button>
</form>

<hr class="mt-2 mb-3 my-3"/>
<button onclick=location.href='addObservation' class="btn btn-lg btn-primary btn-block mt-1" type="submit">Make an observation</button>






