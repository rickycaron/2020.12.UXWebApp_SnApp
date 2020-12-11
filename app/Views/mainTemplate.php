<!DOCTYPE html>
<html lang="en">

<head>
    <title>SNAPP nature</title>
    <meta charset="UTF-8" />
    <meta name="keywords" content="Animals Plants Nature Social media" />
    <meta name="description" content="This website is a social madia like page where you can share your observations from nature with your friends and the world" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url()?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url()?>/css/main.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .active {
            color: black;

        }
        .inactive {
            color: #25AC71;
        }
        .test{
            background-image: url("https://mdbootstrap.com/img/Photos/Others/img%20%2848%29.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
        #wrap {
            width: 100%;
            position: relative;
        }

        .inner {
            position: relative;
            z-index: 2;
        }

        #wrap:after {
            content: "\EA35";
            font-family: "Material Icons";
            font-style: normal;
            font-weight: normal;
            text-decoration: inherit;
            position: fixed;
            font-size: 500px;
            color: #E5F4F1;
            top: 50%;
            left: 50%;
            margin: -300px 0 0 -200px;
            z-index: 1;
        }

    </style>

    <?php if (isset($scripts_to_load)) foreach ($scripts_to_load as $script): ?>
        <script src="<?= base_url()?>/js/<?=$script?>?v=7" defer></script>
    <?php endforeach; ?>
</head>

<body class="d-flex flex-column font-dark bg-primary">
<header class="navbar fixed-top py-0" style=" max-height: 60px ;background-color: #006650; color: #FAFEFD">
    <span  class="material-icons my-auto" style="font-size:45px" id="header_icon_1"><?=$header_icon_1?></span>
    <h3><?=$title?></h3>
    <a href="<?= base_url()?>/search"><span class="material-icons my-auto" style="font-size:45px; color: #FAFEFD" id="header_icon_2"><?=$header_icon_2?></span></a>
</header>
<main id="wrap" class="mt-5" style="min-height:100vh;background-color: #FAFEFD; padding-bottom:63.5px; border-radius: 25px 25px 0px 0px">
    <div class="container-fluid py-1 inner d-flex flex-column align-items-center" style="height:100%">
        <?=$content?>
    </div>
</main>
<footer>
    <nav class="navbar fixed-bottom" style=";background-color: #006650">
        <?php foreach ($menu_items as $menu): ?>
            <a href="<?= base_url()?>/<?=$menu['link']?>" class="<?=$menu['className']?> d-flex align-items-center"><span class="material-icons" style="font-size:45px; color: #FAFEFD"><?=$menu['iconName']?></span></a>
        <?php endforeach; ?>
    </nav>
</footer>
</body>
<input type="hidden" id="hidden_base_url" value="<?=$base_url?>"/>
</html>
