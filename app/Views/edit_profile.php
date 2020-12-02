

<div class="d-flex justify-content-center mt-5">
    <img src="https://pic4.zhimg.com/ee44507a59989947c85d60e0b400f0c5_xl.jpg" class="rounded-circle" alt="templatemo easy profile" style="width: 100px;">
</div>


<div >

    <div class="wrapper card w-100 d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
        <div class="previewImage" id="previewImageDiv">
            <img class="img-fluid" id="uploadImageTag" src=""/>
        </div>
        <div class="content d-flex flex-column align-items-center">
            <div class="material-icons" id="backupIcon" style="font-size:40px;color: #25AC71;">backup</div>
            <div class="text" id="noFileText">No picture made, yet!</div>
        </div>
    </div>

    <button class="btn btn-primary w-100 my-3" id="takePictureButton"><h4>Take picture</h4></button>
    <div id="processingText">
        <h2 hidden>Processing...</h2>
    </div>

    <div class="mb-3">
        <a class="justify-content-start " href="#">Forgot password?</a>
    </div>

    <form action="edit_profile" method="post"  enctype="multipart/form-data">

        <input id="inputFile" type="file" name="picture" onchange="readURL(this)" hidden>

        <div class="form-group mb-1">
            <label for="Name">Name</label>
            <input type="txt" class="form-control" name="Name" value="<?= set_value('Name')?>">
        </div>

        <!--<div class="form-group mb-1">
            <label for="gender">Gender</label>
            <input type="txt" class="form-control" name="gender" id="gender" value="<?/*= set_value('gender')*/?>">
        </div>-->

        <div class="form-group mb-1">
            <label for="email">Public email</label>
            <input type="txt" class="form-control" name="email" value="<?= set_value('email')?>">
        </div>

        <div class="form-group mb-5">
            <label for="description">Description</label>
            <input type="txt" class="form-control" name="description" value="<?= set_value('description')?>">
        </div>
        <hr class=" mb-3 my-3"/>
        <div>
            <input type="submit" name="submit" class="btn btn-lg btn-primary w-100 my-3" value="Submit" />
            <!--<input type="submit" name="submit" class="btn btn-lg btn-primary w-100 my-3" value="Cancel" />-->
        </div>
    </form>


</div>

