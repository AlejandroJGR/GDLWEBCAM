<?php 
include_once'funciones/funciones.php';


if (isset($_POST['login-admin'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
	try { 
        $stmt=$conn->prepare("SELECT * FROM `administradores` WHERE `username` = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->bind_result($id_admin, $admin_name, $username_admin, $password_admin, $edited, $level);
        if($stmt->affected_rows){
            $existe=$stmt->fetch();
                if ($existe) {
                    if(password_verify($password, $password_admin)){
                        session_start();
                        $_SESSION['name']=$admin_name;
                        $_SESSION['username']=$username_admin;
                        $_SESSIOn['level']=$user_level;
                        $respuesta=array(
                            'respuesta'=>'exitoso',
                            'usuario'=>$admin_name
                        );
                    }else{
                        $respuesta = array(
                        'respuesta' => 'error'
                        );
                    }
                }else{
                    $respuesta = array(
                    'respuesta' => 'error'
                    );
                }
        }
        $stmt->close();
        $conn->close();
	} catch (Exception $e) {
		echo "Error: ".$e->getMessage();
	}
die(json_encode($respuesta));
}