<input type="hidden" id="hidden_variable_filter" value="<?=$leaderboard_filter?>"/>
<div id="leaderboard_overall_container">
    <h1 class="page_title">Friends leaderboard</h1>
    <div id="radio_buttons_container">
        <div class="radio_button">
            <input type="radio" name="size" id="weekly" value="weeklyPoints">
            <label for="weekly">weekly</label>
        </div>
        <div class="radio_button">
            <input type="radio" name="size" id="monthly" value="monthlyPoints" checked="checked" >
            <label for="monthly">monthly</label>
        </div>
        <div class="radio_button">
            <input type="radio" name="size" value="points" id="overall">
            <label for="overall">overall</label>
        </div>
    </div>
    <div id="leaderboard_container">
        <?=$leaderboard_content?>
    </div>
</div>


