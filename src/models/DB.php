<?php  
    include_once "../models/configDB.php";
    class DB{

        private static $myConnection = null;

        //

        public static function connect(){
            try {
                self::$myConnection = mysqli_connect(HOST, USER_DB, PASSWORD_DB, NAME_DB); 
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
        

        public static function close(){
            return mysqli_close(self::$myConnection);
        }

    
        public static function insertUser($pName, $pLast1, $pLast2, $pNickname, $pEmail, $pPassword, $pRol = "user"){
            return mysqli_query(self::$myConnection, "INSERT INTO user (name, lastname1, lastname2, nickname, email, password, rol) VALUES ('" . $pName . "', '" . $pLast1 . "', '" . $pLast2 . "', '" . $pNickname . "', '" . $pEmail . "', '" . $pPassword . "','". $pRol . "' );");
        }


        public static function getUser($pNickname, $pPassword){
            return mysqli_query(self::$myConnection, "SELECT * FROM user WHERE nickname == '. $pNickname .' && password == '. $pPassword .' ");
        }


        public static function getUserLoans($pID){
            $userLoans = mysqli_query(self::$myConnection, "SELECT * FROM loan WHERE id_user == $pID");
            return mysqli_fetch_all($userLoans);
        }


        public static function getNumOfLoans($pID){
            return mysqli_query(self::$myConnection, "SELECT COUNT(*) FROM loan WHERE id_user == $pID");
        }


        public static function getAllUsers(){
            $users = mysqli_query(self::$myConnection, "SELECT * FROM user");
            return mysqli_fetch_all($users);
        }
    



    }




    /*ARRAY ASOCIATIVOS:
    function assocArray(){
        $resultado = mysqli_query($myConnection, "SELECT * FROM user", MYSQLI_ASSOC);
        
    }*/

    //SENTENCIAS PREPARADAS



?>