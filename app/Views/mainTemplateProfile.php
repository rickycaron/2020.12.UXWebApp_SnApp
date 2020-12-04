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
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            right: 0;
            background-color: #E5F4F1;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #006650;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
    </style>

    <?php if (isset($scripts_to_load)) foreach ($scripts_to_load as $script): ?>
        <script src="<?= base_url()?>/js/<?=$script?>?v=6" defer></script>
    <?php endforeach; ?>
</head>

<body class="d-flex flex-column" style="min-height:100vh; font-family: 'Dosis', sans-serif; background-color: #006650">
<header class="navbar fixed-top py-0" style=" max-height: 48px ;background-color: #006650; color: #FAFEFD">
    <input type="hidden" id="hidden_userID" value="<?=$userID ?>"/>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class=" material-icons" onclick="closeNav()">navigate_next</a>
        <hr class="mt-2 mb-3 my-3"/>
        <a href="<?= base_url()?>/friendList">Friends</a>
        <hr class="mt-2 mb-3 my-3"/>
        <a href="<?= base_url()?>/account">Change password</a>
        <hr class="mt-2 mb-3 my-3"/>
        <a href="<?= base_url()?>/edit_profile">Edit profile</a>
        <hr class="mt-2 mb-3 my-3"/>
        <?php if($userID == session()->get('id')):?>
            <a href="<?= base_url()?>/logout">Logout</a>
        <?php endif?>
        <hr class="mt-2 mb-3 my-3"/>
    </div>
    <span  class="material-icons" style="font-size:45px" id="header_icon_1"><?=$header_icon_1?></span>
    <h2><?=$title?></h2>
    <a><span onclick="openNav()" class="material-icons " style="font-size:50px; color: #FAFEFD" id="header_icon_2"><?=$header_icon_2?></span></a>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</header>
<main id="wrap" class="mt-5" style="min-height:100vh;background-color: #FAFEFD; padding-bottom:63.5px; border-radius: 25px 25px 0px 0px">
    <div class="container-fluid py-1 inner d-flex flex-column align-items-center" style="height:100%">
        <?=$content?>
    </div>
</main>
<footer>
    <nav class="navbar fixed-bottom" style="border-radius: 10px 10px 0px 0px ;background-color: #006650">
        <?php foreach ($menu_items as $menu): ?>
            <a href="<?= base_url()?>/<?=$menu['link']?>" class="<?=$menu['className']?>"><span class="material-icons" style="font-size:45px; color: #FAFEFD"><?=$menu['iconName']?></span></a>
        <?php endforeach; ?>
    </nav>
</footer>
</body>
<input type="hidden" id="hidden_base_url" value="<?=$base_url?>"/>
</html>

