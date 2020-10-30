<?php


namespace App\Controllers;


class Maincontroller extends \CodeIgniter\Controller
{
    private $data;

    public function __construct()
    {
    }

    public function leaderboardSelect() {
        $this->data['header_icon_1'] = 'arrow_back';
        $this->data['header_icon_2'] = 'search';
        return view("mainTemplate", $this->data);
    }
}