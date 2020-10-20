<?php


class Event_model {
    private $db;

    /**
     * EventModel constructor.
     */
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function get_upcoming_events() {
        $query_text = 'SELECT eventid, title, location, email, description, Date_Format(date, "%d-%m-%y") as formatteddate FROM event ORDER BY date ASC';
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

    public function get_upcoming_event_titles($nr_of_titles = 3) {
        $query_text = 'SELECT title FROM event ORDER BY date ASC limit '. $nr_of_titles;
        $query = $this->db->query($query_text);
        return $query->getResult();
    }

}