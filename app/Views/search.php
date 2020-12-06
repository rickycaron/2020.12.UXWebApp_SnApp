<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<div class="input-group my-3">
    <div    class="input-group-prepend">
        <button class="btn btn-primary  btn-block material-icons ">search</button>
    </div>
    <input type="text" id="search" name="search" class="form-control" placeholder="Search..">
</div>

<nav class="navbar navbar-expand-sm bg-third">
    <h2 class="navbar-brand" >Search on:</h2>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="material-icons" style="color: #176d48">reorder</span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" id="All" >All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Observations" >Observations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Groups">Groups</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Users">Users</a>
            </li>
        </ul>
    </div>
</nav>
<div id="search_result_container">
    <div id="placeholder_search_message"><?=$placeholder?></div>
    <div id="observations_container"></div>
    <div id="groups_container"></div>
    <div id="users_container"></div
</div>

