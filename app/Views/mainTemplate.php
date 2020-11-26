<!DOCTYPE html>
<html lang="en">

<head>
    <title>UXWD Team 6</title>
    <meta charset="UTF-8" />
    <meta name="keywords" content="Animals Plants Nature Social media" />
    <meta name="description" content="This website is a social madia like page where you can share your observations from nature with your friends and the world" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--
    <link href="<?= base_url()?>/css/main.css" rel="stylesheet"/>
    <link href="<?= base_url()?>/css/reusable.css" rel="stylesheet"/>
    <link href="<?= base_url()?>/css/pages.css?v=2" rel="stylesheet"/>
    <link href="<?= base_url()?>/css/media_query.css" rel="stylesheet">
-->
    <link rel="stylesheet" href="<?= base_url()?>/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .active {
            color: black;

        }
        .inactive {
            color: #25AC71;
        }
    </style>

    <?php if (isset($scripts_to_load)) foreach ($scripts_to_load as $script): ?>
        <script src="<?= base_url()?>/js/<?=$script?>?v=4" defer></script>
    <?php endforeach; ?>
</head>

<body class="d-flex flex-column" style="min-height:100vh; font-family: 'Dosis', sans-serif;">
    <header class="navbar bg-white fixed-top py-1 border-bottom">
        <span  class="material-icons text-primary" style="font-size:45px" id="header_icon_1"><?=$header_icon_1?></span>
        <h2><?=$title?></h2>
        <a href="<?= base_url()?>/search"><span class="material-icons " style="font-size:50px" id="header_icon_2"><?=$header_icon_2?></span></a>
    </header>
    <main class="bg-secondary" style="min-height:100vh;padding-top:63.5px;padding-bottom:63.5px">
        <div class="container-fluid py-1 d-flex flex-column align-items-center" style="height:100%">
            <?=$content?>
        </div>
    </main>
    <footer>
        <nav class="navbar fixed-bottom bg-white border-top">
            <?php foreach ($menu_items as $menu): ?>
                <a href="<?= base_url()?>/<?=$menu['link']?>" class="<?=$menu['className']?>"><span class="material-icons" style="font-size:45px"><?=$menu['iconName']?></span></a>
            <?php endforeach; ?>
        </nav>
    </footer>
</body>
</html>
