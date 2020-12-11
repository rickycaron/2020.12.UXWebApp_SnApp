<div class="py-4 container-fluid w-100" style="font-size: 1.5rem">

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
<?php if(session()->get("isLoggedIn")): ?>
    <form action="addObservation" method="post" enctype="multipart/form-data">
<?php else:?>
    <form action="login" method="post" enctype="multipart/form-data">
<?php endif?>
        <input id="inputFile" type="file" name="picture" onchange="readURL(this)" hidden>

        <div class="txt_field">
            <label class="mb-0"><?php echo lang('app.Species') ?></label>
            <span></span>
            <input type="text" class="form-control" id="speciesNamePlaceholder" name="specieName" required value="<?= set_value('specieName')?>">
        </div>

        <div class="txt_field mt-3">
            <label class="mb-0"><?php echo lang('app.Scientific_name') ?></label>
            <span></span>
            <input type="text" class="form-control" id="scientificNamePlaceholder" name="scientificName" required value="<?= set_value('scientificName')?>">
        </div>

        <div class="txt_field mt-3">
            <label class="mb-0"><?php echo lang('app.Description') ?></label>
            <span></span>
            <textarea readonly type="text" class="form-control mt-0" style="min-height: 120px;" id="DescriptionPlaceholder" name="description" required value="<?= set_value('description')?>"></textarea>
        </div>

        <div class="txt_field mt-3">
            <label class="mb-0"><?php echo lang('app.Date') ?></label>
            <span></span>
            <input type="date" class="form-control" id="datePlaceholder" name="date" required value="<?= set_value('date')?>">
        </div>

        <div class="txt_field mt-3">
            <label class="mb-0"><?php echo lang('app.Time') ?></label>
            <span></span>
            <input type="time" class="form-control" id="timePlaceholder" name="time" min="06:00" max="23:00" required value="<?= set_value('time')?>">
        </div>

        <div class="txt_field mt-3">
            <label class="mb-0"><?php echo lang('app.Location') ?></label>
            <span></span>
            <input type="Address" class="form-control" id="LocationPlaceholder" name="location" value="<?= set_value('location')?>">
        </div>

        <div class="checkboxInput">
            <input type="checkbox" id="useLocationCheckbox" name="useLocation">
            <span></span>
            <label class="mb-0" for="useLocation"><h6> <?php echo lang('app.Use_current_location_for_this_observation') ?> </h6></label>
        </div>

        <div class="txt_field mt-3">
            <label class="mb-0"><?php echo lang('app.Add_personal_note') ?></label>
            <span></span>
            <input type="text" class="form-control" id="userNotePlaceholder" name="userNote" value="">
        </div>

        <button class="btn btn-primary w-100 my-2 mt-3" style="font-size:25px" type="submit">Submit</button>
    </form>
</div>
