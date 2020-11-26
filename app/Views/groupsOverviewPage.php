

<div onclick="location.href='group';" class="card my-2 shadow-sm d-flex flex-row" style="width:100%;max-width:600px">
    <div class="ml-3 mr-auto mb-2 mt-3">
        <h2> Group name css demo </h2>
        <p>Observations from the members of UXWD6 css demo</p>
    </div>
    <span class="material-icons my-auto mx-3" style="font-size: 40px">keyboard_arrow_right</span>
</div>

<?php foreach ($groups as $group): ?>
    <div onclick="location.href='group/<?=$group[0]?>';" class="card my-2 shadow-sm d-flex flex-row" style="width:100%;max-width:600px">
        <div class="ml-3 mr-auto mb-2 mt-3">
            <h2><?=$group[0]?></h2>
            <p><?=$group[1]?></p>
            <p><?=$group[2]?> members</p>
        </div>
        <span class="material-icons my-auto mx-3" style="font-size: 40px">keyboard_arrow_right</span>
    </div>
<?php endforeach; ?>



