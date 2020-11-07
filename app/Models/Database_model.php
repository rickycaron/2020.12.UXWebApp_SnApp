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
     * @return int = 0 if query failed, 1 if query executed successfully.
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
     * @return int = 0 if query failed, 1 if query executed successfully.
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

    /**
     * @param $name
     * @param $description
     * @return int = 0 if query failed, 1 if query executed successfully.
     */
    public function insertTrophy ($name, $description) {
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.trophy WHERE name="'.$name.'") AS result;');
        if ($query->getRow()->result) {
            return 0;
        }
        $data = ['name'=> $name, 'description' => $description];
        $this->db->table('trophy')->insert($data);
        return 1;
    }

    /**
     * @param $name
     * @param $description
     * @return int = 0 if query failed, 1 if query executed successfully.
     */
    // TODO: how should we make it so that you can make multiple groups with the same name but from different users -> maybe ask Aquel?
    public function insertGroup ($name, $description) {
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.userGroup WHERE name="'.$name.'") AS result;');
        if ($query->getRow()->result) {
            return 0;
        }
        $data = ['name'=> $name, 'description' => $description];
        $this->db->table('userGroup')->insert($data);
        return 1;
    }


    /**
     * @param $description
     * @param $location
     * @param $gender
     * @param $date
     * @param $amount
     * @param $specieID i am not sure what would be the best option to give as parameter. specie id or name (depends on the implementation from you code)
     * @param $userID i am not sure what would be the best option to give as parameter. user id or username (depends on the implementation from you code)
     * @return int = 0 if query failed, 1 if query executed successfully.
     */
    public function insertObservation($description, $location, $gender, $date, $amount, $specieID, $userID) {
        //check if specie exists
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.specie WHERE id="'.$specieID.'") AS result;');
        if (!$query->getRow()->result) {
            return 0;
        }
        //check if user exists
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.user WHERE id="'.$userID.'") AS result;');
        if (!$query->getRow()->result) {
            return 0;
        }
        $data = ['description'=> $description,
            'location' => $location,
            'gender' => $gender,
            'date' => $date,
            'amount' => $amount,
            'specieID' => $specieID,
            'userID' => $userID
        ];
        $this->db->table('observation')->insert($data);
        return 1;
    }


    /**
     * @param $url
     * @param $observationID is this the best option?
     * @return int = 0 if query failed, 1 if query executed successfully.
     */
    public function insertPhotoPath ($url, $observationID) {
        //check if photo path exists
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.observation WHERE id="'.$observationID.'") AS result;');
        if (!$query->getRow()->result) {
            return 0;
        }
        $data = ['url'=> $url, 'observationID' => $observationID];
        $this->db->table('photoPath')->insert($data);
        return 1;
    }

    /**
     * @param $userID_A this the best option?
     * @param $userID_B this the best option?
     * @return int = 0 if query failed, 1 if query executed successfully.
     */
    public function insertFriendsMapping($userID_A, $userID_B) {
        if ($userID_A == $userID_B) return 0;
        // check if both users exist
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.user WHERE id="'.$userID_A.'") AS result;');
        if (!$query->getRow()->result) return 0;
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.user WHERE id="'.$userID_B.'") AS result;');
        if (!$query->getRow()->result) return 0;
        //check if friend mapping already exists (query takes care of both directions)
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.friendsMapping 
                                                     WHERE (userID_A="'.$userID_A.'" AND userID_B="'.$userID_B.'") OR (userID_A="'.$userID_B.'" AND userID_B="'.$userID_A.'")) 
                                                     AS result;');
        if ($query->getRow()->result) return 0;

        $data = ['userID_A'=> $userID_A, 'userID_B' => $userID_B];
        $this->db->table('friendsMapping')->insert($data);
        return 1;
    }

    /**
     * @param $userGroupID is this the best option?
     * @param $observationID is this the best option?
     * @return int = 0 if query failed, 1 if query executed successfully.
     */
    public function insertGroupObservationMapping($userGroupID, $observationID) {
        // check if both entities exist
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.userGroup WHERE id="'.$userGroupID.'") AS result;');
        if (!$query->getRow()->result) return 0;
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.observation WHERE id="'.$observationID.'") AS result;');
        if (!$query->getRow()->result) return 0;
        //check if mapping already exists
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.groupObservationMapping 
                                                     WHERE userGroupID="'.$userGroupID.'" AND observationID="'.$observationID.'") 
                                                     AS result;');
        if ($query->getRow()->result) return 0;

        $data = ['userGroupID'=> $userGroupID, 'observationID' => $observationID];
        $this->db->table('groupObservationMapping')->insert($data);
        return 1;
    }

    /**
     * @param $userID = is this the best option?
     * @param $groupID = is  this the best option?
     * @return int = 0 if query failed, 1 if query executed successfully.
     */
    public function insertUserGroupMapping($userID, $groupID) {
        // check if both entities exist
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.userGroup WHERE id="'.$groupID.'") AS result;');
        if (!$query->getRow()->result) return 0;
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.user WHERE id="'.$userID.'") AS result;');
        if (!$query->getRow()->result) return 0;
        //check if mapping already exists
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.userGroupMapping
                                                     WHERE userID="'.$userID.'" AND groupID="'.$groupID.'") 
                                                     AS result;');
        if ($query->getRow()->result) return 0;

        $data = ['userID'=> $userID, 'groupID' => $groupID];
        $this->db->table('userGroupMapping')->insert($data);
        return 1;
    }

    /**
     * @param $userID = is this the best option?
     * @param $trophyID = is this the best option?
     * @return int = 0 if query failed, 1 if query executed successfully.
     */
    public function insertTrophyMapping($userID, $trophyID) {
        // check if both entities exist
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.user WHERE id="'.$userID.'") AS result;');
        if (!$query->getRow()->result) return 0;
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.trophy WHERE id="'.$trophyID.'") AS result;');
        if (!$query->getRow()->result) return 0;
        //check if mapping already exists
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.userTrophyMapping
                                                     WHERE userID="'.$userID.'" AND trophyID="'.$trophyID.'") 
                                                     AS result;');
        if ($query->getRow()->result) return 0;

        $data = ['userID'=> $userID, 'trophyID' => $trophyID];
        $this->db->table('userTrophyMapping')->insert($data);
        return 1;
    }
}