<?php
function conectar(){
    $host="localhost:3308";
    $user="root";
    $pass="";

    $bd="ellita";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>