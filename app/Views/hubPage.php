<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
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


        <div class="card my-2 shadow-sm " style="width:100%; max-width:600px;">



                <div style="position: relative; object-fit: cover" value = "<?=$ob->id?>">
                    <a href="<?= base_url()?>/anobservation/<?=$ob->id?>">

                    <img class="card-img img-fluid " style="height: 400px; object-fit: cover;" src="<?=$ob->encoded_image?>">
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

                <div class=" d-flex flex-row py-1  " >
                    <div class="mr-auto">
                        <h3 class="mb-0"><?=$ob->specieName?></h3>
                    </div>
                    <nav class="navbar navbar-expand-sm ">
                        <button class=" btn material-icons my-auto collapsed" type="button" id="test" data-toggle="collapse" data-target="#demo_<?=$ob->id?>"  style="font-size: 40px"></button>
                     </div>


                    <hr class="mt-0 mb-2">

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
                                    <h5 class="font-weight-bold d-inline font-light"> <?=$nameComment[$i]?>: </h5>
                                    <h5 class="d-inline font-light"> <?=$nameComment[$i+1]?> </h5>
                        </div>
                    <?php endfor;?>

                    </div>


                <?php endif;?>
                </nav>


                <div class="d-flex flex-row my-3">
                    <?php if( service('uri')->getSegment(1) == 'hub'):?>
                    <!--
                    <form action="hub" method="post" id = "commentSend">
                        <?php elseif( service('uri')->getSegment(1) == 'group'):?>
                        <?php $groupname=service('uri')->getSegment(2)?>

                        <form action="<?=$groupname ?>" method="post" id = "commentSend">
                            <?php endif?>
                            <input type = "hidden" name="obID" id = "obID" value = "<?=$ob->id?>">
                            <input class="form-control" name="message" id = "message" value="<?= set_value('message')?>" placeholder="Create new comment">

                            <input type="submit" name="submitCommit" value="submit" />
                        </form>
-->

                        <div class="d-flex flex-row my-3"  value = "<?=$ob->id?>">
                            <form id = "commentForm" class = "commentContent" target="iframe">
                                <input type="txt" id = "commentID" class="form-control " name="comment" placeholder="<?php echo lang('app.Create_new_comment') ?>">
                            </form>
                            <iframe id="iframe" name="iframe" style="display:none;"></iframe>
                            <div class="material-icons my-auto ml-3 mr-2 text-primary commentButton" style="font-size:30px">send</div>
                        </div>
                </div>
                <div class="my-2">
                    <h6 class="font-light"><?=$ob->date?> at <?=$ob->time?></h6>
                </div>
            </div>

            <div class="dateObject" hidden value="<?=$ob->date?>"></div>
            <div class="timeObject" hidden value="<?=$ob->time?>"></div>

        </div>

    <?php endforeach; ?>
</div>


