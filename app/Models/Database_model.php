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
        $userid=session()->get('id');
        $query = $this->db->query('SELECT EXISTS(SELECT * FROM a20ux6.userGroup WHERE name="'.$name.'" AND admin = "'.$userid.'" ) AS result;');
        if ($query->getRow()->result) {
            return 0;
        }
        $data = ['name'=> $name, 'description' => $description,'admin'=>$userid];
        $this->db->table('userGroup')->insert($data);
        $newgroupid=$this->db->query('SELECT * FROM a20ux6.userGroup WHERE name="'.$name.'" AND admin = "'.$userid.'" ;')->getRow()->id;
        $data2 = ['groupID'=>$newgroupid,'userID'=>$userid];
        $this->db->table('userGroupMapping')->insert($data2);
        return 1;
    }


    /**
     * @param $imageData
     * @param $imageProperties
     * @param $description
     * @param $location
     * @param $date
     * @param $time
     * @param $specieID = i am not sure what would be the best option to give as parameter. specie id or name (depends on the implementation from you code)
     * @param $userID = i am not sure what would be the best option to give as parameter. user id or username (depends on the implementation from you code)
     * @return int = 0 if query failed, 1 if query executed successfully.
     */
    public function insertObservation($imageData, $imageProperties, $description, $location, $date, $time , $specieID, $userID) {
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
        $data = [
            'imageData' => $imageData,
            'imageType' => $imageProperties,
            'description' => $description,
            'location' => $location,
            'date' => $date,
            'time' => $time,
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
        return $query->getRow();
    }

    /**
     * @param $email input
     * @return array|array[]|object[]
     */
    public function getUserByEmail($email) {
        $query = $this->db->query('SELECT * FROM a20ux6.user WHERE email = "'.$email.'"  LIMIT 1 ;');
        return $query->getRow();
    }

    /**
     * @param $userID
     * @return array|array[]|object[]
     */
    public function getGroupsFromUser($userID) {
        $query = $this->db->query('SELECT g.id as id, name, description,g.admin
                                        FROM a20ux6.userGroup as g
                                        INNER JOIN a20ux6.userGroupMapping as m on g.id = m.groupID
                                        WHERE m.userID = "'.$userID.'";');
        return $query->getResult();
    }

    /**
     * @param $groupid
     * @return array|array[]|object[]
     */
    public function getGroupMemberNumber($groupid) {
        $query = $this->db->query('SELECT COUNT(*) AS count 
                                        FROM a20ux6.userGroupMapping 
                                        WHERE groupID="'.$groupid.'";');
        return $query->getRow();
    }

    /**
     * @param $groupname_filter, $userID
     * @return array|array[]|object[]
     * This function return te group id by group name and the current user id
     */
    public function getGroupName($groupname_filter, $userID){
        $query = $this->db->query('SELECT m.groupID,m.userID,g.name,g.description 
                                        FROM a20ux6.userGroup as g 
                                        INNER JOIN a20ux6.userGroupMapping as m
                                        ON g.id=m.groupID 
                                        WHERE g.name = "'.$groupname_filter.'" AND userID = "'.$userID.'";');
        return $query->getRow();
    }

    /**
     * @param $groupid
     * @return array|array[]|object[]
     * This function return all the user information of a group
     */
    public function getUsersFromGroup($groupid) {
        $query = $this->db->query('SELECT * FROM a20ux6.userGroupMapping 
                                        where groupID = "'.$groupid.'" 
                                        ORDER BY groupID, userID;');
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
    public function getUserFriendCount($userID) {
        $query = $this->db->query('SELECT count(m.id) as friendCount
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
    public function getUserpoint($userID) {
        $query = $this->db->query('SELECT u.points as pointCount
                                        FROM a20ux6.user as u where u.id = "'.$userID.'"');
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
     * @param $group
     * @param $period
     * @return array|array[]
     */
    public function getLeaderboardFromGroup($group, $period) {
        $query = $this->db->query('SELECT u.id, u.username, u.'.$period.'
                                        FROM a20ux6.user AS u
                                        INNER JOIN a20ux6.userGroupMapping AS m ON u.id = m.userID
                                        INNER JOIN a20ux6.userGroup AS g ON g.id = m.groupID
                                        WHERE g.name = "'.$group.'"
                                        ORDER BY u.'.$period.' DESC;');
        return $query->getResultArray();
    }

    /**
     * @param $period
     * @param $userID
     * @return array|array[]
     */
    public function getFriendLeaderboard($period, $userID) {
        $query = $this->db->query('SELECT u.id, u.username, u.points, u.monthlyPoints, u.weeklyPoints
                                        FROM a20ux6.friendsMapping as m , a20ux6.user as u
                                        WHERE CASE WHEN m.userID_A = "'.$userID.'" THEN m.userID_B = u.id
                                                    WHEN m.userID_B = "'.$userID.'" THEN m.userID_A = u.id
                                                    END
                                        ORDER BY u.'.$period.' DESC;');
        return $query->getResultArray();
    }

    /**
     * @param $period
     * @return array|array[]
     */
    public function getLeaderboardWorldwide($period) {
        $query = $this->db->query('SELECT id, username, points, monthlyPoints, weeklyPoints
                                        FROM a20ux6.user
                                        ORDER BY '.$period.' DESC;');
        return $query->getResultArray();
    }

    /**
     * created by rui
     * @param $email
     * @param $password
     * @return int (correct)/1(password is wrong)/2(the user email doesn't exist)/3(multiple enail exsit, this shouldn't happen)
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
     * @param $userName
     * @return string
     */
    public function getUserID($userName) {
        $query = $this->db->query('SELECT id FROM a20ux6.user WHERE username= "'.$userName.'";');
        return $query->getResult();
    }

    /**
     * @param $specieName
     * @return string
     */
    public function getSpecieID($specieName) {
        $query = $this->db->query('SELECT id FROM a20ux6.specie WHERE specieName= "'.$specieName.'";');
        return $query->getResult();
    }

    /**
     * @param $userID
     * @return array|array[]|object[]
     */
    public function getFriendsUserName($userID) {
        $query = $this->db->query('SELECT username
                                        FROM a20ux6.friendsMapping as m , a20ux6.user as u
                                        WHERE CASE WHEN m.userID_A = "'.$userID.'" THEN m.userID_B = u.id
			                                        WHEN m.userID_B = "'.$userID.'" THEN m.userID_A = u.id
		                                        END;');
        return $query->getResult();
    }

    /**
     * @param $friends
     * @return array|array[]|object[]
     */
    public function getFirstObservationsForHub($friends) {
        //make the query
        $queryString = 'SELECT * FROM (SELECT t1.id, imageData, imageType, description, specieName, username, date, time FROM a20ux6.observation t1 
                                        INNER JOIN a20ux6.specie t2 ON t1.specieID = t2.id INNER JOIN a20ux6.user t3 ON t1.userID = t3.id 
                                        WHERE username = "" ';
        foreach ($friends as $friend):
            $queryString .= 'OR username = "'.$friend->username.'" ';
        endforeach;
        $queryString .= 'ORDER BY date DESC LIMIT 5) AS temp ORDER BY date(date) DESC, time DESC;';
        //get observations from friends from database
        $query = $this->db->query($queryString);
        return $query->getResult();
    }

    /**
     * @param $friends
     * @param $lastDate
     * @param $lastTime
     * @param $tomorrow
     * @return array|array[]|object[]
     */
    public function getMoreObservationsForHub($friends, $lastDate, $tomorrow, $lastTime) {
        //make the query
        $queryString = 'SELECT * FROM (SELECT t1.id, imageData, imageType, description, specieName, username, date, time FROM a20ux6.observation t1 
                                        INNER JOIN a20ux6.specie t2 ON t1.specieID = t2.id INNER JOIN a20ux6.user t3 ON t1.userID = t3.id 
                                        WHERE (username = "" ';
        foreach ($friends as $friend):
            $queryString .= 'OR username = "'.$friend->username.'"';
        endforeach;
        $queryString .= ') AND (date < "'.$lastDate.'" OR (date < "'.$tomorrow.'" AND time < "'.$lastTime.'")) ORDER BY date DESC LIMIT 5) AS temp ORDER BY date(date) DESC, time DESC;';
        //get observations from friends from database
        $query = $this->db->query($queryString);
        return $query->getResult();
    }

    /**
     * @param $observationID
     * @return array|mixed|null
     */
    public function getObservation($observationID) {
        $query = $this->db->query('SELECT * FROM a20ux6.observation WHERE id= "'.$observationID.'";');
        return $query->getRowArray();
    }

    /**
     * @param $specieID
     * @return array|mixed|object|null
     */
    public function getSpecie($specieID) {
        $query = $this->db->query('SELECT * FROM a20ux6.specie WHERE id= "'.$specieID.'";');
        return $query->getRow();
    }

    /**
     * @param $observationID
     * @return array|array[]
     */
    public function getLikeListFromObservation($observationID) {
        $query = $this->db->query('SELECT u.username
                                        FROM a20ux6.user AS u
                                        INNER JOIN a20ux6.like AS l ON  u.id = l.userID
                                        WHERE observationID = "'.$observationID.'";');
        return $query->getResultArray();
    }

    /**
     * @param $observationID
     * @return array|array[]
     */
    public function getCommentListFromObservation($observationID) {
        $query = $this->db->query('SELECT u.username, c.message
                                        FROM a20ux6.user AS u
                                        INNER JOIN a20ux6.comment AS c ON  u.id = c.userID
                                        WHERE observationID = "'.$observationID.'";');
        return $query->getResultArray();
    }

    /**
     * @param $observationID
     * @return string
     */
    public function getObservationCommentCount($observationID) {
        $queryString = 'SELECT count(observationID = "'.$observationID.'") FROM a20ux6.comment;';
        $query = $this->db->query($queryString);
        return $query->getResult();
    }

    /**
     * @param $observationID
     * @return string
     */
    public function getObservationComments($observationID) {
        $queryString = 'SELECT message FROM a20ux6.comment where observationID = "'.$observationID.'";';
        $query = $this->db->query($queryString);
        return $query->getResult();
    }
//
//    /**
//     * @param $group_filter, $userID
//     * @return string
//     */
//    public function getObservationFromGroup($group_filter, $userID) {
//        $queryString = 'SELECT message FROM a20ux6.comment where observationID = "'.$observationID.'";';
//        $query = $this->db->query($queryString);
//        return $query->getResult();
//    }
//
    /**
     * @param $userID
     * @return string
     */
    public function getUserObservationCount($userID) {
        $query = $this->db->query('SELECT COUNT(o.id) AS observationCount FROM a20ux6.user u LEFT JOIN a20ux6.observation o ON o.userID = u.id where u.id = "'.$userID.'";');
        /*if (!$query->getRow()->result) {
            return 0;
        }*/

        return $query->getResult();
    }

    /**
     * @param $userID
     * @return string
     */
    public function getUserCommentCount($userID) {
        $query = $this->db->query('SELECT COUNT(c.id) AS commentCount FROM a20ux6.user u LEFT JOIN a20ux6.comment c ON c.userID = u.id where u.id = "'.$userID.'";');
        /*if (!$query->getRow()->result) {
            return 0;
        }*/

        return $query->getResult();
    }

    /**
     * @param $userID
     * @return string
     */
    public function getUserLikeCount($userID) {
        $query = $this->db->query('SELECT COUNT(l.id) AS likeCount FROM a20ux6.user u LEFT JOIN a20ux6.like l ON l.userID = u.id where u.id = "'.$userID.'";');
        /*if (!$query->getRow()->result) {
            return 0;
        }*/

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