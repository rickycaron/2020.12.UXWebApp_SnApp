<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add an observation</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="keywords" content="Animals Plants Nature Social media" />
    <meta name="description" content="This website is a social madia like page where you can share your observations from nature with your friends and the world" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- stylesheet css -->
    <link href='css/main.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
</head>

    <div class="col-sm-8 title">
        <h1>Add Observation</h1>
    </div>

    <div id="addaphoto">
        <div class="container">
            <div class="wrapper">
                <div class="image">
                    <!-- <img src="beautiful lotus.jpg"> -->
                </div>
                <div class="content">
                    <div class="material-icons icon">backup</div>
                     <div class="text">No file chosen, yet!</div>
                </div>
                <div id="cancel-btn" class="material-icons">close</div>
                <div class="file-name">File name here</div>
            </div>
            <input id="default-btn" type="file" hidden>
            <button id="custom-btn">Choose a file</button>
        </div>
    </div>

    <div class="center">
        <form method="post">

            <div class="txt_field">
                <input type="text" placeholder="Species will be shown here">
                <span></span>
                <label>Species</label>
            </div>

            <div class="txt_field">
                <input type="date" id="date" name="date" required>
                <span></span>
                <label for="date">Date:</label>
            </div>

            <div class="txt_field">
                <input type="time" id="time" name="time" min="06:00" max="23:00" required>
                <span></span>
                <label for="time">Time:</label>
            </div>

            <div class="txt_field">
                <input type="number" required>
                <span></span>
                <label>Number of individuals</label>
            </div>

            <div class="txt_field">
                <input type="Address" required>
                <span></span>
                <label>Address</label>
            </div>

            <div class="txt_field">
                <input type="text" required>
                <span></span>
                <label for="description">Description</label>
            </div>

            <input type="submit" value="submit">
            <input type="submit" value="cancel">
        </form>
    </div>
    

    






















