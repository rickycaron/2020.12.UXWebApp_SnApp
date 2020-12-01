<?php


namespace App\Controllers;


trait extra_functions
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
        if(isset($person_list[0])) {
            $leaderboard_data['name_first'] = $person_list[0]['username'];
            $leaderboard_data['points_first'] = $person_list[0][$period];
        }
        if(isset($person_list[1]))
        {
            $leaderboard_data['name_second'] = $person_list[1]['username'];
            $leaderboard_data['points_second'] = $person_list[1][$period];
        }
        if(isset($person_list[2]))
        {
            $leaderboard_data['name_third'] = $person_list[2]['username'];
            $leaderboard_data['points_third'] = $person_list[2][$period];
        }
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
            $leaderboard_data['user_placeholder'] = '<li class="list-group-item list-group-item-action d-flex justify-content-between bg-secondary">
                                                        <h1>...</h1>
                                                     </li>
                                                     <li href="#" class="list-group-item list-group-item-action d-flex justify-content-between bg-secondary">
                                                            <h3>'.$current_user["place"].'. '.$current_user["name"].'</h3>
                                                            <!--<img src="'.base_url().'/image/profile.png">-->
                                                            <h3>'.$current_user["point"].'</h3>
                                                            </li>';
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

    function fetchObservationLikeHTML ($observationID) {
        $query_result = $this->database_model->getLikeListFromObservation($observationID);
        $like_data['like_list'] = array();
        foreach ($query_result as $like) {
            array_push($like_data['like_list'], array('username'=>$like['username']));
        }
        return view('observationLikeList', $like_data);
    }

    function fetchObservationCommentHTML ($observationID) {
        $query_result = $this->database_model->getCommentListFromObservation($observationID);
        $comment_data['comment_list'] = array();
        foreach ($query_result as $comment) {
            array_push($comment_data['comment_list'], array('username'=>$comment['username'], 'message'=>$comment['message']));
        }
        return view('observationCommentList', $comment_data);
    }

    function changeLikeStatus ($observationID, $username) {
        $userID = $this->database_model->getUserID($username);
        $query_result = $this->database_model->setUserLikeStatus($userID, $observationID);
    }

    public function addUserToGroup() {

    }

    public function deleteUserFromGroup($memberID, $groupID, $groupName) {
        $this->database_model->deleteUserFromGroup($memberID, $groupID);
        return redirect()->to(base_url().'/groupmembers/'.$groupName);
    }

    public function addFriendToGroup($friendName, $groupName) {
        $userID = $this->database_model->getUserID($friendName);
        $groupID = $this->database_model->getGroupID($groupName);

        //$this->debug_to_console($userID);


        $addFriend = $this->database_model->addFriendToGroup($userID->id, $groupID->id);
        return;
    }
}