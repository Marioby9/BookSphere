<?php  
    include_once "../models/configDB.php";


    function connect(){
        return mysqli_connect(HOST, USER_DB, PASSWORD_DB, NAME_DB); 
    }
    
    function close($myConnection){
        return mysqli_close($myConnection);
    }

    function insertUser($pName, $pLast1, $pLast2, $pNickname, $pEmail, $pPassword, $pRol = "user"){
        $myConnection = connect();
        $inserted = mysqli_query($myConnection, "INSERT INTO user (name, lastname1, lastname2, nickname, email, password, rol) VALUES ('" . $pName . "', '" . $pLast1 . "', '" . $pLast2 . "', '" . $pNickname . "', '" . $pEmail . "', '" . $pPassword . "','". $pRol . "' );");
        close($myConnection);
        return $inserted;
    }

    function getUser($pNickname, $pPassword){
        $myConnection = connect();
        $user = mysqli_query($myConnection, "SELECT * FROM user WHERE nickname == '. $pNickname .' && password == '. $pPassword .' ");
        close($myConnection);
        return $user;
    }

    function getUserLoans($pID){
        $myConnection = connect();
        $userLoans = mysqli_query($myConnection, "SELECT * FROM loan WHERE id_user == $pID");
        $arrayLoans = mysqli_fetch_all($userLoans);
        close($myConnection);
        return $arrayLoans;
    }

    function getNumOfLoans($pID){
        $myConnection = connect();
        $numOfLoans = mysqli_query($myConnection, "SELECT COUNT(*) FROM loan WHERE id_user == $pID");
        close($myConnection);
        return $numOfLoans;
    }
    

    function getAllUsers(){
        $myConnection = connect();
        $users = mysqli_query($myConnection, "SELECT * FROM user");
        $arrayUsers = mysqli_fetch_all($users);
        close($myConnection);
        return $arrayUsers;
    }


    /*ARRAY ASOCIATIVOS:
    function assocArray(){
        $resultado = mysqli_query($myConnection, "SELECT * FROM user", MYSQLI_ASSOC);
        
    }*/

    //SENTENCIAS PREPARADAS



?>