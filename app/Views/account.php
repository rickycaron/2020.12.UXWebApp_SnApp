<div style="max-width:330px; height:100vh" class="my-5">
<h1 class="text-center mt-5">Change Password</h1>
    <?php if (session()->get('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
        </div>
    <?php endif; ?>
<form method="post" class="mt-5" action="<?= base_url()?>/account/<?=session()->get('id')?>">
    <div class="form-group mb-1">
        <label for="oldPassword">Old Password</label>
        <input type="password" id="oldPassword" class="form-control" name="oldPassword"  >
    </div>

    <div class="form-group mb-1">
        <label for="newPassword">New Password</label>
        <input type="password" id="newPassword" class="form-control" name="newPassword" >
    </div>

    <div class="form-group mb-1">
        <label for="password_confirm">Confim New Password</label>
        <input type="password" id="password_confirm" class="form-control" name="password_confirm" >
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
    <div>
        <input type="submit" name="submit" class="btn btn-lg btn-primary w-100 my-3" value="Change Password" />

    </div>
</form>
    <button onclick=location.href='<?= base_url()?>/profile' class="btn btn-lg btn-primary w-100 my-3" type="submit">Cancel</button>
</div>
