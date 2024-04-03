<?php

include('../../config.php');

$nombres = $_POST['nombre'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];

$sentencia = $pdo->prepare("INSERT INTO tb_usuarios 
            (nombre, email, password_user, fyh_creacion) 
    VALUES  (:nombre, :email, :password_user, :fyh_creacion)");

$sentencia->bindParam('nombre',$nombres);
$sentencia->bindParam('email',$email);
$sentencia->bindParam('password_user',$password_user);
$sentencia->bindParam('fyh_creacion', $fecha_hora);
$sentencia->execute();

?>