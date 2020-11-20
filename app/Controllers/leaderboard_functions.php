<?php


namespace App\Controllers;


trait leaderboard_functions
{
    private $leaderboard_userID;

    private function get_leaderboard_query_result($leaderboard_filter, $leaderboard_period) {
        $query_result = 0;
        switch($leaderboard_filter) {
            case 'worldwide':
                $query_result = $this->database_model->getLeaderboardWorldwide($leaderboard_period);
                break;
            case 'friends':
                $query_result = $this->database_model->getFriendLeaderboard($leaderboard_period, $this->leaderboard_userID);
                break;
            default:
                //if none of the above are selected it means that the filter is a group
                $groups = $this->database_model->getGroupsFromUser($this->leaderboard_userID);
                $isGroup = 0;
                foreach ($groups as $gr):
                    if ($leaderboard_filter == $gr->name) {
                        $isGroup = 1;
                        break;
                    }
                endforeach;
                if ($isGroup == 1) {
                    $query_result = $this->database_model->getLeaderboardFromGroup($leaderboard_filter, $leaderboard_period);
                }
        }
        return $query_result;
    }

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

        $worse_then_tenth_flag = 0;
        $current_user = 0;
        for ($i = 3; $i < count((array)$person_list); $i++) {
            array_push($leaderboard_data['persons_list'], array('place'=>($i+1), 'name'=>$person_list[$i]['username'], 'point'=>$person_list[$i][$period]));
            if ($this->leaderboard_userID == $person_list[$i]['id'] && $i > 10) {
                $worse_then_tenth_flag = 1;
                $current_user = array('place'=>($i+1),'name'=>$person_list[$i]['username'], 'point'=>$person_list[$i][$period]);
            }
        }
        if ($worse_then_tenth_flag) {
            $leaderboard_data['user_placeholder'] = '<div class="after_third">
                                                        <h1>...</h1>
                                                     </div>
                                                     <div class="after_third">
                                                        <div class="without_points">
                                                            <h2>'.$current_user["place"].'</h2>
                                                            <img src="'.base_url().'/image/profile.png">
                                                            <h3>'.$current_user["name"].'</h3>
                                                        </div>
                                                        <h3>'.$current_user["point"].'</h3>
                                                     </div>';
        }
        else {
            $leaderboard_data['user_placeholder'] = "";
        }
        return $leaderboard_data;
    }

    function getLeaderboardHTMLajax ($leaderboard_filter, $leaderboard_period) {
        $query_result = $this->get_leaderboard_query_result($leaderboard_filter, $leaderboard_period);
        return view('fetchLeaderboardHTML', $this->set_leaderboard_data($query_result, $leaderboard_period, $leaderboard_filter));
    }

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
}