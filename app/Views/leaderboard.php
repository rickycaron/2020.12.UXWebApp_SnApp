<div id="leaderboard_overall_container">
    <h1 class="page_title">Friends leaderboard</h1>
    <div id="radio_buttons_container">
        <div class="radio_button">
            <input type="radio" name="size" id="weekly" value="weeklyPoints">
            <label for="weekly">weekly</label>
        </div>
        <div class="radio_button">
            <input type="radio" name="size" id="monthly" value="mothlyPoints" checked="checked">
            <label for="monthly">monthly</label>
        </div>
        <div class="radio_button">
            <input type="radio" name="size" value="points" id="overall">
            <label for="overall">overall</label>
        </div>
    </div>
    <div id="leaderboard_container">
        <div id="podium_container">
            <div id="top_three">
                <div id="second" class="top_three_person">
                    <img src="<?= base_url()?>/image/profile.png">
                    <h2><?=$name_second?></h2>
                    <h2><?=$points_second?></h2>
                </div>
                <div id="first" class="top_three_person">
                    <img src="<?= base_url()?>/image/profile.png">
                    <h2><?=$name_first?></h2>
                    <h2><?=$points_first?></h2>
                </div>
                <div id="third" class="top_three_person">
                    <img src="<?= base_url()?>/image/profile.png">
                    <h2><?=$name_third?></h2>
                    <h2><?=$points_third?></h2>
                </div>
            </div>
            <img id="podium_img" src="<?= base_url()?>/image/podiumv2.png" alt="podium">
        </div>
        <div id="forth_and_worse">
            <?php foreach ($persons_list as $person): ?>
                <div class="after_third">
                    <div class="without_points">
                        <h2><?=$person['place']?></h2>
                        <img src="<?= base_url()?>/image/profile.png">
                        <h3><?=$person['name']?></h3>
                    </div>
                    <h3><?=$person['point']?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
