<?php  
    
    include_once "./configDB.php";
    $myConnection;


    function connect(){
        $myConnection = mysqli_connect(HOST, USER_DB, PASSWORD_DB, NAME_DB);
        return mysqli_connect_errno() ? false : true;
    }
    
    function close(){
        return mysqli_close($myConnection);
    }

    function insertUser($pName, $pLast1, $pLast2, $pNickname, $pEmail, $pPassword, $pRol){
        connect();
        $inserted = mysqli_query($myConnection, "INSERT INTO user (name, lastname1, lastname2, nickname, email, password, rol) VALUES ('" . $pName . "', '" . $pLast1 . "', '" . $pLast2 . "', '" . $pNickname . "', '" . $pEmail . "', '" . $pPassword . "', '" . $pRol . "' );");
        
        //ALMACENAR RESULTADO EN VARIABLE AUXILIAR
        //LIBERAR RESULTADO
        //CERRAR CONEXION
        //RETORNAR AUXILIAR

        return $inserted;
    }

    function getUser($pNickname, $pPassword){
        connect();
        $user = mysqli_query($mysqli, "SELECT * FROM user WHERE nickname == '. $pNickname .' && password == '. $pPassword .' ");

        return $user;
    }

    function getUserLoans($pID){
        connect();
        $userLoans = mysqli_query($myConnection, "SELECT * FROM loan WHERE id_user == $pID");
        $arrayLoans = mysqli_fetch_all($userLoans);

        return $arrayLoans;
    }

    function getNumOfLoans($pID){
        connect();
        $numOfLoans = mysqli_query($myConnection, "SELECT COUNT(*) FROM loan WHERE id_user == $pID");

        return $numOfLoans;
    }
    

    function getAllUsers(){
        connect();
        $users = mysqli_query($myConnection, "SELECT * FROM user");
        $arrayUsers = mysqli_fetch_all($users);

        return $arrayUsers;
    }


    /*ARRAY ASOCIATIVOS:
    function assocArray(){
        $resultado = mysqli_query($myConnection, "SELECT * FROM user", MYSQLI_ASSOC);
        
    }*/

    //SENTENCIAS PREPARADAS

    if(connect()) echo "CONECTADO";



?>