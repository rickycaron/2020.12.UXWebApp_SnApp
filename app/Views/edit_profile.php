
<div class="mt-3 w-100" style="max-width:350px">

    <div class="wrapper card w-100 d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
        <div class="previewImage" id="previewImageDiv">
            <img class="img-fluid" id="uploadImageTag" src=""/>
        </div>
        <div class="content d-flex flex-column align-items-center">
            <div class="material-icons" id="backupIcon" style="font-size:40px;color: #25AC71;">backup</div>
            <div class="text" id="noFileText"><?php echo lang('app.No_picture_made,_yet!') ?></div>
        </div>
    </div>

    <button class="btn btn-primary w-100 my-3" id="takePictureButton"><h4><?php echo lang('app.Take_picture') ?></h4></button>
    <div id="processingText">
        <h2 hidden><?php echo lang('app.Processing...') ?></h2>
    </div>

    <div class="mb-3">
        <a class="justify-content-start " href="#"><?php echo lang('app.Forgot_password?') ?></a>
    </div>

    <form action="edit_profile" method="post"  enctype="multipart/form-data">

        <input id="inputFile" type="file" name="picture" onchange="readURL(this)" hidden>

        <div class="form-group mb-1">
            <label for="Name"><?php echo lang('app.Name') ?></label>
            <input type="txt" class="form-control" name="Name" value ="<?= $userInformation->username?>">
        </div>

        <!--<div class="form-group mb-1">
            <label for="gender">Gender</label>
            <input type="txt" class="form-control" name="gender" id="gender" value="<?/*= set_value('gender')*/?>">
        </div>-->

        <div class="form-group mb-1">
            <label for="email"><?php echo lang('app.Public_email') ?></label>
            <input type="txt" class="form-control" name="email" value="<?= $userInformation->email?>">
        </div>

        <div class="form-group mb-5">
            <label for="description"><?php echo lang('app.Description') ?></label>
            <input type="txt" class="form-control" name="description" value="<?= $userInformation->p_description?>">
        </div>
        <hr class=" mb-3 my-3"/>
        <div>
            <input type="submit" name="submit" class="btn btn-lg btn-primary w-100 my-3" value="<?php echo lang('app.Submit') ?>" />
            <!--<input type="submit" name="submit" class="btn btn-lg btn-primary w-100 my-3" value="Cancel" />-->
        </div>
    </form>


</div>

