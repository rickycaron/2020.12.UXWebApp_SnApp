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
        <?=$content?>
    </main>
    <footer>
        <nav>
            <?php foreach ($menu_items as $menu): ?>
                <a href="<?=$menu['link']?>" class="<?=$menu['className']?>"><span class="material-icons"><?=$menu['iconName']?></span></a>
            <?php endforeach; ?>
        </nav>
    </footer>
</div>
</body>
</html>