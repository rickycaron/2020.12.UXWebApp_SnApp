<div id="leaderboard_overall_container">
    <h1 class="page_title">Friends leaderboard</h1>
    <div id="radio_buttons_container">
        <div class="radio_button">
            <input type="radio" name="size" id="daily">
            <label for="daily">daily</label>
        </div>
        <div class="radio_button">
            <input type="radio" name="size" id="monthly" checked="checked">
            <label for="monthly">monthly</label>
        </div>
        <div class="radio_button">
            <input type="radio" name="size" id="yearly">
            <label for="yearly">yearly</label>
        </div>
    </div>
    <div id="leaderboard_container">
        <div id="podium_container">
            <div id="top_three">
                <div id="second" class="top_three_person">
                    <img src="<?= base_url()?>/public/image/profile.png">
                    <h2>firstname name</h2>
                    <h2>30</h2>
                </div>
                <div id="first" class="top_three_person">
                    <img src="<?= base_url()?>/public/image/profile.png">
                    <h2>firstname name</h2>
                    <h2>3305</h2>
                </div>
                <div id="third" class="top_three_person">
                    <img src="<?= base_url()?>/public/image/profile.png">
                    <h2>firstname name</h2>
                    <h2>2</h2>
                </div>
            </div>
            <img id="podium_img" src="<?= base_url()?>/public/image/podiumv2.png" alt="podium">
        </div>
        <div id="forth_and_worse">
            <div class="after_third">
                <div class="without_points">
                    <h2>4</h2>
                    <img src="<?= base_url()?>/public/image/profile.png">
                    <h3>firstname name</h3>
                </div>
                <h3>10</h3>
            </div>
            <div class="after_third">
                <div class="without_points">
                    <h2>5</h2>
                    <img src="<?= base_url()?>/public/image/profile.png">
                    <h3>firstname name</h3>
                </div>
                <h3>5</h3>
            </div>
            <div class="after_third">
                <div class="without_points">
                    <h2>6</h2>
                    <img src="<?= base_url()?>/public/image/profile.png">
                    <h3>firstname name</h3>
                </div>
                <h3>4</h3>
            </div>
        </div>
    </div>
</div>