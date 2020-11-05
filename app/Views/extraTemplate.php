<!DOCTYPE html>
<html>
<head>
    <title>VERANDER DEZE TITEL</title>
    <meta charset="UTF-8" />
    <meta name="keywords" content="Animals Plants Nature Social media" />
    <meta name="description" content="This website is a social madia like page where you can share your observations from nature with your friends and the world" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url()?>/public/css/main.css?version=4" rel="stylesheet" type="text/css"/>
    <!-- <link href="<?= base_url()?>/public/css/media_query.css" rel="stylesheet"> -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<div id="page-container">
            <header>
                <span class="material-icons" id="header_icon_1"><?= $header_icon_1?></span>
                <h1 id="title">snAPP Nature</h1>
                <span class="material-icons" id="header_icon_1"><?= $header_icon_1?></span>
            </header>
            <main id="content-wrap">
                <?=$content?>
            </main>
    <footer>
        <h2 id="author">Designed and created by groupt students</h2>
    </footer>
</div>
</body>
</html>
