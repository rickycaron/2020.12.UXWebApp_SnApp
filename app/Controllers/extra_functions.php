<?php


namespace App\Controllers;


trait extra_functions
{
    private function set_common_data($header_icon_1, $back_route, $header_icon_2) {
        $this->data['base_url'] = base_url();
        //$this->debug_to_console(base_url());
        $this->data['header_icon_1'] = $header_icon_1;
        $this->data['header_icon_2'] = $header_icon_2;
        $this->data['back_route'] = $back_route;
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