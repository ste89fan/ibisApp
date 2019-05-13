<?php

    class DBconn {

        private static $conn;

        private static function OpenCon(){
    
            self::$conn = new mysqli("localhost", "root", "","ibis_full_stack");
            
        }
            
        private static function CloseCon(){
            
            self::$conn -> close();
        }

        public static function Select($query) {

            self::OpenCon();

            $result = self::$conn->query($query);
            while($row = $result->fetch_assoc()) {
                $resultArray[] = $row;
            }

            self::CloseCon();

            return ISSET($resultArray) ? $resultArray : null;
        }

    }

    
    ?>