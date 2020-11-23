<?php


namespace App\Controllers;


use App\Models\leaderboard_functions;
use App\Models\extra_functions;

class Maincontroller extends \CodeIgniter\Controller
{
    private $menu_model;
    private $database_model;
    private $data;

    use \App\Controllers\leaderboard_functions;
    use \App\Controllers\extra_functions;

    /**
     * Maincontroller constructor.
     */
    public function __construct() {
        $this->menu_model = new \Menu_model();
        $this->database_model = new \Database_model();
    }

    private function set_common_data($header_icon_1, $header_icon_2) {
        $this->data['header_icon_1'] = $header_icon_1;
        $this->data['header_icon_2'] = $header_icon_2;
    }

    public function leaderboardSelect() {
        $this->set_common_data('eco', 'search');
        //$username=session()->get('username');

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

        //get current user
        $userID = session()->get('id');

        //get friends of current user
        $friendsArray = $this->database_model->getFriendsUserName($userID);

        //check if the url contains parameter for new observations
        $variableActive = $this->request->getVar('extra');
        if ($variableActive != null) {
            $getMoreObservations = $_GET['extra'];
            $lastDate = $_GET['lastDate'];
            $lastTime = $_GET['lastTime'];
            $tomorrow = $_GET['tomorrow'];

            if (strcasecmp($getMoreObservations, 'true') == 0) {
                //get more observations from friends from current users
                $data3['observations'] = $this->database_model->getMoreObservationsForHub($friendsArray, $lastDate, $tomorrow, $lastTime);
                return view('hubPage', $data3);
            }
        }

        //get observations from friends from current users
        $data2['observations'] = $this->database_model->getFirstObservationsForHub($friendsArray);

        $this->data['content'] = view('hubPage', $data2); //replace by your own view
        $this->data['title'] = 'Observation Feed';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('hub');
        $this->data['scripts_to_load'] = array('jquery-3.5.1.min.js','showMoreFriendsObservations.js');
        return view("mainTemplate", $this->data);
    }

    public function anobservation($observationID) {
        $this->set_common_data('arrow_back', 'search');

        // retrieve all the information needed from the database and write values in placeholders
        $observation = $this->database_model->getObservation($observationID);
        $observation_data['username'] = $this->database_model->getUser($observation['userID'])->username;
        $observation_data['specie_name'] = $this->database_model->getSpecie($observation['specieID'])->specieName;
        $observation_data['user_note'] = $observation['userNote'];
        $observation_data['date'] = $observation['date'];
        $observation_data['time'] = $observation['time'];
        $observation_data['location'] = $observation['location'];
        $observation_data['description'] = $observation['description'];
        $observation_data['like_count'] = $observation['likes'];
        $observation_data['comment_count'] = $observation['comments'];
        $observation_data['image_data'] = $observation['imageData'];
        $observation_data['image_type'] = $observation['imageType'];
        $observation_data['likes_comments'] = "";
        $observation_data['id'] = $observation['id'];

        $this->data['content'] = view('anobservation', $observation_data);
        $this->data['title'] = 'Observation';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('none');
        $this->data['scripts_to_load'] = array('anobservationMap.js');
        return view("mainTemplate", $this->data);
    }

    public function groups() {
        $this->set_common_data('eco', 'search');

        //add your code here...
        $this->data['content'] = view('groupsOverviewPage'); //replace by your own view
        $this->data['title'] = 'Groups';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('groups');
        return view("mainTemplate", $this->data);
    }

    public function group() {
        $this->set_common_data('arrow_back', 'search');

        //add your code here...
        $this->data['content'] = view('groupPage'); //replace by your own view
        $this->data['title'] = 'Group';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('groups');
        return view("mainTemplate", $this->data);
    }

    public function profile() {
        $this->set_common_data('search', 'menu');

        //add your code here...
        $this->data['content'] = view('profile'); //replace by your own view
        $this->data['title'] = 'Profile';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('profile');
        return view("mainTemplate", $this->data);
    }

    public function addObservation() {
        helper(['form']);
        $this->set_common_data('eco', 'search');

        //get current user
        $userID = session()->get('id');

        if ($this->request->getMethod() === 'post'&& $this->validate([
                'specieDescription'  => 'required|min_length[3]',
                'location'=>'required|min_length[6]|max_length[50]',
                'date'=>'required|min_length[6]|max_length[50]',
                'time'=>'required|min_length[4]|max_length[50]']))
        {
            $uploadedPicture = $this->request->getFile('picture');
            $picture = file_get_contents($uploadedPicture->getTempName());
            $imageProperties = $uploadedPicture->getMimeType();

            $specieName = $this->request->getPost('specieName');
            $specieId = $this->database_model->getSpecieID($specieName);
            $description = $this->request->getPost('specieDescription');
            $location = $this->request->getPost('location');
            $date = $this->request->getPost('date');
            $time = $this->request->getPost('time');

            $this->database_model->insertObservation($picture, $imageProperties, $description, $location, $date, $time, 14, $userID); //hardcoded values should be changed if species are filled in in the database with correct name
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

        //add your code here...
        $this->data['content'] = view('friendList'); //replace by your own view
        $this->data['title'] = 'Friend List';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('addObservation');
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
        $this->set_common_data('eco', 'eco');

        //add your code here...
        helper(['form']);//to remain the user's typed value if the login fails
        $this->data['error_message'] =' ';
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
                $this->data['error_message'] = 'Wrong password. Try again or click Forgot password to reset it.';
            }
            else if ($searchresult==2){
                //user doesn't exsit
                $this->data['error_message'] = 'Invalid username. Please register one account.';

            }
            else if ($searchresult==3){
                //multiple accounts with the same user name,
                $this->data['error_message'] = 'Multiple accounts with the same email exsit. Please consult our software developer!';
            }
        }
        $this->data['content'] = view('login'); //replace by your own view
        return view("extraTemplate", $this->data);
    }
    public function loginFromObservation() {
        $this->set_common_data('eco', 'eco');

        //add your code here...
        $this->data['content'] = view('loginFromObservation'); //replace by your own view
        $this->data['title'] = 'Login From Observation';

        return view("extraTemplate", $this->data);
    }
    public function register() {
        $this->data=[];
        $this->set_common_data('eco', 'eco');
        //add your code here...
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
            $this->database_model-> insertUser($username,$password,$email);
            session()->setFlashdata('success','Successful Register!');
            return redirect()->to('login');
        }
        else
        {
            $this->data['content'] = view('register'); //replace by your own view
            return view("extraTemplate", $this->data);
        }
    }
    public function forgotPassword() {
        $this->set_common_data('eco', 'eco');

        //add your code here...
        $this->data['content'] = view('forgotPassword'); //replace by your own view
        $this->data['title'] = 'Forgot Password';


        return view("extraTemplate", $this->data);
    }
    public function resetPassword() {
        $this->set_common_data('eco', 'eco');

        //add your code here...
        $this->data['content'] = view('resetPassword'); //replace by your own view
        $this->data['title'] = 'Reset Password';


        return view("extraTemplate", $this->data);
    }

    public function edit_profile() {
        $this->set_common_data('arrow_back', 'search');

        //add your code here...
        $this->data['content'] = view('edit_profile'); //replace by your own view
        $this->data['title'] = 'edit profile';

        $this->data['menu_items'] = $this->menu_model->get_menuitems('addObservation');
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
//            'id' => $user['id'],
//            'username' => $user['username'],
//            'email' => $user['email'],
//            'points' => $user['points'],
//            'monthlyPoints' => $user['monthlyPoints'],
//            'weeklyPoints' => $user['weeklyPoints'],
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

}