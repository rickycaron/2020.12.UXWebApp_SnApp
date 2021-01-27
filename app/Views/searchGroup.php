<h3>Groups:</h3>
<?php foreach ($group as $g): ?>
    <div  class="card my-2 shadow-sm d-flex flex-row" style="width:100%;max-width:600px">
        <div class="ml-3 mr-auto mb-2 mt-3">
            <h2><?= $g->name?></h2>
            <p><?=$g->description?></p>
            <a> members</a>
        </div>
        <span  class="material-icons my-auto mx-3" style="font-size: 40px">keyboard_arrow_right</span>
    </div>
<?php endforeach?>

