<?php
include_once "config/conexion.php";

if (!empty($_POST["btningresar"])){

    if (empty($_POST["nickname"]) and empty($_POST["password"])){
        $error="vacio";
        header("Location: index.php?error=$error");
        
    } else {
        $user=$_POST["nickname"];
        $password=$_POST["password"];

        $sql="select * from usuario where correo_cliente='$user' and contrasena='$password'";
        $result=mysqli_query($conexion,$sql);

        if ($datos=mysqli_fetch_object($result)){
            $error= "ok"; 
            header("Location: inicio.php");
        
        } else{
            
            $error="incorrecto";
            header("Location: index.php?error=$error");

        }

    }

} 
?>