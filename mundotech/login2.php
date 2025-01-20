<?php 	
    include "includes/conexion.php";
    $usuario = mysqli_real_escape_string($mysqli,$_POST["usuario"]); 
    $password = mysqli_real_escape_string($mysqli,$_POST["password"]); 
    $query = "SELECT * FROM usuarios WHERE usuario='$usuario'"; 
    $consulta = mysqli_query($mysqli,$query); 
    if($result = mysqli_query($mysqli,$query)){ 
	    while($fila = mysqli_fetch_array($result)){
            $hash = $fila['password'];  
        }
    }
    if(password_verify($password, $hash)){ 
        session_start();
        $_SESSION['usuario'] = $usuario;
        echo '<script type="text/javascript">location.href="index2.php"</script>';
    }else{
        echo '<script type="text/javascript">location.href="login.php"</script>';
    }
?>