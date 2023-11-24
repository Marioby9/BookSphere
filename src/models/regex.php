<?php 
//AQUI HAREMOS LAS COMPROBACIONES CON PREGMATCH O CON VALIDACIONES DE DATOS/SANEAMIENTO

function validarCorreo($correo) {
    
    $patron = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';

    
    if (preg_match($patron, $correo)) {
        return true; // El correo es válido
    } else {
        return false; // El correo no es válido
    }
}

?>