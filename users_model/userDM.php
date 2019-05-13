<?php

    class UserDm {
        private $id;
        private $username;
        private $password;

        public function Setid($id) {
            $this->id = $id;
        }

        public function Setusername($username) {
            $this->username = $username;
        }

        public function Setpassword($password) {
            $this->password = $password;
        }

        public function Getid() {
            return $this->id;
        }

        public function Getusername() {
            return $this->username;
        }

        public function Getpassword() {
            return $this->password;
        }

        public function SetUser($id,$username,$password) {

            $this->Setid($id);
            $this->Setusername($username);
            $this->Setpassword($password);
        }

    }


    ?>