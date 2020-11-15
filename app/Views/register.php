<div id="addaphoto" style="text-align: center;">
    <br>
    <h1>Welcome to snAPP!</h1>
    <br>
    <div class="container">
        <div class="wrapper">
            <div class="content">
                <div style="font-size: 200px" class="material-icons icon"> account_box </div>
            </div>
        </div>
        <form action="register" method="post"  autocomplete="on">
            <?= csrf_field() ?>
            <div class="txt_field" >
                <input type="text" name="username" id="username" value="<?= set_value('username')?>" />
                <span></span>
                <label for="username">Username</label>
            </div>

            <div class="txt_field">
                <input type="email" name="email" id="email" value="<?= set_value('email')?>" />
                <span></span>
                <label for="email">Email</label>
            </div>

            <div class="txt_field">
                <input type="password" class="" name="password" id="password">
                <span></span>
                <label for="password">Password</label>
            </div>

            <div class="txt_field">
                <input type="password" class="" name="password_confirm" id="password_confirm">
                <span></span>
                <label for="password_confirm">Confirm Password</label>
            </div>

            <div role="alert" style="color: red; font-size: 14px; padding: 5px;text-space: 1px;">
                <?= \Config\Services::validation()->listErrors(); ?>
            </div>

            <input type="submit" name="submit" value="Create your account" /></input>
            <a href="login">Alreay have an account</a>
        </form>
    </div>
</div>






<!--<h1>Welcome snAPP</h1>-->
<!--<form action="register" method="post"  autocomplete="on">-->
<!--    --><?//= csrf_field() ?>
<!---->
<!--    <label for="username">Username</label>-->
<!--    <input type="text" name="username" id="username" value="--><?//= set_value('username')?><!--" />-->
<!--    <br />-->
<!--    <br>-->
<!---->
<!--    <label for="email">Email</label>-->
<!--    <input type="email" name="email" id="email" value="--><?//= set_value('email')?><!--" />-->
<!--    <br />-->
<!--    <br>-->
<!---->
<!--    <label for="password">Password</label>-->
<!--    <input type="password" class="" name="password" id="password">-->
<!--    <br />-->
<!--    <br>-->
<!---->
<!--    <label for="password_confirm">Confirm Password</label>-->
<!--    <input type="password" class="" name="password_confirm" id="password_confirm">-->
<!--    <br />-->
<!--    <br>-->
<!---->
<!--    <div role="alert">-->
<?#= \Config\Services::validation()-><?#listErrors(); ?>
<!--    </div>-->
<!---->
<!--    <input type="submit" name="submit" value="Create news item" /></input>-->
<!--    <a href="login">Alreay have an account</a>-->
<!--</form>-->

