<?php


namespace App\Controllers;


trait extra_functions
{
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
}