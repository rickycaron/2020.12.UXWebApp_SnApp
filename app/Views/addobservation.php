<div class="py-4 container-fluid w-100" style="max-width:600px; font-size: 1.5rem">

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
        <h2>Processing...</h2>
    </div>

    <form action="addObservation" method="post" enctype="multipart/form-data">

        <input id="inputFile" type="file"  onchange="readURL(this)" hidden>

        <div class="form-group">
            <label>Species:</label>
            <input type="text" class="form-control" id="speciesNamePlaceholder" required>
        </div>

        <div class="form-group">
            <label>Scientific name:</label>
            <input type="text" class="form-control" id="scientificNamePlaceholder" required>
        </div>

        <div class="form-group">
            <label>Description:</label>
            <textarea type="text" class="form-control" id="DescriptionPlaceholder" required></textarea>
        </div>

        <div class="form-group">
            <label>Date:</label>
            <input type="date" class="form-control" id="datePlaceholder" name="date" required>
        </div>

        <div class="form-group">
            <label>Time:</label>
            <input type="time" class="form-control" id="timePlaceholder" name="time" min="06:00" max="23:00" required>
        </div>

        <div class="form-group">
            <label>Location:</label>
            <input type="Address" class="form-control" id="LocationPlaceholder" required>
        </div>

        <div class="checkboxInput">
            <input type="checkbox" id="useLocationCheckbox" name="useLocation">
            <span></span>
            <label for="useLocation"><h5> Use current location for this observation </h5></label>
        </div>

        <input class="btn btn-primary w-100 my-2" style="font-size:25px" type="submit" value="Submit">
        <input class="btn btn-primary w-100 my-2" style="font-size:25px" type="submit" value="Cancel">
    </form>
</div>

<!--
<div class="addObservationContainer">
    <div class="wrapper">
        <div class="previewImage" id="previewImageDiv">
            <img src="" id="uploadImageTag"/>
        </div>
        <div class="content">
            <div class="material-icons icon" id="backupIcon">backup</div>
            <div class="text" id="noFileText">No picture made, yet!</div>
        </div>
    </div>

    <button class="custom-btn" id="takePictureButton">Take picture</button>
    <div id="processingText">
        <h2>Processing...</h2>
    </div>

    <form action="addObservation" method="post" enctype="multipart/form-data">
        <input id="inputFile" type="file" name="picture"  onchange="readURL(this)" hidden>

        <div class="txt_field">
            <input type="text" id="speciesNamePlaceholder" name="specieName" required>
            <span></span>
            <label>Species</label>
        </div>

        <div class="txt_field">
            <input type="text" id="scientificNamePlaceholder" name="scientificName" required>
            <span></span>
            <label>Scientific name</label>
        </div>

        <div class="descriptionField">
            <h3>Description</h3>
            <textarea id="textAreaDescription" name="specieDescription"></textarea>
        </div>

        <div class="txt_field">
            <input type="date" id="datePlaceholder" name="date" required>
            <span></span>
            <label></label>
        </div>

        <div class="txt_field">
            <input type="time" id="timePlaceholder" name="time" min="06:00" max="23:00" required>
            <span></span>
            <label></label>
        </div>

        <div class="txt_field">
            <input type="text" id="LocationPlaceholder" name="location">
            <span></span>
            <label>Location</label>
        </div>

        <div class="checkboxInput">
            <input type="checkbox" id="useLocationCheckbox" name="useLocation">
            <span></span>
            <label for="useLocation"> use current location for this observation</label>
        </div>

        <input type="submit" class="" value="Submit">

    </form>

    <button class="custom-btn" id="cancelObservationButton">Cancel</button>
</div>
-->
