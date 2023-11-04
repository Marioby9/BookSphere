<?php 

    define("HOST", "localhost");
    define("USER_DB", "booksphere");
    define("PASSWORD_DB", "booksphere");
    define("NAME_DB", "booksphere");

    //


    class DB{
        public static $myConnection;

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
            self::connect();
            return mysqli_close(self::$myConnection);
        }

    
        public static function insertUser($pName, $pLast1, $pLast2, $pNickname, $pEmail, $pPassword, $pRol = "user"){
            self::connect();
            return mysqli_query(self::$myConnection, "INSERT INTO user (name, lastname1, lastname2, nickname, email, password, rol) VALUES ('" . $pName . "', '" . $pLast1 . "', '" . $pLast2 . "', '" . $pNickname . "', '" . $pEmail . "', '" . $pPassword . "','". $pRol . "' );");
        }


        public static function getUser($pNickname, $pPassword){
            self::connect();
            return mysqli_query(self::$myConnection, "SELECT * FROM user WHERE nickname == '. $pNickname .' && password == '. $pPassword .' ");
        }


        public static function getAllBooks(){
            self::connect();
            $arrayBooks = array();
            $result = mysqli_query(self::$myConnection, "SELECT * FROM book");

            while($book = mysqli_fetch_assoc($result)){
                $arrayBooks[] = $book;
            }
            return $arrayBooks;
        }

        public static function getBookByColumn($column, $value){
            self::connect();
            $arrayBooks = array();
            $result = mysqli_query(self::$myConnection, "SELECT * FROM book WHERE UPPER($column) LIKE UPPER('%$value%')");
            if($result){
                while($book = mysqli_fetch_assoc($result)){
                    $arrayBooks[] = $book;
                }
                return $arrayBooks;
            }
            else{
                return false;
            }
            
        }

        public static function getSingleBook($id){
            self::connect();
            $result = mysqli_query(self::$myConnection, "SELECT * FROM book WHERE ID = $id");
            $book = mysqli_fetch_assoc($result);
            return $book;
        }

        public static function addCoverBook($id, $img){
            self::connect();
    
            $stmt = self::$myConnection->prepare("UPDATE book SET cover = ? WHERE ID = ?");
            $stmt->bind_param("si", $img, $id);

            $update = $stmt->execute();
            $stmt->close();

            return $update;
        }

        public static function getUserLoans($pID){
            self::connect();
            $userLoans = mysqli_query(self::$myConnection, "SELECT * FROM loan WHERE id_user == $pID");
            return mysqli_fetch_all($userLoans);
        }


        public static function getNumOfLoans($pID){
            self::connect();
            return mysqli_query(self::$myConnection, "SELECT COUNT(*) FROM loan WHERE id_user == $pID");
        }


        public static function getAllUsers(){
            self::connect();
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