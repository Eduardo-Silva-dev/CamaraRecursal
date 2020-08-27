<?php
if(!function_exists("protect")){
    function protect(){
        if(!isset($_SESSION)){
            session_start();}
            if( !isset($_SESSION['usuario']) || $_SESSION['usuario']===null ){
               header("Location: index.php");
            }
    }
}
?>