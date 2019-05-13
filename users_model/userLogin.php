<?php

    if(session_id()==="" ) {
        session_start();
    }

    include_once("userSelect.php");

   class UserLog {
       public function Login() {
           $username = ISSET($_POST["username"]) ? trim($_POST["username"]) : "";
           $password = ISSET($_POST["password"]) ? trim($_POST["password"]) : "";

           if($username===$_POST["username"] && $password===$_POST["password"]){
                $userLog = new SelectUser();
                $user = $userLog->GetUser($username,$password);
                if($user!=0) {
                    $this->SetUserObjectSession($user);
                    header("Location: report.php");
                    exit;
                }
                return $user;
           }   
       }
       private function SetUserObjectSession($user) {
            $_SESSION["user"] = serialize($user);
            $_SESSION["timeout"] = time();
       }
       public function CheckUserSessionData() {
           if(ISSET($_SESSION["user"],$_SESSION["timeout"])) {
               $inactive = 300;// 5 min
               $sessionTTL = time() - $_SESSION["timeout"];
               if($sessionTTL > $inactive) {
                   $this->Logout();
               }
               $_SESSION["timeout"] = time();
           }
       }
       public function Logout() {
            $this->ClearSession();
            header("Location:../index.php");
            exit;
       }
       private function ClearSession() {
           UNSET($_SESSION["user"],$_SESSION["timeout"]);
       }
   }

    ?>