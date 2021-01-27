<?php


namespace App\Controllers;


use App\Models\extra_functions;

class Maincontroller extends BaseController
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


    public function hub() {
        $this->set_common_data('eco',null, 'search');
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
                $observations = $this->database_model->getMoreObservationsForHub($friendsArray, $lastDate, $lastTime);
                $data3['observations'] = $observations;
                if ($observations == null) {
                    $data3['upToDate'] = "";
                    return view('observationCards', $data3, $thisUserID);
                }
                if ($observations[0] == null) {
                    $data3['upToDate'] = "";
                    return view('observationCards', $data3, $thisUserID);
                }
                else {
                    $data3['upToDate'] = "";
                    foreach ($observations as $observation) {
                        $encoded_image = $this->encode_image($observation->imageData, $observation->imageType);
                        $observation->encoded_image = $encoded_image;
                    }
                    $data3['observations'] = $observations;
                    $this->data['content'] = view('hubPage', $data3, $thisUserID);
                    return view('observationCards', $data3, $thisUserID);
                }
            }
        }

        //get observations from friends from current users
        $observations = $this->database_model->getFirstObservationsForHub($friendsArray);
        $data2['observations'] = $observations;
        if ($observations == null) {
            $data2['upToDate'] = "You are up to date! Check your groups or search friends to see their observations";
            $this->data['content'] = view('hubPage', $data2, $thisUserID); //replace by your own view
        }
        else {
            $data2['upToDate'] = "";
//            foreach ($observations as $observation) {
//                $encoded_image = $this->encode_image($observation->imageData, $observation->imageType);
//                $observation->encoded_image = $encoded_image;
//            }
//            $data2['observations'] = $observations;
            $this->data['content'] = view('hubPage', $data2, $thisUserID);
        }

        $this->data['title'] = lang('app.Observation_Feed');

        $this->data['menu_items'] = $this->menu_model->get_menuitems('hub');
        $this->data['scripts_to_load'] = array('jquery-3.5.1.min.js', 'showMoreObservations.js', 'likeFunction.js');

        session()->set('lastMainPageLink', 'hub');
        return view("mainTemplate", $this->data);
    }

    public function anobservation($observationID) {
        $this->set_common_data('arrow_back', session()->get('lastMainPageLink'), 'search');

        // retrieve all the information needed from the database and write values in placeholders
        $observation = $this->database_model->getObservation($observationID);
        $user = $this->database_model->getUser($observation['userID']);

        $observation_data['commentCount'] = $this->database_model->getObservaitonCommentCount($observationID);
        $observation_data['likeCount'] = $this->database_model->getObservaitonlikeCount($observationID);

        $observation_data['username'] = $user->username;
        $image_data_user = $user->p_imagedata;
        $image_type_user = $user->p_imagetype;
        $observation_data['profile_image'] = $this->encode_image($image_data_user, $image_type_user);
        $specie_query = $this->database_model->getSpecie($observation['specieID']);
        $observation_data['specie_name'] = $specie_query->specieName;
        $observation_data['description'] = $specie_query->specieDescription;
        $observation_data['user_note'] = $observation['userNote'];
        $observation_data['date'] = $observation['date'];
        $observation_data['time'] = $observation['time'];
        $observation_data['location'] = $observation['location'];
        $observation_data['like_count'] = $observation['likes'];
        $observation_data['comment_count'] = $observation['comments'];
        $image_data = $observation['imageData'];
        $image_type = $observation['imageType'];
        $observation_data['encoded_image'] = $this->encode_image($image_data, $image_type);
        $observation_data['likes_comments'] = "";
        $observation_data['id'] = $observation['id'];

        if (strlen($observation_data['profile_image']) < 20) $observation_data['profile_image'] = null;

        $this->data['content'] = view('anobservation', $observation_data);
        $this->data['title'] = lang('app.Observation');

        $this->data['menu_items'] = $this->menu_model->get_menuitems(session()->get('lastMainPageLink'));
        $this->data['scripts_to_load'] = array('anobservation.js', 'loading.js');
        return view("mainTemplate", $this->data);
    }


    public function friendList() {
        $this->set_common_data('arrow_back', 'profile','search');

        // retrieve all the information needed from the database
        $this->data['requests'] = $this->database_model->getFriendRequestsFromUser(session()->get('id'));
        $friends = $this->database_model->getFriendsFromUser(session()->get('id'));
        foreach ($friends as $f) {
            $f->encoded_image = $this->encode_image($f->p_imagedata, $f->p_imagetype);
        }
        $this->data['friends'] = $friends;

        $this->data['content'] = view('friendList', $this->data);
        $this->data['title'] = lang('app.Friend_List');

        $this->data['menu_items'] = $this->menu_model->get_menuitems('profile');
        $this->data['scripts_to_load'] = array('friendlist.js');
        return view("mainTemplate", $this->data);
    }



    public function account($userID) {
        $this->set_common_data('arrow_back', 'profile','search');

        //add your code here...
        if($userID != session()->get('id'))
        {
            //here should inform you don't have right to do that, you can only modify your own password
            return redirect()->to(base_url());
        }
        $this->data['userID'] = $userID;
        if ($this->request->getMethod() === 'post' && $this->validate([
                'oldPassword'  => 'required|min_length[6]|max_length[50]',
                'newPassword'  => 'required|min_length[6]|max_length[50]',
                'password_confirm'=>'matches[newPassword]'
            ]))
        {
            $oldPassword= $this->request->getPost('oldPassword');
            if($this->database_model->validateUser(session()->get('email'),$oldPassword)==0)
            {
                //the password is correct
                $newPassword= $this->request->getPost('newPassword');
                if(strcmp($oldPassword,$newPassword) == 0)
                {
                    $this->data['error_message'] ='This password is the same as te old one!';
                    $this->data['content'] = view('account', $this->data); //replace by your own view
                    return view("mainTemplate", $this->data);
                }
                $hashed_password=$this->passwordHash($newPassword);
                $this->database_model->resetPassword($hashed_password, $userID,$newPassword);
                session()->destroy();
                return redirect()->to(base_url());
            }else
            {
                $this->data['error_message'] ='Your password is incorrect!';
            }
        }
        elseif ($this->request->getMethod() === 'post')
        {
            $this->data['validation'] = "error";
        }
        $this->data['content'] = view('account',$this->data); //replace by your own view
        $this->data['title'] = lang('app.Account');

        $this->data['menu_items'] = $this->menu_model->get_menuitems('profile');
        return view("mainTemplate", $this->data);
    }


}