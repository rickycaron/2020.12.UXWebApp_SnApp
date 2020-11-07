<?php


class Database_model
{
    private $db;

    /**
     * database_model constructor
     */

    public function __construct() {
        $this->db = \Config\Database::connect();
    }

    /**
     * I was not sure what kind of functions you guys need because most of it depends on the implementation of your part.
     * But here is a list of functions you can use to get/add information information in the database.
     * If you want to add more you can find information on this webpage https://codeigniter.com/user_guide/database/examples.html#
     */


    /**
     * @param $username
     * @param $password
     * @param $email
     * @return int = 0 if the user already exists, 1 if query executed successfully.
     */
    public function insertUser ($username, $password, $email) {
        // check if user already exists or not
        //TODO: change the condition to check if it exists or not
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.user WHERE username="'.$username.'") AS result;');
        if ($query->getRow()->result) {
            return 0;
        }
        $data = ['username'=> $username,
                 'password' => $password,
                 'email' => $email
        ];
        $this->db->table('user')->insert($data);
        return 1;
    }


    /**
     * @param $name
     * @param $points
     * @return int = 0 if the user already exists, 1 if query executed successfully.
     */
    public function insertSpecie ($name, $points) {
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.specie WHERE name="'.$name.'") AS result;');
        if ($query->getRow()->result) {
            return 0;
        }
        $data = ['name'=> $name, 'points' => $points];
        $this->db->table('specie')->insert($data);
        return 1;
    }

    // TODO: test this function
    public function insertTrophy ($name, $description) {
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.trophy WHERE name="'.$name.'") AS result;');
        if ($query->getRow()->result) {
            return 0;
        }
        $data = ['name'=> $name, 'description' => $description];
        $this->db->table('trophy')->insert($data);
        return 1;
    }



























    // TODO: test this function
    public function insertObservation($description, $location, $gender, $date, $amount, $specieID, $userID) {
        $data = ['description'=> $description,
            'location' => $location,
            'gender' => $gender,
            'date' => $date,
            'amount' => $amount,
            'specieID' => $specieID,
            'userID' => $userID
        ];
        $this->db->table('observation')->insert($data);
    }
    // TODO: test this function
    public function insertPhotoPath ($url, $observationID) {
        $data = ['url'=> $url, 'observationID' => $observationID];
        $this->db->table('photoPath')->insert($data);
    }

    // TODO: test this function
    public function insertGroup ($name, $description) {
        $data = ['name'=> $name, 'description' => $description];
        $this->db->table('userGroup')->insert($data);
    }

    // TODO: test this function
    public function insertFriendsMapping($userID_A, $userID_B) {
        $data = ['userID_A'=> $userID_A, 'userID_B' => $userID_B];
        $this->db->table('friendsMapping')->insert($data);
    }

    // TODO: test this function
    public function insertGroupObservationMapping($userGroupID, $observationID) {
        $data = ['userGroupID'=> $userGroupID, 'observationID' => $observationID];
        $this->db->table('groupObservationMapping')->insert($data);
    }

    // TODO: test this function
    public function insertUserGroupMapping($userID, $groupID) {
        $data = ['userID'=> $userID, 'groupID' => $groupID];
        $this->db->table('userGroupMapping')->insert($data);
    }

    // TODO: test this function
    public function insertTrophyMapping($userID, $trophyID) {
        $data = ['userID'=> $userID, 'trophyID' => $trophyID];
        $this->db->table('userGroupMapping')->insert($data);
    }
}