<h1 class="text-center">snAPP Nature</h1>

<form class="form-signin" action="login" method="post">
    <?= csrf_field() ?>
    <div class="justify-content-center d-flex">
        <span style="font-size: 100px" class="material-icons">account_box</span>
    </div>
    <h1 class="h3 mb-3 font-weight-normal text-center">Please log in</h1>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="demo@test.com" required autofocus>

    <label for="password" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" value="password" required>
    <a class="text-info text-right w-100" href="forgotPassword">Forgot password?</a>
    <div role="alert" style="color: red; font-size: 14px; padding: 5px;text-space: 1px;">
        <?= \Config\Services::validation()->listErrors(); ?>
    </div>
    <button onclick=location.href='hub' class="btn btn-lg btn-primary btn-block mt-5" type="submit">Log in</button>
</form>

<hr class="mt-2 mb-3 my-3"/>
<a class="btn btn-lg btn-primary btn-block" href="register">Register</a>

