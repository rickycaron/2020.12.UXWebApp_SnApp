<input type="hidden" id="hidden_variable_filter" value="<?=$leaderboard_filter?>"/>
<div id="leaderboard_overall_container" class="jumbotron" style ="background:transparent !important">
    <h1 class="page_title d-flex justify-content-center"><?=$leaderboard_filter?> leaderboard</h1>
    <div id="radio_buttons_container" class=" d-flex justify-content-center">
            <button class="btn btn-lg btn-primary btn-block mr-3 ml-3 my-3" name="size" id="weekly" value="weeklyPoints" type="radio">Daily</button>
            <button class="btn btn-lg btn-primary btn-block mr-3 ml-3 my-3" name="size" id="monthly" value="monthlyPoints" type="radio">Monthly</button>
            <button class="btn btn-lg btn-primary btn-block mr-3 ml-3 my-3" name="size" id="overall" value="points" type="radio">Yearly</button>
    </div>
    <div id="leaderboard_container">
        <?=$leaderboard_content?>
    </div>
</div>



