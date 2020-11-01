<!DOCTYPE html>
<html>
<head>
    <title>VERANDER DEZE TITEL</title>
    <meta charset="UTF-8" />
    <meta name="keywords" content="Animals Plants Nature Social media" />
    <meta name="description" content="This website is a social madia like page where you can share your observations from nature with your friends and the world" />
    <link href="<?= base_url()?>/public/css/main.css?version=4" rel="stylesheet" type="text/css"/>
    <!-- <link href="<?= base_url()?>/public/css/media_query.css" rel="stylesheet"> -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<div>
    <header>
        <span class="material-icons" id="header_icon_1"><?=$header_icon_1?></span>
        <span class="material-icons" id="header_icon_2"><?=$header_icon_2?></span>
    </header>
    <main>

    </main>
    <footer>
        <nav>
            <a href="hub" title="Go to Hub" class="inactive"><span class="material-icons">home</span></a>
            <a href="groups" title="Go to groups" class="inactive"><span class="material-icons">people_alt</span></a>
            <a href="addObservation" title="Go to addObservation" class="active"><span class="material-icons">add_circle</span></a></li>
            <a href="leaderboardSelect" title="Go to leaderboardSelect" class="inactive"><span class="material-icons">leaderboard</span></a></li>
            <a href="profile" title="Go to profile" class="inactive"><span class="material-icons">person</span></a></li>
        </nav>
    </footer>
</div>
</body>
</html>