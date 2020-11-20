function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {

            document.getElementById("backupIcon").style.display = 'none';
            document.getElementById("noFileText").style.display = 'none';
            document.getElementById("previewImageDiv").style.display = 'flex';
            document.getElementById("takePictureButton").innerHTML = 'Take another picture';

            $('#uploadImageTag').attr('src', e.target.result);

            sendIdentification();
        };
        reader.readAsDataURL(input.files[0]);
    }
}
