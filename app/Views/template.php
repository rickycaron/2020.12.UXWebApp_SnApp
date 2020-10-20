<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>"Joppe's first webpage"</title>

    <meta name="description" content="this website does nothing but is just to practice html and css">
    <meta name="author" content="Joppe Leers">

    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link href="<?= base_url()?>/public/css/style.css?version=4" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url()?>/public/css/media_query.css" rel="stylesheet">
</head>
<body>
<header>
    <div id="logo">
        <img src="<?= base_url()?>/public/image/logoImage.png" alt="bird image">
        <h1>Joppe's first webpage</h1>
    </div>
    <nav>
        <ul>

            <?php foreach ($menu_items as $menu): ?>
                <li><a href="<?=$menu['link']?>" title="<?=$menu['title']?>" class="<?=$menu['className']?>" ><?=$menu['name']?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
<main>
    <div id="main_top">
        <img src="<?= base_url()?>/public/image/omslagfoto.png" alt="omslagfoto vogels">
    </div>

    <div id="main_mid">
        <div id="article_container">
            <h1><?= $content_title_1 ?></h1>
            <h2><?= $content_title_2 ?></h2>
            <div><?= $content ?></div>
        </div>

        <aside>
            <h1>Follow us on</h1>
            <ul>
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
            </ul>
        </aside>
    </div>
</main>

<footer>
    <p>Copyright &copy; 2020 UXWD. KUL&nbsp;All Rights Reserved.&nbsp;&nbsp;
        <a href="https://www.unizo.be/model-contract/model-privacy-policy-conform-gdpr">Privacy Policy</a> | <a href="https://en.wikipedia.org/wiki/Terms_of_service#:~:text=Terms%20of%20service%20(also%20known,to%20use%20the%20offered%20service.">Terms of Use</a>
    </p>
</footer>
</body>
</html>