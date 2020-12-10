<?php


namespace App\Controllers;


use App\Models\extra_functions;

class Maincontroller extends \CodeIgniter\Controller
{
    private $menu_model;
    private $database_model;
    private $data;

    use \App\Controllers\extra_functions;

    /**
     * Maincontroller constructor.
     */
    public function __construct() {
        $this->menu_model = new \Menu_model();
        $this->database_model = new \Database_model();
    }

    private function set_common_data($header_icon_1, $header_icon_2) {
        $this->data['base_url'] = base_url();
        //$this->debug_to_console(base_url());
        $this->data['header_icon_1'] = $header_icon_1;
        $this->data['header_icon_2'] = $header_icon_2;
    }

    public function leaderboardSelect() {
        $this->set_common_data('eco', 'search');

        $this->leaderboard_userID=session()->get('id');
        $groups = $this->database_model->getGroupsFromUser($this->leaderboard_userID);
        $this->data['groups']=array();
        foreach ($groups as $group)
        {
            $groupname=$group->name;
            array_push($this->data['groups'],$groupname);
        }
        $this->data['menu_items'] = $this->menu_model->get_menuitems('leaderboardSelect');
        $this->data['content'] = view('leaderboardSelect', $this->data); //replace by your own view
        $this->data['title'] = 'Leaderboard Filter';
        return view("mainTemplate", $this->data);
    }

    //TODO: when you use the friends filter you can't see your own score i think?
    //TODO: when you select a filter with a space it gives an error -> set a restriction to the group name so no spaces are accepted or deal with it.
    public function leaderboard($leaderboard_filter) {
        $this->set_common_data('arrow_back', 'search');
        $leaderboard_period = "monthlyPoints";
        $this->leaderboard_userID = session()->get('id');

        $query_result = $this->get_leaderboard_query_result($leaderboard_filter, $leaderboard_period);

        $leaderboard_content = view('fetchLeaderboardHTML', $this->set_leaderboard_data($query_result, $leaderboard_period, $leaderboard_filter));

        $pass_leaderboard_content['leaderboard_content'] = $leaderboard_content;
        $pass_leaderboard_content['leaderboard_filter'] = $leaderboard_filter;

        $this->data['content'] = view('leaderboard', $pass_leaderboard_content);
        $this->data['title'] = 'Leaderboard';
        $this->data['menu_items'] = $this->menu_model->get_menuitems('leaderboardSelect');
        $this->data['scripts_to_load'] = array('leaderboard.js', 'jquery-3.5.1.min');
        return view("mainTemplate", $this->data);
    }

    public function hub() {
        $this->set_common_data('eco', 'search');
        helper(['form']);
        $index = 1;
        //get current user
        $userID = session()->get('id');
        $thisUserID['thisUserID'] = session()->get('id');
        //get friends of current user
        $friendsArray = $this->database_model->getFriendsUserName($userID);

        //check if the url contains parameter for new observations
        $variableActive = $this->request->getVar('extra');
        if ($variableActive != null) {
            $getMoreObservations = $_GET['extra'];
            $lastDate = $_GET['lastDate'];
            $lastTime = $_GET['lastTime'];
            #$tomorrow = $_GET['tomorrow'];

            if (strcasecmp($getMoreObservations, 'true') == 0) {
                //get more observations from friends from current users
                $data3['observations'] = $this->database_model->getMoreObservationsForHub($friendsArray, $lastDate, $lastTime);
                $observations = $data3['observations'];
                if ($observations == null) {
                    $upToDateDiv = '<div id="upToDateDiv" hidden>You are up to date</div>';
                    return $upToDateDiv;
                }
                if ($observations[0] == null) {
                    $upToDateDiv = '<div id="upToDateDiv" hidden>You are up to date</div>';
                    return $upToDateDiv;
                }
                else {
                    $observationID = $observations[2]->id ;
                    $index = $index+1;
                    if($this->request->getPost('commentShow')) {
                        $observationID = $this->request->getPost('obID');
                        $comment2['comments'] = $this->database_model->getComment($observationID);
                    }
                    if ($this->request->getMethod() === 'post')
                    {
                        $message= $this->request->getPost('message');
                        $observationID = $this->request->getPost('obID');
                        $this->database_model-> insertComment($userID,$message,$observationID);
                        /*$this->data['content'] = view('hubPage'); //replace by your own view
                        return view("extraTemplate", $this->data);*/
                        return redirect()->to('hub');
                    }
                    return view('hubPage', $data3, $thisUserID);
                }
            }
        }

        //get observations from friends from current users
        $data2['observations'] = $this->database_model->getFirstObservationsForHub($friendsArray);
        $observations = $data2['observations'];
        if ($observations == null) {
            $data2['upToDate'] = "You are up to date! Check your groups or search friends to see their observations";
            $this->data['content'] = view('hubPage', $data2, $thisUserID); //replace by your own view
        }
        else {
            $data2['upToDate'] = "";

            /*if($this->request->getPost('like')) {
                $this->database_model->setUserLikeStatus($userID,$observationID);
            }
            //get observations comment from

            if($this->request->getPost('commentShow')) {
                $observationID = $this->request->getPost('obID');
                $comment1['comments'] = $this->database_model->getComment($observationID);
            }*/
            $this->data['content'] = view('hubPage', $data2, $thisUserID); //replace by your own view
        }

        //check if submit comment
        if ($this->request->getMethod() === 'post')
        {
            $message= $this->request->getPost('message');
            $observationID = $this->request->getPost('obID');
            $this->database_model-> insertComment($userID,$message,$observationID);

            /*$this->data['content'] = view('hubPage'); //replace by your own view
            return view("extraTemplate", $this->data);*/
            return redirect()->to('hub');
        }
        //comment function end

        $this->data['title'] = 'Observation Feed';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('hub');
        $this->data['scripts_to_load'] = array('jquery-3.5.1.min.js','likeFunction.js', 'showMoreObservations.js');

        return view("mainTemplate", $this->data);
    }

    public function anobservation($observationID) {
        $this->set_common_data('arrow_back', 'search');

        // retrieve all the information needed from the database and write values in placeholders
        $observation = $this->database_model->getObservation($observationID);
        $observation_data['username'] = $this->database_model->getUser($observation['userID'])->username;
        $specie_query = $this->database_model->getSpecie($observation['specieID']);
        $observation_data['specie_name'] = $specie_query->specieName;
        $observation_data['description'] = $specie_query->specieDescription;
        $observation_data['user_note'] = $observation['userNote'];
        $observation_data['date'] = $observation['date'];
        $observation_data['time'] = $observation['time'];
        $observation_data['location'] = $observation['location'];
        $observation_data['like_count'] = $observation['likes'];
        $observation_data['comment_count'] = $observation['comments'];
        $observation_data['image_data'] = $observation['imageData'];
        $observation_data['image_type'] = $observation['imageType'];
        $observation_data['likes_comments'] = "";
        $observation_data['id'] = $observation['id'];

        $this->data['content'] = view('anobservation', $observation_data);
        $this->data['title'] = 'Observation';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('none');
        $this->data['scripts_to_load'] = array('anobservation.js');
        return view("mainTemplate", $this->data);
    }

    public function groups() {
        $this->set_common_data('eco', 'search');
        //$username=session()->get('username');

        $this->leaderboard_userID=session()->get('id');
        $groups = $this->database_model->getGroupsFromUser($this->leaderboard_userID);
        $this->data['groups']=array();
        foreach ($groups as $group)
        {
            $groupname=$group->name;
            $groupdescription=$group->description;
            $groupmember=$this->database_model->getGroupMemberNumber($group->id)->count;
            $groupadmin=$group->admin;
            $grouparray=array($groupname,$groupdescription,$groupmember,$groupadmin);
            array_push($this->data['groups'],$grouparray);
        }
        $this->data['menu_items'] = $this->menu_model->get_menuitems('groups');
        $this->data['content'] = view('groupsOverviewPage', $this->data); //replace by your own view
        $this->data['title'] = 'Groups';
        return view("mainTemplate", $this->data);
    }

    public function group($groupname_filter)
    {
        $this->set_common_data('arrow_back', 'search');
        $userID = session()->get("id");
        //get the groupid by the groupname and userid
        $groupid = $this->database_model->getGroupName($groupname_filter, $userID)->groupID;
        //get an array of userid of this group
        $query_result = $this->database_model->getUsersFromGroup($groupid);
        //get an array of user name of this group
        $groupmembers = array();
        foreach ($query_result as $row) {
            array_push($groupmembers, $this->database_model->getUser($row->userID));
        }

        //below the code should be the same as the hub page
        helper(['form']);
        $index = 1;
        $variableActive = $this->request->getVar('extra');
        if ($variableActive != null) {
            $getMoreObservations = $_GET['extra'];
            $lastDate = $_GET['lastDate'];
            $lastTime = $_GET['lastTime'];
            #$tomorrow = $_GET['tomorrow'];

            if (strcasecmp($getMoreObservations, 'true') == 0) {
                //get more observations from friends from current users
                $data3['observations'] = $this->database_model->getMoreObservationsForHub($groupmembers, $lastDate, $lastTime);
                $observations = $data3['observations'];
                if ($observations == null) {
                    $upToDateDiv = '<div id="upToDateDiv" hidden>You are up to date</div>';
                    return $upToDateDiv;
                }
                if ($observations[0] == null) {
                    $upToDateDiv = '<div id="upToDateDiv" hidden>You are up to date</div>';
                    return $upToDateDiv;
                } else {
                    if ($this->request->getMethod() === 'post')
                    {
                        $message = $this->request->getPost('message');
                        $observationID = $this->request->getPost('obID');
                        $this->database_model->insertComment($userID, $message, $observationID);
                        /*$this->data['content'] = view('hubPage'); //replace by your own view
                        return view("extraTemplate", $this->data);*/
                        return redirect()->to($groupname_filter);
                    }
                    return view('groupPage', $data3);
                }
            }
        }
        $data2['observations'] = $this->database_model->getFirstObservationsForHub($groupmembers);
        $observations = $data2['observations'];

        //check if submit comment
        if ($this->request->getMethod() === 'post')
        {
            $message= $this->request->getPost('message');
            $observationID = $this->request->getPost('obID');
            $this->database_model-> insertComment($userID,$message,$observationID);

            /*$this->data['content'] = view('hubPage'); //replace by your own view
            return view("extraTemplate", $this->data);*/
            return redirect()->to($groupname_filter);
        }
        //comment function end

        $this->data['content'] = view('groupPage', $data2);

        $this->data['scripts_to_load'] = array('jquery-3.5.1.min.js','showMoreFriendsObservations.js');
        $this->data['title'] = 'Group';
        $this->data['menu_items'] = $this->menu_model->get_menuitems('groups');
        return view("mainTemplate", $this->data);
    }

    public function newgroup(){
        $this->data=[];
        $this->set_common_data('eco', 'eco');
        //add your code here...
        helper(['form']);
        if ($this->request->getMethod() === 'post' && $this->validate([
                'groupname' => 'required|min_length[3]|max_length[50]|alpha_dash',
                'groupdescription'  => 'required|min_length[3]|max_length[255]'
            ]))
        {
            $groupname= $this->request->getPost('groupname');
            $groupdescription= $this->request->getPost('groupdescription');
            $this->database_model-> insertGroup($groupname,$groupdescription);

            session()->setFlashdata('success','Create a new group Successfulfly!');
            return redirect()->to('groups');
        }else
        {
            $this->data['content'] = view('newgroup'); //replace by your own view
            $this->data['title'] = 'New Group';
            $this->data['menu_items'] = $this->menu_model->get_menuitems('newgroup');
            return view("mainTemplate", $this->data);
        }
    }

    public function groupmembers($groupname_filter) {
        $this->set_common_data('arrow_back', 'search');

        $userID=session()->get("id");
        //get the groupid by the groupname and userid
        $groupid = $this->database_model->getGroupName($groupname_filter, $userID)->groupID;
        //get an array of userid of this group
        $query_result = $this->database_model->getUsersFromGroup($groupid);
        //get an array of user name of this group
        $groupmembers=array();
        foreach ($query_result as $row)
        {
            array_push($groupmembers,$this->database_model->getUser($row->userID));
        }
        $data['groupmembers']=$groupmembers;
        $data['groupID'] = $groupid;
        $data['groupName'] = $groupname_filter;
        $this->data['content'] = view('groupmembers',$data); //replace by your own view
        $this->data['title'] = 'Group Members';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('groupmembers');
        $this->data['scripts_to_load'] = array('jquery-3.5.1.min.js');
        return view("mainTemplate", $this->data);
    }

    // show a list of friends that can be added to the group
    public function addGroupMembers($groupID, $groupName) {
        $this->set_common_data('arrow_back', 'search');

        // retrieve all the information needed from the database
        $this->data['friends'] = $this->database_model->getFriendsToAdd(session()->get('id'), $groupID);
        $this->data['groupName'] = $groupName;

        $this->data['content'] = view('addGroupMembers', $this->data);
        $this->data['title'] = 'Friend List';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('groups');
        $this->data['scripts_to_load'] = array('jquery-3.5.1.min.js', 'addFriendToGroup.js');
        return view("mainTemplate", $this->data);
    }

    public function profile() {
        $this->set_common_data('eco', 'menu');

        //get current user
        $userID = session()->get('id');
        $username = $this->database_model->getUser($userID)->username;

        //check if the url contains parameter for new observations
        $variableActive = $this->request->getVar('extra');
        if ($variableActive != null) {
            $getMoreObservations = $_GET['extra'];
            $lastDate = $_GET['lastDate'];
            $lastTime = $_GET['lastTime'];
            #$tomorrow = $_GET['tomorrow'];

            if (strcasecmp($getMoreObservations, 'true') == 0) {
                //get more observations from friends from current users
                $data3['userID']=$userID;
                $data3['username']=$username;
                $data3['observations'] = $this->database_model->getMoreObservationsProfile($userID, $lastDate, $lastTime);
                $observations = $data3['observations'];
                if ($observations == null) {
                    $upToDateDiv = '<div id="upToDateDiv" hidden>You are up to date</div>';
                    return $upToDateDiv;
                }
                else {
                    return view('hubPage', $data3);
                }
            }
        }

        //profile user information part
        //get observation amount
        $data2['userID']=$userID;
        $data2['username']=$username;
        $data2['observationCount'] = $this->database_model->getUserObservationCount($userID);
        $data2['commentCount'] = $this->database_model->getUserCommentCount($userID);
        $data2['likeCount'] = $this->database_model->getUserLikeCount($userID);
        $data2['friendCount'] = $this->database_model->getUserFriendCount($userID);
        $data2['pointCount'] = $this->database_model->getUserpoint($userID);
        $data2['description'] = $this->database_model->getUserDescription($userID);
        $data2['image'] = $this->database_model->getUserProfilePicture($userID);


        //get observations from user
        $data2['observations'] = $this->database_model->getFirstObservationsProfile($userID);
        if ($data2['observations'] == null) {
            $data2['nothingYet'] = "No observations to show, Yet!";
            $this->data['content'] = view('profile', $data2); //replace by your own view
        }
        else {
            $data2['nothingYet'] = "";
            $this->data['content'] = view('profile',$data2); //replace by your own view
        }

        $this->data['title'] = 'Profile';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('profile');
        $this->data['scripts_to_load'] = array('jquery-3.5.1.min.js','showMoreObservations.js');
        return view("mainTemplateProfile", $this->data);
    }
    public function otheruserprofile($userID) {
        //this ffunction should the same as profile function, the nly diference is the useid
        $this->set_common_data('search', 'menu');
        //get current user
        $username = $this->database_model->getUser($userID)->username;

        //check if the url contains parameter for new observations
        $variableActive = $this->request->getVar('extra');
        if ($variableActive != null) {
            $getMoreObservations = $_GET['extra'];
            $lastDate = $_GET['lastDate'];
            $lastTime = $_GET['lastTime'];
            #$tomorrow = $_GET['tomorrow'];

            if (strcasecmp($getMoreObservations, 'true') == 0) {
                //get more observations from friends from current users
                $data3['userID'] = $userID;
                $data3['username'] = $username;
                $data3['observations'] = $this->database_model->getMoreObservationsProfile($userID, $lastDate, $lastTime);
                $observations = $data3['observations'];
                if ($observations == null) {
                    $upToDateDiv = '<div id="upToDateDiv" hidden>You are up to date</div>';
                    return $upToDateDiv;
                } else {
                    return view('hubPage', $data3);
                }
            }
        }

        //profile user information part
        //get friendrequest status
        $data2['requestStatus'] = $this->database_model->getFriendrequestStatus($userID, session()->get('id'));

        //get observation amount
        $data2['userID']=$userID;
        $data2['username']=$username;
        $data2['observationCount'] = $this->database_model->getUserObservationCount($userID);
        $data2['commentCount'] = $this->database_model->getUserCommentCount($userID);
        $data2['likeCount'] = $this->database_model->getUserLikeCount($userID);
        $data2['friendCount'] = $this->database_model->getUserFriendCount($userID);
        $data2['pointCount'] = $this->database_model->getUserpoint($userID);

        //get observations from user
        $data2['observations'] = $this->database_model->getFirstObservationsProfile($userID);
        if ($data2['observations'] == null) {
            $data2['nothingYet'] = "No observations to show, Yet!";
            $this->data['content'] = view('profile', $data2); //replace by your own view
        }
        else {
            $data2['nothingYet'] = "";
            $this->data['content'] = view('profile',$data2); //replace by your own view
        }

        //change the content
        $this->data['title'] = 'Other User Profile';
        $this->data['menu_items'] = $this->menu_model->get_menuitems('otheruserprofile');
        $this->data['scripts_to_load'] = array('jquery-3.5.1.min.js','showMoreObservations.js', 'otheruserprofile.js');
        $this->data['scripts_to_load'] = array('jquery-3.5.1.min.js','showMoreObservations.js', 'otheruserprofile.js');
        return view("mainTemplate", $this->data);
    }

    public function addObservation() {
        $this->set_common_data('eco', 'search');

        //get current user
        $userID = session()->get('id');

        helper(['form']);

        if ($this->request->getMethod() === 'post'&& $this->validate([
                'description'  => 'required|min_length[3]',
                'date'=>'required|min_length[6]|max_length[50]',
                'time'=>'required|min_length[4]|max_length[50]']))
        {
            $uploadedPicture = $this->request->getFile('picture');
            $picture = file_get_contents($uploadedPicture->getTempName());
            $imageProperties = $uploadedPicture->getMimeType();
            $scientificName = $this->request->getPost('scientificName');

            $specieName = $this->request->getPost('specieName');
            $description = $this->request->getPost('description');
            if ($this->database_model->getSpecieID($specieName))
            {
                //this specie exsits in the database
                $specieId = $this->database_model->getSpecieID($specieName);
            }
            else
            {
                //this specie is new
                $this->database_model->insertSpecie($specieName,$scientificName,100,$description);
                $specieId = $this->database_model->getSpecieID($specieName);
            }
            $location = $this->request->getPost('location');
            $date = $this->request->getPost('date');
            $time = $this->request->getPost('time');
            $userNote = $this->request->getPost('userNote');

            $this->database_model->insertObservation($picture, $imageProperties, $location, $date, $time, $specieId[0]->id, $userID, $userNote);
            return redirect()->to('hub');
        }

        //add your code here...
        $this->data['content'] = view('addobservation'); //replace by your own view
        $this->data['title'] = 'Explore';
        $this->data['menu_items'] = $this->menu_model->get_menuitems('addObservation');
        $this->data['scripts_to_load'] = array('jquery-3.5.1.min.js', 'plantAPI.js','previewPicture.js');
        return view("mainTemplate", $this->data);
    }

    public function friendList() {
        $this->set_common_data('arrow_back', 'search');

        // retrieve all the information needed from the database
        $this->data['requests'] = $this->database_model->getFriendRequestsFromUser(session()->get('id'));
        $this->data['friends'] = $this->database_model->getFriendsFromUser(session()->get('id'));

        $this->data['content'] = view('friendList', $this->data);
        $this->data['title'] = 'Friend List';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('addObservation');
        $this->data['scripts_to_load'] = array('friendlist.js');
        return view("mainTemplate", $this->data);
    }

    public function search() {
        $this->set_common_data('arrow_back', 'search');

        //add your code here...
        $this->data['content'] = view('search'); //replace by your own view
        $this->data['title'] = 'Search';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('addObservation');
        return view("mainTemplate", $this->data);
    }

    public function login() {
        $this->data=[];

        //add your code here...
        helper(['form']);//to remain the user's typed value if the login fails
        if ($this->request->getMethod() === 'post' && $this->validate([
                'email'  => 'required|min_length[3]|max_length[40]|valid_email|is_not_unique[user.email]',
                'password'=>'required|min_length[6]|max_length[50]'
            ]))
        {
            //check the password
            $email= $this->request->getPost('email');
            $password=$this->request->getPost('password');
            $searchresult=$this->database_model->validateUser($email,$password);
            if ($searchresult==0){
                //password is correct
                // save the current user data
                //get the user row from the database by the email
                $user = $this->database_model->getUserByEmail($email);
                //save this
                $this->setUserSession($user);
                session()->setFlashdata('success','Successful Login!');
                //return hub page
                return redirect()->to('hub');
//                return view("mainTemplate", $this->data);
            }
            else if($searchresult==1){
                //password is wrong
                $this->data['error_message'] = 'Wrong password. Did you forgot your password?';
            }
            else if ($searchresult==2){
                //user doesn't exsit
                $this->data['error_message'] = 'There is no account with this email address.';

            }
            else if ($searchresult==3){
                //multiple accounts with the same user name,
                $this->data['error_message'] = 'Multiple accounts with the same email exist. Please consult our software developer!';
            }
        }
        else if($this->request->getMethod() === 'post' )
        {
            $this->data['validation']="errors";
        }
        $this->data['content'] = view('login',$this->data); //replace by your own view
        return view("extraTemplate", $this->data);
    }
    public function loginFromObservation() {

        //add your code here...
        $this->data['content'] = view('loginFromObservation'); //replace by your own view
        $this->data['title'] = 'Login From Observation';

        return view("extraTemplate", $this->data);
    }

    public function register() {
        $this->data=[];
        helper(['form']);
        if ($this->request->getMethod() === 'post' && $this->validate([
                'username' => 'required|min_length[3]|max_length[255]|alpha_dash|is_unique[user.username]',
                'email'  => 'required|min_length[3]|max_length[40]|valid_email|is_unique[user.email]',
                'password'=>'required|min_length[6]|max_length[50]',
                'password_confirm'=>'matches[password]'
            ]))
        {
            $username= $this->request->getPost('username');
            $email= $this->request->getPost('email');
            $password=$this->request->getPost('password');
            $hashed_password=$this->passwordHash($password);
            $this->database_model-> insertUser($username,$hashed_password,$email,$password);
            $user = $this->database_model->getUserByEmail($email);
            $this->setUserSession($user);
            session()->setFlashdata('success','Successful Register!');
            return redirect()->to('hub');
        }
        else if($this->request->getMethod() === 'post')
        {
            $this->data['validation']="error";
        }
        $this->data['content'] = view('register',$this->data); //replace by your own view
        return view("extraTemplate", $this->data);
    }

    public function forgotPassword() {
        $this->data=[];
        helper(['form']);//to remain the user's typed value if the login fails
        if ($this->request->getMethod() === 'post' && $this->validate([
                'email'  => 'valid_email|is_not_unique[user.email]',
                'username' => 'required|min_length[3]|max_length[255]|alpha_dash'
            ]))
        {
            //check the password
            $email= $this->request->getPost('email');
            $userName=$this->request->getPost('username');
            $searchresult=$this->database_model->validateUserNameEmail($email,$userName);
            if ($searchresult==0){
                //userName and email are correct
                $userquery = $this->database_model->getUserByEmail($email);
                $this->setUserSession($userquery);
                session()->setFlashdata('success','Successful Login!');
                return redirect()->to('resetPassword/'.$userquery->id);
//                return view("mainTemplate", $this->data);
            }
            else if($searchresult==1){
                //username is wrong
                $this->data['error_message'] = 'Wrong username.';
            }
            else if ($searchresult==2){
                //email doesn't exsit
                $this->data['error_message'] = 'This email address does not exists.';
            }
            else if ($searchresult==3){
                //multiple accounts with the same user name,
                $this->data['error_message'] = 'Multiple accounts with the same email address exist. Please consult our software developer!';
            }
        }
        elseif($this->request->getMethod() === 'post'){
            $this->data['error_message'] =' ';
        }
        $this->data['content'] = view('forgotPassword', $this->data); //replace by your own view
        $this->data['title'] = 'Forgot Password';
        return view("extraTemplate", $this->data);
    }

    public function resetPassword($userID) {
        if($userID != session()->get('id'))
        {
            //here should inform you don't have right to do that, you can only modify your own password
            return redirect()->to('/html');
        }
        $this->data['userID'] = $userID;
        //helper(['form']);//to remain the user's typed value if the login fails
        //$this->data['error_message'] ='';
        if ($this->request->getMethod() === 'post' && $this->validate([
                'newPassword'  => 'required|min_length[6]|max_length[50]',
                'password_confirm'=>'matches[newPassword]'
            ]))
        {
            $password= $this->request->getPost('newPassword');
            if($this->database_model->validateUser(session()->get('email'),$password)==0)
            {
                $this->data['error_message'] ='This password is the same as te old one!';
                $this->data['content'] = view('resetPassword', $this->data); //replace by your own view
                return view("extraTemplate", $this->data);
            }
            $hashed_password=$this->passwordHash($password);
            $this->database_model->resetPassword($hashed_password, $userID,$password);
            session()->destroy();
            return redirect()->to('/html');
        }
        elseif ($this->request->getMethod() === 'post')
        {
            $this->data['validation'] = "error";
        }
        $this->data['content'] = view('resetPassword', $this->data); //replace by your own view
        $this->data['title'] = 'Reset Password';
        return view("extraTemplate", $this->data);
    }
    public function edit_profile() {
        $this->set_common_data('arrow_back', 'search');
        //get current user
        $userID = session()->get('id');

        helper(['form']);
        if($this->request->getMethod() === 'post'&& $this->validate([
                'Name' => 'min_length[3]|max_length[255]|alpha_dash',
                'email'  => 'min_length[3]|max_length[40]|valid_email',
                'description' => 'min_length[3]|max_length[200]'
            ]))
        {
            if($this->request->getFile('picture')->getTempName()) {
                $uploadedPicture = $this->request->getFile('picture');
                $picture = file_get_contents($uploadedPicture->getTempName());
                $imageProperties = $uploadedPicture->getMimeType();
            }
            else {
                $imageData = $this->database_model->getUserProfilePicture($userID);
                $picture = $imageData[0]->imagedata;
                $imageProperties = $imageData[0]->imagetype;
            }

            $name = $this->request->getPost('Name');
            //$gender = $this->request->getPost('gender');
            $email = $this->request->getPost('email');
            $description = $this->request->getPost('description');

            $this->database_model->setProfileData($userID, $name, $email, $description, $picture, $imageProperties);

            return redirect()->to('profile');
        }
        $data2['userInformation'] = $this->database_model->getUser($userID);

        $this->data['content'] = view('edit_profile', $data2); //replace by your own view
        $this->data['title'] = 'edit profile';
        $this->data['menu_items'] = $this->menu_model->get_menuitems('addObservation');
        $this->data['scripts_to_load'] = array('jquery-3.5.1.min.js','profilePicture.js', 'previewPicture.js');

        return view("mainTemplate", $this->data);
    }
    public function account() {
        $this->set_common_data('arrow_back', 'search');
        //add your code here...
        $this->data['content'] = view('account'); //replace by your own view
        $this->data['title'] = 'Account';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('addObservation');
        return view("mainTemplate", $this->data);
    }
    /* created by rui
     * save the data of the current data to session
     * */
    private function setUserSession($user){
        $data = [
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'points' => $user->points,
            'monthlyPoints' => $user->monthlyPoints,
            'weeklyPoints' => $user->weeklyPoints,
            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }
    /* created by rui
     * logout, clean the data of the current information
     * */
    public function logout(){
        session()->destroy();
        return redirect()->to('login');
    }

    public function check_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->model('user_model');
        $row = $this->user_model->get_by_name_pwd($username,$password);
        if($row){
            $this->load->view('success');
        }
        else{
            $this->load->view('login');
        }
    }

}