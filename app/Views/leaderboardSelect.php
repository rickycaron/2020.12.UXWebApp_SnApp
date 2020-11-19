<?php
$uri = service('uri');
?>
<?php if(session()->get('isLoggedIn')): ?>
<?php else: ?>
<?php endif; ?>
<a  <?= ($uri->getSegment(1) == 'leaderboardSelect'?'active' : null)?> href="/"></a>
<div class="addObservationContainer">
<div id="leaderboard_select_container">
    <h1 class="page_title">Leaderboard</h1>
    <div class="filter_container">
        <h2>Groups</h2>
        <hr class="big_ruler">
        <div class="leaderboard_select_element">
            <h3 class="h3_leaderboard_filter">My family</h3>
            <a href="leaderboard"><span class="material-icons">navigate_next</span></a>
        </div>
        <hr class="small_ruler">
        <div class="leaderboard_select_element">
            <h3 class="h3_leaderboard_filter">school friends</h3>
            <a href="leaderboard"><span class="material-icons">navigate_next</span></a>
        </div>
        <hr class="small_ruler">
        <div class="leaderboard_select_element">
            <h3 class="h3_leaderboard_filter">football</h3>
            <a href="leaderboard"><span class="material-icons">navigate_next</span></a>
        </div>
        <hr class="small_ruler">
    </div>

    <div class="filter_container">
        <h2>Other filters</h2>
        <hr class="big_ruler">
        <div class="leaderboard_select_element">
            <h3 class="h3_leaderboard_filter">friends</h3>
            <a href="leaderboard"><span class="material-icons">navigate_next</span></a>
        </div>
        <hr class="small_ruler">
        <div class="leaderboard_select_element">
            <h3 class="h3_leaderboard_filter">Belgium</h3>
            <a href="leaderboard"><span class="material-icons">navigate_next</span></a>
        </div>
        <hr class="small_ruler">
        <div class="leaderboard_select_element">
            <h3 class="h3_leaderboard_filter">worldwide</h3>
            <a href="leaderboard"><span class="material-icons">navigate_next</span></a>
        </div>
        <hr class="small_ruler">
    </div>
</div>
</div>

