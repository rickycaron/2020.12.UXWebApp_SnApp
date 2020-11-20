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


    

    






















