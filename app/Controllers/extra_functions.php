<?php


namespace App\Controllers;


trait extra_functions
{
    function fetchObservationLikeHTML ($observationID) {
        $this->debug_to_console($observationID);
        return "<h1><?=$observationID?> show likes</h1>";
    }

    function fetchObservationCommentHTML ($observationID) {
        $this->debug_to_console($observationID);
        return "<h1><?=$observationID?> show comments</h1>";
    }
}