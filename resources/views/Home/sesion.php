<?php
require 'conexion_postgres.php';
session_start();
$usuario=$_POST['user'];
$contra=$_POST['pass'];

$query= "SELECT * FROM usuarios WHERE user='$usuario' AND pass='$contra'";
$consulta = pg_query($conexion,$query);
$cantidad = pg_num_rows($consulta);
if($cantidad>0){
    //$_SESSION['nombre_usuario']=$usuario;
    header("location ingreso.php");
}
else{
    echo "Datos invalidos";
}
?>