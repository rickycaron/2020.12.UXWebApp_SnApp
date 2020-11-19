<!DOCTYPE html>
<html>
<head>
    <title>UXWD team 6</title>
    <meta charset="UTF-8" />
    <meta name="keywords" content="Animals Plants Nature Social media" />
    <meta name="description" content="This website is a social madia like page where you can share your observations from nature with your friends and the world" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= base_url()?>/css/main.css" rel="stylesheet"/>
    <link href="<?= base_url()?>/css/reusable.css" rel="stylesheet"/>
    <link href="<?= base_url()?>/css/pages.css" rel="stylesheet"/>
    <link href="<?= base_url()?>/css/media_query.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">

    <?php if (isset($scripts_to_load)) foreach ($scripts_to_load as $script): ?>
        <script src="<?= base_url()?>/js/<?=$script?>" defer></script>
    <?php endforeach; ?>

</head>
<body>
<div id="page-container">
    <header>
        <span class="material-icons" id="header_icon_1"><?=$header_icon_1?></span>
        <h1 id="title"><?=$title?></h1>
        <a href="<?= base_url()?>/search"><span class="material-icons" id="header_icon_2"><?=$header_icon_2?></span></a>
    </header>
    <main>
        <?=$content?>
    </main>
    <footer>
        <nav>
            <?php foreach ($menu_items as $menu): ?>
                <a href="<?= base_url()?>/<?=$menu['link']?>" class="<?=$menu['className']?>"><span class="material-icons"><?=$menu['iconName']?></span></a>
            <?php endforeach; ?>
        </nav>
    </footer>
</div>
</body>
</html>
