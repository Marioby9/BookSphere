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
            try {
                $passwordHash = password_hash($pPassword, PASSWORD_BCRYPT);
                $insert = mysqli_query(self::$myConnection, "INSERT INTO user (name, lastname1, lastname2, nickname, email, password, rol) VALUES ('" . $pName . "', '" . $pLast1 . "', '" . $pLast2 . "', '" . $pNickname . "', '" . $pEmail . "', '" . $passwordHash . "','". $pRol . "' );");
                return $insert;
            } catch (\Throwable $th) {
                return false;
            } 
        }


        public static function getUser($pNickname, $pPassword){
            self::connect();
            try {
                $result = mysqli_query(self::$myConnection, "SELECT * FROM user WHERE nickname = '".$pNickname."' AND unsubscribe_date IS NULL");
                if($result && mysqli_num_rows($result) == 1){
                    $user = mysqli_fetch_assoc($result);
                    $passwordHash = $user['password'];
                    return password_verify($pPassword, $passwordHash) ? $user : false;
                }
                else{
                    return false;
                }
            } catch (\Throwable $th) {
                echo $th;
                return false;
            }
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


        public static function getLastBooks(){
            self::connect();
            $arrayBooks = array();
            $result = mysqli_query(self::$myConnection, "SELECT * FROM book ORDER BY ID DESC LIMIT 3");

            while($book = mysqli_fetch_assoc($result)){
                $arrayBooks[] = $book;
            }
            return $arrayBooks;
        }

        public static function getMostPopularBooks(){
            self::connect();

            $arrayBooks = array();
            $query = "SELECT book.*, COUNT(loan.id_book) AS numLoans
            FROM book
            JOIN loan ON book.id = loan.id_book
            GROUP BY book.id
            ORDER BY numLoans DESC
            LIMIT 3";
            $result = mysqli_query(self::$myConnection, $query);

            while($book = mysqli_fetch_assoc($result)){
                $arrayBooks[] = $book;
            }
            return $arrayBooks;
        }

        public static function getMyLastLoans($userID){
            self::connect();

            try {
                $arrayBooks = array();
                $query = "SELECT book.id, book.title, book.author, loan.start_loan
                FROM book
                JOIN loan ON book.id = loan.id_book
                WHERE ID_USER = ". $userID ." 
                ORDER BY start_loan DESC
                LIMIT 5";
                $result = mysqli_query(self::$myConnection, $query);

                while($book = mysqli_fetch_assoc($result)){
                    $arrayBooks[] = $book;
                }
                return $arrayBooks;
            } catch (\Throwable $th) {
                echo $th;
            }
            
        }

        public static function getAllMyBooks($userID){
            self::connect();

            try {
                $arrayBooks = array();
                $query = "SELECT book.id, book.title, book.author, book.genre, loan.*
                FROM book
                JOIN loan ON book.id = loan.id_book
                WHERE ID_USER = $userID 
                GROUP BY book.id 
                ORDER BY loan.end_loan";
                $result = mysqli_query(self::$myConnection, $query);

                while($book = mysqli_fetch_assoc($result)){
                    $arrayBooks[] = $book;
                }
                return $arrayBooks;
            } catch (\Throwable $th) {
                echo $th;
            }
        }

        public static function getCurrentlyReading($userID){
            self::connect();

            try {
                $arrayBooks = array();
                $query = "SELECT book.id, book.title, book.author, book.genre, loan.*
                FROM book
                JOIN loan ON book.id = loan.id_book
                WHERE ID_USER = $userID AND loan.end_loan IS NULL
                GROUP BY book.id 
                ORDER BY loan.end_loan";
                $result = mysqli_query(self::$myConnection, $query);

                while($book = mysqli_fetch_assoc($result)){
                    $arrayBooks[] = $book;
                }
                return $arrayBooks;
            } catch (\Throwable $th) {
                echo $th;
            }
        }

        public static function getFavoriteBooks($userID){
            self::connect();

            try {
                $arrayBooks = array();
                $query = "SELECT book.id, book.title, book.cover, count(*) as veces_leido
                          FROM book JOIN loan ON book.id = loan.id_book 
                          WHERE ID_USER = $userID 
                          GROUP BY book.id 
                          ORDER BY veces_leido DESC 
                          LIMIT 3;";
                $result = mysqli_query(self::$myConnection, $query);

                while($book = mysqli_fetch_assoc($result)){
                    $arrayBooks[] = $book;
                }
                return $arrayBooks;
            } catch (\Throwable $th) {
                echo $th;
            }
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

        public static function getSingleUser($id) {
            self::connect();

            try {
                $query = "SELECT * FROM user WHERE ID LIKE $id";
                $result = mysqli_query(self::$myConnection, $query);
                if($result){
                    $user = mysqli_fetch_assoc($result);
                    return $user;
                }
                else{
                    return false;
                }
                
            } catch (\Throwable $th) {
                echo $th;
                return false;
            }
        }

        public static function insertLoan($userID, $bookID){
            self::connect();
            try {
                $insert = mysqli_query(self::$myConnection, "INSERT INTO loan (id_user, id_book) VALUES ('" . $userID . "', '" . $bookID . "');");
                if($insert){
                    $updated = mysqli_query(self::$myConnection, "UPDATE book SET available = false WHERE id = ". $bookID);
                    return $updated;
                }   
                else{
                    return false;
                }
            } catch (\Throwable $th) {
                return false;
            } 
        }

        public static function finishLoan($userID, $bookID){
            self::connect();
            try {
                $updateLoan = mysqli_query(self::$myConnection, "UPDATE loan SET end_loan = CURDATE() WHERE id_user = ". $userID . " AND id_book = " . $bookID . " AND end_loan IS NULL;");
                $updateBook = mysqli_query(self::$myConnection, "UPDATE book SET available = true WHERE id = ". $bookID);
                return ($updateLoan && $updateBook);
            } catch (\Throwable $th) {
                echo $th;
                return false;
            }
        }

        public static function isMyBook($userID, $bookID){
            self::connect();
            try {
                $result = mysqli_query(self::$myConnection, "SELECT ID FROM loan WHERE id_user = ".$userID." AND id_book = ".$bookID." AND end_loan is NULL;");
                return ($result && mysqli_num_rows($result) == 1);
            } catch (\Throwable $th) {
                echo $th;
                return false;
            }
        }


        public static function getTotalUserLoans($pID){
            self::connect();
            try {
                $result =  mysqli_query(self::$myConnection, "SELECT COUNT(*) as TOTAL FROM loan WHERE id_user = $pID");
                $row = mysqli_fetch_assoc($result);
                return $row["TOTAL"];
            } catch (\Throwable $th) {
                echo $th;
                return 0;
            }
        }

        public static function getLastMonthBooks($pID){
            self::connect();
            $currentDate = date("Y-m-d");
            $lastMonthDate = date("Y-m-d", strtotime("-1 month"));
            try {
                $result =  mysqli_query(self::$myConnection, "SELECT COUNT(*) as TOTAL FROM loan WHERE id_user = $pID AND start_loan BETWEEN '$lastMonthDate' AND '$currentDate'");
                $row = mysqli_fetch_assoc($result);
                return $row["TOTAL"];
            } catch (\Throwable $th) {
                echo $th;
                return 0;
            }
        }

        public static function getFavoriteUserGenre($pID){
            self::connect();
            try {
                $query = "SELECT book.genre, COUNT(loan.id_book) AS numLoans
                FROM book
                JOIN loan ON book.id = loan.id_book
                WHERE loan.id_user = $pID
                GROUP BY book.genre
                ORDER BY numLoans DESC";
                $result = mysqli_query(self::$myConnection, $query);

                $row = mysqli_fetch_assoc($result);

                return $row ? $row["genre"] : "No hay libros";
            } catch (\Throwable $th) {
                echo $th;
                return 0;
            }
        }


        /*--------------------------------ADMIN---------------------------------------------*/
        public static function getLastUsers(){
            self::connect();

            try {
                $arrayUsers = array();
                $query = "SELECT *
                FROM user
                ORDER BY signup_date DESC";
                $result = mysqli_query(self::$myConnection, $query);

                while($user = mysqli_fetch_assoc($result)){
                    $arrayUsers[] = $user;
                }
                return $arrayUsers;
            } catch (\Throwable $th) {
                echo $th;
            }
        }

        public static function getMostActiveUsers(){
            self::connect();

            try {
                $arrayUsers = array();
                $query = "SELECT USER.*, COUNT(*) AS TOTAL_LIBROS FROM USER JOIN LOAN ON USER.ID = LOAN.id_user GROUP BY user.id ORDER BY TOTAL_LIBROS DESC LIMIT 3";
                $result = mysqli_query(self::$myConnection, $query);

                while($user = mysqli_fetch_assoc($result)){
                    $arrayUsers[] = $user;
                }
                return $arrayUsers;
            } catch (\Throwable $th) {
                echo $th;
            }
        }

        public static function getAllUsers(){
            self::connect();

            try {
                $arrayUsers = array();
                $query = "SELECT * FROM user ORDER BY signup_date DESC";
                $result = mysqli_query(self::$myConnection, $query);

                while($user = mysqli_fetch_assoc($result)){
                    $arrayUsers[] = $user;
                }
                return $arrayUsers;
            } catch (\Throwable $th) {
                echo $th;
            }
        }

        public static function getUsersByColumn($pFilter, $pKeyword){
            self::connect();

            try {
                $arrayUsers = array();
                $query = "SELECT * FROM user WHERE UPPER($pFilter) LIKE UPPER('%$pKeyword%')";
                $result = mysqli_query(self::$myConnection, $query);

                while($user = mysqli_fetch_assoc($result)){
                    $arrayUsers[] = $user;
                }
                return $arrayUsers;
            } catch (\Throwable $th) {
                return [];
            }
        }

        public static function getAdminBooks(){
            self::connect();
    
            try {
                $arrayUsers = array();
                $query = "SELECT book.*, count(loan.id_book) AS VECES_PRESTADO FROM book LEFT JOIN loan on book.id = loan.id_book GROUP BY book.id";
                $result = mysqli_query(self::$myConnection, $query);
    
                while($user = mysqli_fetch_assoc($result)){
                    $arrayUsers[] = $user;
                }
                return $arrayUsers;
            } catch (\Throwable $th) {
                echo $th;
            }
        }

        public static function getAdminBooksByColumn($pFilter, $pKeyword){ //ARREGLAR CUANDO AL HAVING COUNT LE PASO UN 0!!!
            self::connect();
    
            try {
                $arrayUsers = array();
                if($pFilter == "VECES_PRESTADO"){
                    $query = "SELECT book.*, count(loan.id_book) AS VECES_PRESTADO FROM book LEFT JOIN loan on book.id = loan.id_book GROUP BY book.id HAVING VECES_PRESTADO = $pKeyword";
                }
                else{
                    $query = "SELECT book.*, count(loan.id_book) AS VECES_PRESTADO FROM book LEFT JOIN loan on book.id = loan.id_book WHERE UPPER($pFilter) LIKE UPPER('%$pKeyword%') GROUP BY book.id";
                }
                $result = mysqli_query(self::$myConnection, $query);

                while($user = mysqli_fetch_assoc($result)){
                    $arrayUsers[] = $user;
                }
                return $arrayUsers;
            } catch (\Throwable $th) {
                return [];
            }
        }

        public static function insertBook($pISBN, $pTitle, $pAuthor, $pPublisher, $pLanguage, $pGenre, $pYear, $pSynopsis, $pCover){
            self::connect();

            try {
                $stmt = self::$myConnection->prepare("INSERT INTO book (isbn, title, author, publisher, language, genre, year, synopsis, cover) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssiss", $pISBN, $pTitle, $pAuthor, $pPublisher, $pLanguage, $pGenre, $pYear, $pSynopsis, $pCover);
                
                $insert = $stmt->execute();
                
                $stmt->close();

                return $insert;
            } catch (\Throwable $th) {
                echo $th;
                return false;
            } 
        }

        public static function deleteBook($pID){
            self::connect();
            try {
                mysqli_query(self::$myConnection, "DELETE from book WHERE id = $pID");
                if (mysqli_affected_rows(self::$myConnection) > 0) {
                    return true;  
                } else {
                    return false; 
                }
            } catch (\Throwable $th) {
                return false;
            }
        }

        public static function deleteAccount($pID){
            self::connect();
            try {
                mysqli_query(self::$myConnection, "UPDATE user SET unsubscribe_date = CURDATE() WHERE id = $pID");
                if (mysqli_affected_rows(self::$myConnection) > 0) {
                    return true;  
                } else {
                    return false; 
                }
            } catch (\Throwable $th) {
                return false;
            }
        }

        public static function restoreUser($pID){
            self::connect();
            try {
                $restored = mysqli_query(self::$myConnection, "UPDATE user SET unsubscribe_date = NULL WHERE id = $pID");
                if (mysqli_affected_rows(self::$myConnection) > 0) {
                    return true;  
                } else {
                    return false; 
                }
            } catch (\Throwable $th) {
                return false;
            }
        }



    }

?>