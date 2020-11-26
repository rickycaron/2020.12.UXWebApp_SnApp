<h1 class="text-center">Forgot Password</h1>

<form class="form-signin" method="post">
    <input type="email" id="inputEmail" class="form-control mt-5" placeholder="Email address" name="Email">
    <button class="btn btn-lg btn-primary btn-block my-3" type="submit">Send verification code</button>
    <hr class="mt-2 mb-3 my-3"/>
    <input type="email" id="inputEmail" class="form-control " placeholder="Enter verification code" name="Email">
    <div class="d-flex flex-row justify-content-between" >
        <button class="btn btn-lg btn-primary px-auto my-3" type="submit">Submit</button>
        <a href="<?= base_url()?>/login"><span class="btn btn-lg btn-primary btn-block  my-3 ">Cancel</span></a>
    </div>
</form>

<!--
<div class="addObservationContainer">
    <br/>
    <br/>
    <h1 style="text-align:center">Forgot password</h1>
    <br/>
    <br/>

    <form method="post">
        <div class="txt_field">
            <input type="text" name="Email">
            <span></span>
            <label>Email</label>
        </div>
    </form>
    <button id="custom-btn">Send verification code</button>
    <form method="post">
        <div class="txt_field">
            <input type="text" name="Repeat password">
            <span></span>
            <label>Repeat password</label>
        </div>
    </form>
    <div>
        <button id="custom-btn">Submit</button>
        <button id="custom-btn">Cancel</button>
    </div>
</div>

-->