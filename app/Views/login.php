<div class="addObservationContainer">
    <div style="text-align:center">
        <br/>
        <br/>
        <h1>Welcome snAPP</h1>
        <br/>
        <br/>
        <div>
        <div id="addaphoto">
    <div class="container">
        <div class="wrapper">
            <div class="content">
                <div style="font-size: 200px" class="material-icons icon"> account_box </div>
            </div>
        </div>
        <form action="login" method="post">
            <?= csrf_field() ?>
            <div class="txt_field" >
                <input type="text" class="" style="padding: 0;" name="email" id="email" value="<?= set_value("email")?>">
                <span></span>
                <label for="email">Email address</label>
            </div>
            <div class="txt_field">
                <input type="password" class="" style="padding: 0;" name="password" id="password" value="<?= set_value("password")?>">
                <span></span>
                <label for="password">Password</label>
            </div>
            <div role="alert" style="color: red; font-size: 14px; padding: 5px;text-space: 1px;">
                <?= \Config\Services::validation()->listErrors(); ?>
            </div>
            <input type="submit" class="" value="Log in"></input>
            <a href="register">Don't have an account yet?</a>
            <br>
            <a href="forgotPassword">Forgot password?</a>
        </form>

        <br/>
        <h1 >OR !</h1>
        <div>
            <br/>
            <input type="submit" class="" value="Create obervation as a visitor"></input>
            <br/>
            <br/>
        </div>
        </div>
        </div>
    </div>
</div>
</div>
