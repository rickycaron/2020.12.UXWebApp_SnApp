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
        $this->set_common_data('arrow_back', 'search');

        //add your code here...
        $this->data['content'] = "<h1>nothing yet</h1>"; //replace by your own view

        $this->data['menu_items'] = $this->menu_model->get_menuitems('leaderboardSelect');
        return view("mainTemplate", $this->data);
    }

    public function hub() {
        $this->set_common_data('arrow_back', 'search');

        //add your code here...
        $this->data['content'] = view('observationCard'); //replace by your own view

        $this->data['menu_items'] = $this->menu_model->get_menuitems('hub');
        return view("mainTemplate", $this->data);
    }

    public function groups() {
        $this->set_common_data('arrow_back', 'search');

        //add your code here...
        $this->data['content'] = "<h1>nothing yet</h1>"; //replace by your own view

        $this->data['menu_items'] = $this->menu_model->get_menuitems('groups');
        return view("mainTemplate", $this->data);
    }

    public function profile() {
        $this->set_common_data('arrow_back', 'search');

        //add your code here...
        $this->data['content'] = "<h1>nothing yet</h1>"; //replace by your own view

        $this->data['menu_items'] = $this->menu_model->get_menuitems('profile');
        return view("mainTemplate", $this->data);
    }
    
    public function addObservation() {
        $this->set_common_data('arrow_back', 'search');

        //add your code here...
        $this->data['content'] = "<h1>nothing yet</h1>"; //replace by your own view

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
        $this->data['content'] = "<h1>nothing yet</h1>"; //replace by your own view


        return view("extraTemplate", $this->data);
    }
    public function register() {
        $this->set_common_data1('eco');

        //add your code here...
        $this->data['content'] = "<h1>nothing yet</h1>"; //replace by your own view


        return view("extraTemplate", $this->data);
    }
    public function forgotPassword() {
        $this->set_common_data1('eco');

        //add your code here...
        $this->data['content'] = "<h1>nothing yet</h1>"; //replace by your own view


        return view("extraTemplate", $this->data);
    }
    public function resetPassword() {
        $this->set_common_data1('eco');

        //add your code here...
        $this->data['content'] = "<h1>nothing yet</h1>"; //replace by your own view


        return view("extraTemplate", $this->data);
    }
}