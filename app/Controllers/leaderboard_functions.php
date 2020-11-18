<?php


namespace App\Controllers;


trait leaderboard_functions
{
    private $leaderboard_userID = 2;

    private function set_leaderboard_data($person_list, $period, $filter) {
        //fill in the first podium data
        $leaderboard_data['name_first'] = $person_list[0]['username'];
        $leaderboard_data['points_first'] = $person_list[0][$period];
        $leaderboard_data['name_second'] = $person_list[1]['username'];
        $leaderboard_data['points_second'] = $person_list[1][$period];
        $leaderboard_data['name_third'] = $person_list[2]['username'];
        $leaderboard_data['points_third'] = $person_list[2][$period];
        //fill in all the others places
        $leaderboard_data['persons_list'] = array();
        for ($i = 3; $i < count($person_list); $i++) {
            array_push($leaderboard_data['persons_list'], array('place'=>$i, 'name'=>$person_list[$i]['username'], 'point'=>$person_list[$i][$period]));
        }
        $leaderboard_data['filter'] = $filter;
        return $leaderboard_data;
    }
}