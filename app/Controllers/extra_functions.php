<?php


namespace App\Controllers;


trait extra_functions
{
    function fetchObservationLikeHTML ($observationID) {
        $this->debug_to_console($observationID);
        $like_list = $this->database_model->getLikeListFromObservation($observationID);
        return view('observationLikeList', $like_list);
    }

    function fetchObservationCommentHTML ($observationID) {
        $this->debug_to_console($observationID);
        $comment_list = $this->database_model->getCommentListFromObservation($observationID);
        return view('observationCommentList', $comment_list);
    }
}