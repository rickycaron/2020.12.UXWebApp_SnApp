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

    public function anobservation($observationID) {
        $this->cachePage(10);
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


}