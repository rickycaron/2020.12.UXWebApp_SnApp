<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php if($userID == session()->get('id')):?>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class=" material-icons" onclick="closeNav()">navigate_next</a>
        <hr class="mt-2 mb-3 my-3"/>
        <a href="<?= base_url()?>/friendList"><?php echo lang('app.Friends') ?></a>
        <hr class="mt-2 mb-3 my-3"/>
        <a href="<?= base_url()?>/account/<?= session()->get('id')?>"><?php echo lang('app.Change_Password') ?></a>
        <hr class="mt-2 mb-3 my-3"/>
        <a href="<?= base_url()?>/edit_profile"><?php echo lang('app.Edit_profile') ?></a>
        <hr class="mt-2 mb-3 my-3"/>
        <?php if($userID == session()->get('id')):?>
            <a href="<?= base_url()?>/logout"><?php echo lang('app.Logout') ?></a>
        <?php endif?>
        <hr class="mt-2 mb-3 my-3"/>
    </div>
<?php endif?>

<input type="hidden" id="hidden_userID" value="<?=$userID ?>"/>
<div class="d-flex flex-row m-3" style="width:100%;max-width:600px">

    <div class="">
        <?php if(isset($profile_image)): ?>
            <img src="<?=$profile_image?>" class="rounded-circle" alt="templatemo easy profile" style="width: 100px;">
        <?php else:?>
            <img class="personCardPhoto rounded-circle card-header" alt="templatemo easy profile" src="https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png" style="width: 100px;">
        <?php endif?>
    </div>
    <div class="mx-4 w-100 ">
        <div class="row justify-content-between">
            <h2 class="user_name"><?= $username?> </h2>
            <?php if($userID == session()->get('id')):?>
                <a><span onclick="openNav()" class="material-icons text-primary " style="font-size:50px;" id="header_icon_2">more_horiz</span></a>
            <?php endif?>
        </div>
        <div class="row">
            <h4 class="personal_description"><?=$description[0]->description?></h4>
        </div>
    </div>

</div>



<div class="d-flex flex-row my-3">
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > <?php echo lang('app.Observations') ?></span>
        <span class = "h6" > <?=$observationCount[0]->observationCount?></span>
    </div>
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > <?php echo lang('app.Likes') ?></span>
        <span class = "h6" > <?=$likeCount[0]->likeCount?></span>
    </div>
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > <?php echo lang('app.Comments') ?></span>
        <span class = "h6" > <?=$commentCount[0]->commentCount?></span>
    </div>
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > <?php echo lang('app.Friends') ?></span>
        <span class = "h6" > <?=$friendCount[0]->friendCount?></span>
    </div>
    <div class="d-flex flex-column align-items-center mx-2">
        <span class = "h6" > <?php echo lang('app.Points') ?></span>
        <span class = "h6" > <?=$pointCount[0]->pointCount?></span>
    </div>
</div>

<?php if($userID != session()->get('id')):?>
    <?php switch ($requestStatus):
        case 0: ?>
            <button class="d-flex flex-row btn btn-lg btn-third btn-block" style="width:100%;max-width:600px">
                <span class="material-icons pt-2 pr-1">person_add_alt_1</span>
                <p class="pt-2">request sended</p>
            </button>
        <?php break; ?>
        <?php case 1: ?>
            <button class="d-flex flex-row btn btn-lg btn-third btn-block" style="width:100%;max-width:600px">
                <span class="material-icons pt-2 pr-1">how_to_reg</span>
                <p class="pt-2">friend</p>
            </button>
        <?php break; ?>
        <?php case 2: ?>
            <button id="send_friend_request" class="d-flex flex-row btn btn-lg btn-primary btn-block my-3" style="width:100%;max-width:600px">
                <span class="material-icons pt-2 pr-1">person_add_alt_1</span>
                <p class="pt-2">add friend</p>
            </button>
        <?php break; ?>
        <?php case 3: ?>
            <button id="send_friend_request" class="send_friend_request d-flex flex-row btn btn-lg btn-primary btn-block my-3" style="width:100%;max-width:600px">
                <span class="material-icons pt-2 pr-1">person_add_alt_1</span>
                <p class="pt-2">add friend</p>
            </button>
            <?php break; ?>
    <?php endswitch; ?>
<?php endif?>

<div id="nothingToShow"><?=$upToDate?></div>
<div id="observationCardsContainer" class="w-100 mt-2">

    <?php foreach ($observations as $ob): ?>

        <?php $commentCount = sizeof(explode("♪", $ob->messages))?>
        <?php $comment = explode("♪", $ob->messages)?>
        <?php $name = explode(",", $ob->usernames)?>
        <?php $nameComment = array()?>
        <?php $likeUserIDs = explode(",",$ob->likeUserIDs) ?>
        <?php $likeStatus = 0?>

        <?php foreach ($likeUserIDs as $lu): ?>
            <?php
            if ($lu == session()->get('id'))
                $likeStatus = 1;
            ?>
        <?php endforeach; ?>

        <input type = "hidden" name="obID" id = "obID" value = "<?=$ob->id?>">
        <input type = "hidden" name="username" id = "username" value = "<?=$ob->username?>">
        <div value = "<?=$likeStatus?>">
            <input type = "hidden" name= "status" class = "status" value = "<?=$likeStatus?>">
        </div>


        <div class="card my-2 shadow-sm mb-3" style="width:100%; max-width:600px;">



            <div style="position: relative; object-fit: cover" value = "<?=$ob->id?>">
                <a href="<?= base_url()?>/anobservation/<?=$ob->id?>">

                    <img class="card-img img-fluid " style="height: 350px; object-fit: cover;" src="<?=$ob->encoded_image?>">
                    <div class="card-img" style="box-shadow: inset 0px -50px 40px -20px black; position: absolute; width: 100%; height: 100%; top: 0; left: 0;"></div>
                    <h4 class="text-white" style="position: absolute; bottom: 0px; right: 12px;"><?=$ob->username?></h4>
                    <div class="material-icons text-white" style="font-size:30px;position: absolute; bottom: 6px; left: 8px" >favorite</div>
                </a>

                <?php if ($likeStatus == 1): ?>
                    <div class="material-icons text-danger likeButton" style="font-size:30px;position: absolute; bottom: 6px; left: 8px">favorite</div>
                <?php endif;?>
                <?php if ($likeStatus == 0): ?>
                    <div class="material-icons text-white likeButton" style="font-size:30px;position: absolute; bottom: 6px; left: 8px">favorite</div>
                <?php endif;?>
            </div>


            <div class="card-body pt-2 pb-0 ">

                <div class=" d-flex flex-row py-1" >
                    <div class="mr-auto">
                        <h5 class="mb-0"><?=$ob->specieName?></h5>
                    </div>
                    <nav class="navbar navbar-expand-sm p-0" id="navbarid">
                        <button class="btn small material-icons my-auto collapsed mb-0 p-0" type="button" id="navbarid" data-toggle="collapse" data-target="#demo_<?=$ob->id?>"  style="font-size: 30px"></button>
                </div>




                <?php
                for ($i = 0; $i < $commentCount; $i++)
                {
                    $nameComment[] = $name[$i];
                    $nameComment[] = $comment[$i];
                }
                ?>

                <?php if ($ob->messages != null) :?>
                    <div  id="demo_<?=$ob->id?>" class="collapse" >

                        <?php for($i=0;$i<$commentCount*2;$i=$i+2):?>
                            <div class="py-2">
                                <p class="font-weight-bold d-inline font-light"> <?=$nameComment[$i]?>: </p>
                                <p class="d-inline font-light"> <?=$nameComment[$i+1]?> </p>
                            </div>
                        <?php endfor;?>

                    </div>


                <?php endif;?>
                </nav>


                <div class="d-flex flex-row mt-0 w-100">

                    <div class="d-flex flex-row w-100"  value = "<?=$ob->id?>">
                        <form id = "commentForm" class = "commentContent w-100" target="iframe">
                            <input type="txt" id = "commentID" class="form-control " name="comment" placeholder="<?php echo lang('app.Create_new_comment') ?>">
                        </form>
                        <iframe id="iframe" name="iframe" style="display:none;"></iframe>
                        <div class="material-icons my-auto ml-3 mr-2 text-primary commentButton" style="font-size:30px">send</div>
                    </div>
                </div>
                <div class="mt-2 mb-0">
                    <p class="font-light small mb-1" ;"><?=$ob->date?> at <?=$ob->time?></p>
                </div>
            </div>

            <div class="dateObject" hidden value="<?=$ob->date?>"></div>
            <div class="timeObject" hidden value="<?=$ob->time?>"></div>

        </div>

    <?php endforeach; ?>
</div>


