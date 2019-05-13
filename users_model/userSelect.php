<?php
    
    include_once("dbconnection.php");
    include_once("userDM.php");
    
    
    class SelectUser {
        public function GetUser($username,$password) {
            $query = sprintf("SELECT id,username,password FROM users
                        WHERE username = '%s'
                        AND password = '%s'
                        ",$username,$password);
            
            $userResult = DBconn::Select($query);

            if($userResult != null) {
                $user = new UserDm();
                $userArray = $userResult[0];
                $user->SetUser($userArray["id"],
                                $userArray["username"],
                                $userArray["password"]
                            );
            }
            return ISSET($user) ? $user : null;
        }
    }

    ?>