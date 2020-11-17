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
     * @param $specieID = i am not sure what would be the best option to give as parameter. specie id or name (depends on the implementation from you code)
     * @param $userID = i am not sure what would be the best option to give as parameter. user id or username (depends on the implementation from you code)
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
     * @param $observationID = is this the best option?
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
     * @param $userID_A = is this the best option?
     * @param $userID_B = is this the best option?
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
     * @param $userGroupID = is this the best option?
     * @param $observationID = is this the best option?
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

    /**
     * @param $userID
     * @return array|array[]|object[]
     */
    public function getUser($userID) {
        $query = $this->db->query('SELECT * FROM a20ux6.user WHERE id = "'.$userID.'";');
        return $query->getResult();
    }

    /**
     * @param $userID
     * @return array|array[]|object[]
     */
    public function getGroupsFromUser($userID) {
        $query = $this->db->query('SELECT name, description
                                        FROM a20ux6.userGroup as g
                                        INNER JOIN a20ux6.userGroupMapping as m on g.id = m.groupID
                                        WHERE m.userID = "'.$userID.'";');
        return $query->getResult();
    }

    /**
     * @param $userID
     * @return array|array[]|object[]
     */
    public function getFriendsFromUser($userID) {
        $query = $this->db->query('SELECT username, email, points
                                        FROM a20ux6.friendsMapping as m , a20ux6.user as u
                                        WHERE CASE WHEN m.userID_A = "'.$userID.'" THEN m.userID_B = u.id
			                                        WHEN m.userID_B = "'.$userID.'" THEN m.userID_A = u.id
		                                        END;');
        return $query->getResult();
    }

    /**
     * @param $userID
     * @return array|array[]|object[]
     */
    public function getTrophysFromUser($userID) {
        $query = $this->db->query('SELECT name, description
                                        FROM a20ux6.trophy as t
                                        INNER JOIN a20ux6.userTrophyMapping as m on t.id = m.trophyID
                                        WHERE m.userID = "'.$userID.'";');
        return $query->getResult();
    }

    /**
     * created by rui
     * @param $email
     * @param $password
     * @return 0 (correct)/1(password is wrong)/2(the user email doesn't exist)/3(multiple enail exsit, this shouldn't happen)
     */
    public function validateUser($email, $password) {
        $query = $this->db->query('SELECT password FROM a20ux6.user WHERE email = "'.$email.'";');
        $searcheresult= $query->getResult();
        if(count($searcheresult)==1){
            $searchedpassword=$query->getRow()->password;
            if(strcmp($searchedpassword,$password)==0)
            {
                return 0;
            }
            else
            {
                //password is incorrect
                return 1;
            }
        }elseif (count($searcheresult)==0){
            //user email doesn't exsit
            return 2;
        }else{
            //there are multiple results
            return 3;
        }
    }

    /**
     * @param $email
     * @return string
     */
    public function getUsername($email) {
        $query = $this->db->query('SELECT username FROM a20ux6.user WHERE email = "'.$email.'";');
        $searcheresult= $query->getResult();
        if(count($searcheresult)==1) {
            $userName = $query->getRow()->username;
            return $userName;
        }
    }

    /**
     * @param ownUserName
     * @return array|array[]|object[]
     */
    public function getObservationForHub($ownUserName) {
        //get own observations from database
        $query = $this->db->query('SELECT EXISTS(SELECT picture, description, specieName, username FROM a20ux6.observation t1 INNER JOIN a20ux6.specie t2 ON t1.specieID = t2.id INNER JOIN a20ux6.user t3 ON t1.userID = t3.id WHERE t1.id = 5 AND username = ' .$ownUserName);
        if (!$query->getRow()->result) {
            return 0;
        }
//        $data = ['userName'=> $query->getRow()->username,
//            'picture' => $query->getRow()->picture,
//            'specieName' => $query->getRow()->specieName,
//            'description' => $query->getRow()->description
//        ];
        return $query->getResult();
    }

    /**
     * Query to get own observations:
     *
     * SELECT picture, description, specieName, username FROM a20ux6.observation t1
     * INNER JOIN a20ux6.specie t2 ON t1.specieID = t2.id
     * INNER JOIN a20ux6.user t3 ON t1.userID = t3.id
     * WHERE username = 'userName';
     *
     */
}