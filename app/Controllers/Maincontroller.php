<?php


namespace App\Controllers;


class Maincontroller extends \CodeIgniter\Controller
{

    public function leaderboardSelect() {
        $data['header_icon_1'] = 'arrow_back';
        $data['header_middle'] = 'search bar?';
        $data['header_icon_2'] = 'search';
        return view("mainTemplate", $data);
    }

    public function hub() {
        $data['header_icon_1'] = 'arrow_back';
        $data['header_middle'] = 'search bar?';
        $data['header_icon_2'] = 'search';
        return view("mainTemplate", $data);
    }

    public function groups() {
        return view("mainTemplate");
    }

    public function profile() {
        return view("mainTemplate");
    }

    public function addObservation() {
        return view("mainTemplate");
    }
}