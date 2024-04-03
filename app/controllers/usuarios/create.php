<?php







include('../../config.php');

$nombres = $_POST['nombre'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];

if ($password_user == $password_repeat) {
    $password_repeat = password_hash($password_user, PASSWORD_DEFAULT);
    $sentencia = $pdo->prepare("INSERT INTO tb_usuarios 
            (nombre, email, password_user, fyh_creacion) 
    VALUES  (:nombre, :email, :password_user, :fyh_creacion)");

    $sentencia->bindParam('nombre', $nombres);
    $sentencia->bindParam('email', $email);
    $sentencia->bindParam('password_user', $password_user);
    $sentencia->bindParam('fyh_creacion', $fecha_hora);
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje'] = "Se registró al usuario correctamente";
    header('Location: '.$URL.'/usuarios/');
} else {
    // echo "error las contraseñas no son iguales";
    session_start();
    $_SESSION['mensaje'] = "Error las contraseñas no son iguales";
    header('Location: '.$URL.'/usuarios/create.php');
}

?>