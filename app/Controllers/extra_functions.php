<?php


namespace App\Controllers;


trait extra_functions
{
    public function fetchFriendsLeaderboard($period) {
        $query_result = $this->database_model->getFriendLeaderboard($period, session()->get('id'));
        return view('fetchLeaderboardHTML', $this->set_leaderboard_data($query_result, $period));
    }

    public function fetchWorldwideLeaderboard($period) {
        $query_result = $this->database_model->getLeaderboardWorldwide($period);
        return view('fetchLeaderboardHTML', $this->set_leaderboard_data($query_result, $period));
    }

    public function fetchGroupLeaderboard($group, $period) {
        $query_result = $this->database_model->getLeaderboardFromGroup($group, $period);
        return view('fetchLeaderboardHTML', $this->set_leaderboard_data($query_result, $period));
    }

    private function set_leaderboard_data($person_list, $period) {
        //fill in the first podium data
        if(isset($person_list[0])) {
            $leaderboard_data['id_first'] = $person_list[0]['id'];
            $leaderboard_data['name_first'] = $person_list[0]['username'];
            $leaderboard_data['points_first'] = $person_list[0][$period];
        }
        if(isset($person_list[1]))
        {
            $leaderboard_data['id_second'] = $person_list[1]['id'];
            $leaderboard_data['name_second'] = $person_list[1]['username'];
            $leaderboard_data['points_second'] = $person_list[1][$period];
        }
        if(isset($person_list[2]))
        {
            $leaderboard_data['id_third'] = $person_list[2]['id'];
            $leaderboard_data['name_third'] = $person_list[2]['username'];
            $leaderboard_data['points_third'] = $person_list[2][$period];
        }
        //fill in all the others places
        $leaderboard_data['persons_list'] = array();

        $worse_then_tenth_flag = 0;
        $current_user = 0;
        //$this->debug_to_console(count((array)$person_list));
        for ($i = 3; $i < count((array)$person_list); $i++) {
            array_push($leaderboard_data['persons_list'], array('place'=>($i+1), 'name'=>$person_list[$i]['username'], 'point'=>$person_list[$i][$period], 'id'=>$person_list[$i]['id']));
            if (session()->get('id') == $person_list[$i]['id'] && $i > 9) {
                $worse_then_tenth_flag = 1;
                $current_user = array('place'=>($i+1),'name'=>$person_list[$i]['username'], 'point'=>$person_list[$i][$period], 'id'=>$person_list[$i]['id']);
            }
        }
        if ($worse_then_tenth_flag) {
            $leaderboard_data['user_placeholder'] = '<li class="list-group-item list-group-item-action d-flex justify-content-between bg-secondary">
                                                        <h1>...</h1>
                                                     </li>
                                                     <a class="w-100 active" href="'.base_url().'/otheruserprofile/'.$current_user["id"].'">
                                                         <li class="list-group-item list-group-item-action d-flex justify-content-between bg-secondary">
                                                                <h5 class="mb-0">'.$current_user["place"].'. '.$current_user["name"].'</h5>
                                                                <!--<img src="'.base_url().'/image/profile.png">-->
                                                                <h5 class="mb-0">'.$current_user["point"].'</h5>
                                                         </li>
                                                     </a>';
        }
        else {
            $leaderboard_data['user_placeholder'] = "";
        }
        return $leaderboard_data;
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


    function changeLikeStatus ($observationID) {

        $userID = session()->get('id');
        $query_result = $this->database_model->setUserLikeStatus($userID, $observationID);
        return;
    }

    function sendComment ($comment, $observationID) {

        $userID = session()->get('id');
        $query_result = $this->database_model->insertComment($userID, $comment, $observationID);//insertComment ($userID, $message, $observationID)
        return;
    }

    function cancelLikeStatus ($observationID) {
        $userID = session()->get('id');
        $this->database_model->cancelUserLikeStatus($userID, $observationID);
        return;
    }

    function getUsername () {
        return session()->get('username');
    }

    function checkUserLikeStatus ($observationID) {
        $userID = session()->get('id');
        $status = $this->database_model->checkUserLikeStatus($userID, $observationID);
        return $status;
    }

    function acceptFriendRequest($mappingID) {
        $this->database_model->setFriendsMappingStatus($mappingID, 1);
        return "<p>$mappingID</p>";
    }

    function declineFriendRequestOrDelete($mappingID) {
        $this->database_model->deleteFriendsMapping($mappingID);
        return "<p>$mappingID</p>";
    }

    function sendFriendRequest($userID_reciever) {
        if(!$this->database_model->insertFriendsMapping(session()->get('id'), $userID_reciever)) {
            $this->debug_to_console("failed to insert friendsmapping");
        }
        return "<p>$userID_reciever</p>";
    }

    public function deleteUserFromGroup($memberID, $groupID, $groupName) {
        $this->database_model->deleteUserFromGroup($memberID, $groupID);
        return redirect()->to(base_url().'/groupmembers/'.$groupName);
    }

    public function addFriendToGroup($friendName, $groupName) {
        $userID = $this->database_model->getUserID($friendName);
        $groupID = $this->database_model->getGroupID($groupName);
        $this->database_model->addFriendToGroup($userID->id, $groupID->id);
        return;
    }

    private function passwordHash($password){
        return password_hash($password,PASSWORD_BCRYPT);
    }

    public function searchGetObservations($filter) {
        $result['ob'] = $this->database_model->getObservationDescription($filter);
        if($result['ob'] != null) {
           return view('searchObservation', $result);
        }
        return "<h3>Observations:</h3>
                <p>no observations found</p>";
    }

    public function searchGetGroups($filter) {
        $result['group'] = $this->database_model->getGroup($filter);
        if($result['group'] != null) {
            return view('searchGroup', $result);
        }
        return "<h3>Groups:</h3>
                <p>no groups found</p>";
    }

    public function searchGetUsers($filter) {
        $filter = str_replace("SPACE", " ", $filter);
        $users = $this->database_model->getUsersSearch($filter);
        foreach ($users as $u) {
            $u->encoded_image = $this->encode_image($u->p_imagedata, $u->p_imagetype);
        }
        $result['user'] = $users;
        if($result['user'] != null) {
            return view('searchUser', $result);
        }
        return "<h3>Users:</h3>
                <p>no users found</p>";
    }

    public function encode_image($file, $mime)
    {
        $base64   = base64_encode($file);
        return ('data:' . $mime . ';base64,' . $base64);
    }
}