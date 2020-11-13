

<div class="addObservationContainer">

  <form  action="upload.php" method="post" enctype="multipart/form-data">
    <label  for="fileToUpload">
        <div class="profile-pic" style="background-image: url('https://pic4.zhimg.com/ee44507a59989947c85d60e0b400f0c5_xl.jpg')">
            <span class="glyphicon glyphicon-camera"></span>
            <span>Change Image</span>
        </div>
    </label>
    <input type="File" name="fileToUpload" id="fileToUpload">
  </form>
<div >

    <form method="post">
        <div class="txt_field">
            <input type="text" required>
            <span></span>
            <label>Name</label>
        </div>

        <div class="txt_field">
            <input type="text" required>
            <span></span>
            <label>Gender</label>
        </div>

        <div class="txt_field">
            <input type="text" required>
            <span></span>
            <label>Public Email</label>
        </div>

        <div class="txt_field">
            <input type="text" required>
            <span></span>
            <label>Description</label>
        </div>
        <div>
            <button id="custom-btn">Submit</button>
            <button id="custom-btn">Cancel</button>
        </div>


</div>
</div>
