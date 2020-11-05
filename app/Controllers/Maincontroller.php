<?php


namespace App\Controllers;


class Maincontroller extends \CodeIgniter\Controller
{
    private $menu_model;
    private $data;

    /**
     * Maincontroller constructor.
     */
    public function __construct() {
        $this->menu_model = new \Menu_model();
    }

    private function set_common_data($header_icon_1, $header_icon_2) {
        $this->data['header_icon_1'] = $header_icon_1;
        $this->data['header_icon_2'] = $header_icon_2;
    }
    private function set_common_data1($header_icon_1) {
        $this->data['header_icon_1'] = $header_icon_1;
    }

    public function leaderboardSelect() {
        $this->set_common_data('eco', 'search');

        //add your code here...
        $this->data['content'] = view('leaderboardSelect'); //replace by your own view

        $this->data['menu_items'] = $this->menu_model->get_menuitems('leaderboardSelect');
        return view("mainTemplate", $this->data);
    }

    public function leaderboard() {
        $this->set_common_data('arrow_back', 'search');
        $this->data['content'] = view('leaderboard');

        $this->data['menu_items'] = $this->menu_model->get_menuitems('leaderboardSelect');
        return view("mainTemplate", $this->data);
    }

    public function hub() {
        $this->set_common_data('eco', 'search');

        //add your code here...
        $this->data['content'] = view('hubPage'); //replace by your own view

        $this->data['menu_items'] = $this->menu_model->get_menuitems('hub');
        return view("mainTemplate", $this->data);
    }

    public function groups() {
        $this->set_common_data('eco', 'search');

        //add your code here...
        $this->data['content'] = view('groupsOverviewPage'); //replace by your own view

        $this->data['menu_items'] = $this->menu_model->get_menuitems('groups');
        return view("mainTemplate", $this->data);
    }

    public function group() {
        $this->set_common_data('arrow_back', 'search');

        //add your code here...
        $this->data['content'] = view('groupPage'); //replace by your own view

        $this->data['menu_items'] = $this->menu_model->get_menuitems('groups');
        return view("mainTemplate", $this->data);
    }

    public function profile() {
        $this->set_common_data('search', 'menu');

        //add your code here...
        $this->data['content'] = "<h1>nothing yet</h1>"; //replace by your own view

        $this->data['menu_items'] = $this->menu_model->get_menuitems('profile');
        return view("mainTemplate", $this->data);
    }

    public function addObservation() {
        $this->set_common_data('eco', 'search');

        //add your code here...
        $this->data['content'] = "<h1>nothing yet</h1>"; //replace by your own view

        $this->data['menu_items'] = $this->menu_model->get_menuitems('addObservation');
        return view("mainTemplate", $this->data);
    }

    public function friendList() {
        $this->set_common_data('arrow_back', 'search');

        //add your code here...
        $this->data['content'] = view('friendList'); //replace by your own view

        $this->data['menu_items'] = $this->menu_model->get_menuitems('addObservation');
        return view("mainTemplate", $this->data);
    }

    public function search() {
        $this->set_common_data('arrow_back', 'search');

        //add your code here...
        $this->data['content'] = view('search'); //replace by your own view

        $this->data['menu_items'] = $this->menu_model->get_menuitems('addObservation');
        return view("mainTemplate", $this->data);
    }
    public function login() {
        $this->set_common_data1('eco');

        //add your code here...
        $this->data['content'] = view('login'); //replace by your own view


        return view("extraTemplate", $this->data);
    }
    public function loginFromObservation() {
        $this->set_common_data1('eco');

        //add your code here...
        $this->data['content'] = view('loginFromObservation'); //replace by your own view


        return view("extraTemplate", $this->data);
    }
    public function register() {
        $this->set_common_data1('eco');

        //add your code here...
        $this->data['content'] = view('register'); //replace by your own view


        return view("extraTemplate", $this->data);
    }
    public function forgotPassword() {
        $this->set_common_data1('eco');

        //add your code here...
        $this->data['content'] = view('forgotPassword'); //replace by your own view


        return view("extraTemplate", $this->data);
    }
    public function resetPassword() {
        $this->set_common_data1('eco');

        //add your code here...
        $this->data['content'] = view('resetPassword'); //replace by your own view


        return view("extraTemplate", $this->data);
    }

}