<form>
    <div class="input-group my-3">
        <div class="input-group-prepend">
            <span class="btn btn-primary  btn-block material-icons ">search</span>
        </div>
        <input type="text" class="form-control" placeholder="Search..">
    </div>
    <nav class="navbar navbar-expand-sm bg-light">
        <a class="navbar-brand" href="#">Search on:</a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="material-icons" style="color: #176d48">reorder</span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Observations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Groups</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Friends</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="card my-2 shadow-sm" style="width:100%;max-width:600px">

        <a href="#">
            <div style="position: relative;">
                <img class="card-img" id="observationCardPicture" src="https://cdn.britannica.com/84/73184-004-E5A450B5/Sunflower-field-Fargo-North-Dakota.jpg">
                <div class="card-img" style="box-shadow: inset 0px -50px 40px -20px black;position: absolute; width: 100%; height: 100%;top: 0; left: 0;"></div>
                <h4 class="text-white" style="position: absolute; bottom: 0px; right: 12px;">username</h4>
                <span class="material-icons text-white" style="font-size:30px;position: absolute; bottom: 6px; left: 8px">favorite_border</span>
            </div>
        </a>

        <div class="card-body pt-2 pb-0">
            <div class=" d-flex flex-row py-1">
                <div class="mr-auto">
                    <h3 class="mb-0">specieName</h3>
                    <h5 style="color:#6c757d;">Location</h5>
                </div>
                <span class="material-icons my-auto" style="font-size: 40px">expand_less</span>
            </div>
            <hr class="mt-0 mb-2">
            <div class="py-2">
                <h5 class="font-weight-bold d-inline">Joppe Leers: </h5>
                <h5 class="d-inline">Wow what a nice flower!</h5>
            </div>
            <div class="py-2">
                <h5 class="font-weight-bold d-inline">Robbe Abts: </h5>
                <h5 class="d-inline">Awesome!</h5>
            </div>
            <div class="d-flex flex-row my-3">
                <input type="txt" class="form-control" name="comment" placeholder="Create new comment">
                <span class="material-icons my-auto ml-3 mr-2 text-primary" style="font-size:30px">send</span>
            </div>
            <div class="my-2">
                <h6>date at time</h6>
            </div>
        </div>

    </div>
    <div class="card shadow my-2" style="width:100%;max-width:600px">
        <img class="personCardPhoto card-header d-flex flex-row m-0 p-1" alt="Bootstrap Image Preview" src="https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png">
        <div class="card-body">
            <h4 class="card-title">Toon Luykx</h4>
            <address class=" card-footer  border p-3 mb-4">
                <strong>Twitter, Inc.</strong><br> 795 Folsom Ave, Suite 600<br> San Francisco, CA 94107<br> <abbr title="Phone">P:</abbr> (123) 456-7890 
            </address>

            <a href="#" class="btn btn-primary">See Profile</a>
        </div>
    </div>

</form>


