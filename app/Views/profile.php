<a href="logout" class="btn btn-lg btn-primary btn-block my-3" style="width:100%;max-width:600px">Logout</a>
<div class="d-flex flex-row m-3" style="width:100%;max-width:600px">

    <div class="">
        <img src="https://pic4.zhimg.com/ee44507a59989947c85d60e0b400f0c5_xl.jpg" class="rounded-circle" alt="templatemo easy profile" style="width: 100px;">
    </div>

    <div class="mx-4">
        <h3 class="user_name">Hello : <?= session()->get('username')?></h3>
        <h4 class="personal_description">A guy who really likes photography.</h4>
        <div class = "trophyContainer">
            <span class="material-icons trophy">emoji_events</span>
            <span class="material-icons trophy">emoji_events</span>
            <span class="material-icons trophy">emoji_events</span>
            <span class="material-icons trophy">emoji_events</span>
        </div>
    </div>

</div>


<div class="d-flex flex-row my-3">
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > observations</span>
        <span class = "h6" > <?=$observationCount[0]->observationCount?></span>
    </div>
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > likes</span>
        <span class = "h6" > <?=$likeCount[0]->likeCount?></span>
    </div>
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > comments</span>
        <span class = "h6" > <?=$commentCount[0]->commentCount?></span>
    </div>
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > friends</span>
        <span class = "h6" > 99</span>
    </div>
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > points</span>
        <span class = "h6" > 101</span>
    </div>
</div>


<div class="card my-2 shadow-sm" style="width:100%;max-width:600px">

    <div style="position: relative;">
        <img class="card-img" style="" src="https://www.hunebednieuwscafe.nl/wp-content/uploads/2016/06/acorns-1579616_1280.jpg">
        <div class="card-img" style="box-shadow: inset 0px -50px 40px -20px black;position: absolute; width: 100%; height: 100%;top: 0; left: 0;"></div>
        <h4 class="text-white" style="position: absolute; bottom: 0px; right: 12px;"> <?= session()->get('username')?> </h4>
    </div>

    <div class="card-body pt-2 pb-0">
        <div class=" d-flex flex-row py-1">
            <div class="mr-auto">
                <h3 class="mb-0">Common Name</h3>
                <h5 style="color:#6c757d;">Location</h5>
            </div>
            <span class="material-icons my-auto" style="font-size: 40px">expand_more</span>
        </div>
    </div>
</div>

<div class="card my-2 shadow-sm" style="width:100%;max-width:600px">

    <div style="position: relative;">
        <img class="card-img" style="" src="https://cdn.britannica.com/84/73184-004-E5A450B5/Sunflower-field-Fargo-North-Dakota.jpg">
        <div class="card-img" style="box-shadow: inset 0px -50px 40px -20px black;position: absolute; width: 100%; height: 100%;top: 0; left: 0;"></div>
        <h4 class="text-white" style="position: absolute; bottom: 0px; right: 12px;"> <?= session()->get('username')?> </h4>
    </div>

    <div class="card-body pt-2 pb-0">
        <div class=" d-flex flex-row py-1">
            <div class="mr-auto">
                <h3 class="mb-0">Common Name</h3>
                <h5 style="color:#6c757d;">Location</h5>
            </div>
            <span class="material-icons my-auto" style="font-size: 40px">expand_more</span>
        </div>
    </div>
</div>

<div class="card my-2 shadow-sm" style="width:100%;max-width:600px">

    <div style="position: relative;">
        <img class="card-img" style="" src="https://dkt6rvnu67rqj.cloudfront.net/cdn/ff/T8cy0-640W8sartvA9TWmv08NbGPFxsVvf8gFtBDE08/1577112797/public/styles/600x400/public/media/int_files/elephant_in_tanzania.jpg?h=f507d761&itok=Ei8OXcGi">
        <div class="card-img" style="box-shadow: inset 0px -50px 40px -20px black;position: absolute; width: 100%; height: 100%;top: 0; left: 0;"></div>
        <h4 class="text-white" style="position: absolute; bottom: 0px; right: 12px;"> <?= session()->get('username')?> </h4>
    </div>

    <div class="card-body pt-2 pb-0">
        <div class=" d-flex flex-row py-1">
            <div class="mr-auto">
                <h3 class="mb-0">Common Name</h3>
                <h5 style="color:#6c757d;">Location</h5>
            </div>
            <span class="material-icons my-auto" style="font-size: 40px">expand_more</span>
        </div>
    </div>
</div>

<!--
<a href="logout"  style="text-align: center;" >Logout</a>
<div class="profileUserContainer">
    <div class="col-sm-4 col-lg-4 col-md-4">
        <img src="https://pic4.zhimg.com/ee44507a59989947c85d60e0b400f0c5_xl.jpg" class="img-circle" alt="templatemo easy profile" style="width: 100px;">

    </div>

    <div class="col-sm-8 col-lg-8 col-md-8">
        <h1 class="user_name">Hello : <?= session()->get('username')?></h1>
        <h1 class="personal_description">A guy who really likes photography. XXXXXXXXXXXXXXXXXXXXXXXXX XXXXXX</h1>
        <div class = "trophyContainer">
            <span class="material-icons trophy">emoji_events</span>
            <span class="material-icons trophy">emoji_events</span>
            <span class="material-icons trophy">emoji_events</span>
            <span class="material-icons trophy">emoji_events</span>
        </div>
    </div>
</div>


<div id = "profile_data">

    <div id = "profile_information">

        <span class = "profileInformation col-sm-3 col-md-3 col-lg-3" > observations</span>
        <span class = "profileInformation col-sm-2 col-md-2 col-lg-2" > likes</span>
        <span class = "profileInformation col-sm-3 col-md-3 col-lg-3" > comments</span>
        <span class = "profileInformation col-sm-2 col-md-2 col-lg-2" > friends</span>
        <span class = "profileInformation col-sm-2 col-md-2 col-lg-2" > points</span>

    </div>

    <div id = "profile_number">

        <span class = "profileData col-sm-3 col-md-3 col-lg-3" > 103</span>
        <span class = "profileData col-sm-2 col-md-2 col-lg-2" > 222</span>
        <span class = "profileData col-sm-3 col-md-3 col-lg-3" > 78</span>
        <span class = "profileData col-sm-2 col-md-2 col-lg-2" > 99</span>
        <span class = "profileData col-sm-2 col-md-2 col-lg-2" > 101</span>

    </div>




</div>




<div id="observationCardContainer_p" class="col-sm-12 col-md-11 col-lg-11">
    <div id="observationCard_p">
        <div id="observationCardProfile_profile">
            <img id="ProfilePicture" src="https://pic3.zhimg.com/v2-cbac9e5b1db66e9a1c0e7c45703a1aa3_xl.jpg" style="width: 35px;border-radius: 35px">

            <h3 id="profileName"> Beiyang Li </h3>
        </div>

        <div id="observationCardPicture_p">
            <img id="observationPicture" src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png">
        </div>

        <div id="observationCardPictureFooter_p">
            <div id="observationCardPictureFooterLocation">
                <span class="material-icons">location_on</span>
                <h4>
                    Leuven
                </h4>
            </div>
            <div id="observationCardPictureFooterButtons">
                <span class="material-icons">favorite_border</span>
                <span class="material-icons">chat</span>
            </div>
        </div>

        <div id="observationCardComments_p">
            <ul>
                <li id="observationCardCommentsComment">
                    joppeleers: Wow what a nice flower!
                </li>
                <li id="observationCardCommentsComment">
                    robbeabts: awesome!
                </li>
            </ul>
        </div>

        <div id="observationCardTime_p">
            <h4>5 hours ago</h4>
        </div>
    </div>
</div>


<div id="observationCardContainer_p" class="col-sm-12 col-md-11 col-lg-11">
    <div id="observationCard_p">
        <div id="observationCardProfile_profile">
            <img id="ProfilePicture" src="https://pic3.zhimg.com/v2-cbac9e5b1db66e9a1c0e7c45703a1aa3_xl.jpg" style="width: 35px;border-radius: 35px">

            <h3 id="profileName"> Beiyang Li </h3>
        </div>

        <div id="observationCardPicture_p">
            <img id="observationPicture" src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png">
        </div>

        <div id="observationCardPictureFooter_p">
            <div id="observationCardPictureFooterLocation">
                <span class="material-icons">location_on</span>
                <h4>
                    Leuven
                </h4>
            </div>
            <div id="observationCardPictureFooterButtons">
                <span class="material-icons">favorite_border</span>
                <span class="material-icons">chat</span>
            </div>
        </div>

        <div id="observationCardComments_p">
            <ul>
                <li id="observationCardCommentsComment">
                    joppeleers: Wow what a nice flower!
                </li>
                <li id="observationCardCommentsComment">
                    robbeabts: awesome!
                </li>
            </ul>
        </div>

        <div id="observationCardTime_p">
            <h4>5 hours ago</h4>
        </div>
    </div>
</div><div id="observationCardContainer_p" class="col-sm-12 col-md-11 col-lg-11">
    <div id="observationCard_p">
        <div id="observationCardProfile_profile">
            <img id="ProfilePicture" src="https://pic3.zhimg.com/v2-cbac9e5b1db66e9a1c0e7c45703a1aa3_xl.jpg" style="width: 35px;border-radius: 35px">

            <h3 id="profileName"> Beiyang Li </h3>
        </div>

        <div id="observationCardPicture_p">
            <img id="observationPicture" src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-image-512.png">
        </div>

        <div id="observationCardPictureFooter_p">
            <div id="observationCardPictureFooterLocation">
                <span class="material-icons">location_on</span>
                <h4>
                    Leuven
                </h4>
            </div>
            <div id="observationCardPictureFooterButtons">
                <span class="material-icons">favorite_border</span>
                <span class="material-icons">chat</span>
            </div>
        </div>

        <div id="observationCardComments_p">
            <ul>
                <li id="observationCardCommentsComment">
                    joppeleers: Wow what a nice flower!
                </li>
                <li id="observationCardCommentsComment">
                    robbeabts: awesome!
                </li>
            </ul>
        </div>

        <div id="observationCardTime_p">
            <h4>5 hours ago</h4>
        </div>
    </div>
</div>
-->
