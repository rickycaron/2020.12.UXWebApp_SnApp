<?php if (count($friends) == 0):?>
<div id="selectFriendToAdd">You have no more friends to add to <a href="<?=base_url()?>/group/<?=$groupName?>"><?=$groupName?></a></div>
<?php else:; ?>
<div id="selectFriendToAdd">Select friends to add to <a href="<?=base_url()?>/group/<?=$groupName?>"><?=$groupName?></a></div>
<?php endif;?>

<script type="text/javascript">
    var php_groupName = "<?php echo $groupName; ?>";
</script>

<ul class="list-group" id="list-tab" id="myList" role="tablist">
    <?php foreach ($friends as $f): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center" value="<?=$f->username?>" id="listItem" style="width:400px">
            <div id="friendName"><?=$f->username?></div>

            <?php $userName = strval($f->username);?>

            <button id="addButton" class="btn badge badge-primary badge-pill">Add</button>
        </li>
<?php endforeach?>
</ul>
