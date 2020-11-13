<div class="addObservationContainer">
    <div class="wrapper">
        <div class="previewImage">
            <img src="" id="uploadImageTag"/>
        </div>
        <div class="content">
            <div class="material-icons icon">backup</div>
            <div class="text">No file chosen, yet!</div>
        </div>
    </div>
    <input id="inputFile" type="file"  onchange="readURL(this)" hidden>
    <button class="custom-btn" id="takePictureButton">Take picture</button>
    <button class="custom-btn" id="analysePictureButton">Analyse picture</button>

    <form method="post">

        <div class="txt_field">
            <input type="text" id="speciesNamePlaceholder" required>
            <span></span>
            <label>Species</label>
        </div>

        <div class="txt_field">
            <input type="text" id="scientificNamePlaceholder" required>
            <span></span>
            <label>Scientific name</label>
        </div>

        <div class="txt_field">
            <input type="text" id="DescriptionPlaceholder" required>
            <span></span>
            <label>Description</label>
        </div>

        <div class="txt_field">
            <input type="date" id="datePlaceholder" name="date" required>
            <span></span>
            <label>Date</label>
        </div>

        <div class="txt_field">
            <input type="time" id="timePlaceholder" name="time" min="06:00" max="23:00" required>
            <span></span>
            <label for="time">Time:</label>
        </div>

        <div class="txt_field">
            <input type="number" id="speciesCountPlaceholder" required>
            <span></span>
            <label>Number of individuals</label>
        </div>

        <div class="txt_field">
            <input type="Address" id="LocationPlaceholder" required>
            <span></span>
            <label>Location</label>
        </div>

        <input type="submit" value="submit">
        <input type="submit" value="cancel">
    </form>


</div>


    

    






















