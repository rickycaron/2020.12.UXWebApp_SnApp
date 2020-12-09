<h1 class="text-center mb-5">Change Password</h1>
<?php if (session()->get('success')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success') ?>
    </div>
<?php endif; ?>

<form class="form-signin" action="account" method="post">
    <?= csrf_field() ?>
<!--    <label for="email" class="sr-only">Email address</label>-->
<!--    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="demo@test.com" required autofocus>-->
    <label for="old_password" class="sr-only">Old Password</label>
    <input type="password" id="old_Password" class="form-control" placeholder="Old Password" name="old_password" required>

    <label for="new_password" class="sr-only">New Password</label>
    <input type="password" id="new_password" class="form-control" placeholder="New Password" name="new_password" required>

    <label for="again_new_password" class="sr-only">Old Password</label>
    <input type="password" id="again_new_password" class="form-control" placeholder="Input again" name="again_new_password" required>

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
    <button onclick=location.href='hub' class="btn btn-lg btn-primary btn-block mt-9" type="submit">Change password</button>
</form>

<hr class="mt-2 mb-3 my-3"/>
<button onclick=location.href='addObservation' class="btn btn-lg btn-primary btn-block mt-1" type="submit">New User?</button>




<div style="max-width:330px; height:100vh" class="my-5">
<h1 class="text-center">Change Password</h1>

<form method="post">
    <label for="old_password" class="sr-only">Old Password</label>
    <input type="password" id="old_Password" class="form-control" placeholder="Old Password" name="old_password" required>

    <label for="new_password" class="sr-only">New Password</label>
    <input type="password" id="new_password" class="form-control" placeholder="New Password" name="new_password" required>

    <label for="again_new_password" class="sr-only">Old Password</label>
    <input type="password" id="again_new_password" class="form-control" placeholder="Input again" name="again_new_password" required>

    <div class="form-group mb-1">
        <label for="username">Old Password</label>
        <input type="txt" class="form-control" name="old_password">
    </div>

    <div class="form-group mb-1">
        <label for="new_password">New Password</label>
        <input type="txt" class="form-control" name="new_password">
    </div>

    <div class="form-group mb-1">
        <label for="confirm_new_password">Confim New Password</label>
        <input type="txt" class="form-control" name="confirm_new_password">
    </div>

    <div>
        <input type="submit" name="submit" class="btn btn-lg btn-primary w-100 my-3" value="Log in" />
        <input type="submit" name="submit" class="btn btn-lg btn-primary w-100 my-3" value="New user?" />
    </div>

</form>
</div>



<!--
<div class="addObservationContainer">
<div class = "change_profilePicture">
  <h1 style="text-align: center">Change password</h1>
</div>
<div>
    <form method="post">
        <div class="txt_field">
            <input type="text" >
            <span></span>
            <label>Old password</label>
        </div>

        <div class="txt_field">
            <input type="text" required>
            <span></span>
            <label>New password</label>
        </div>

        <div class="txt_field">
            <input type="text "required>
            <span></span>
            <label>Confirm new password</label>
        </div>
    </form>
    <div>
        <button id="custom-btn">Log in</button>
        <button id="custom-btn">New user?</button>
    </div>
</div>
</div>
-->