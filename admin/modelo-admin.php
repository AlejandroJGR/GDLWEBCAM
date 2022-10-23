<?php 
include_once'funciones/funciones.php';
    $username=$_POST['username'];
    $name=$_POST['name'];
    $password=$_POST['password'];
    if(isset($_POST['id_registro'])){
        $id_resgistro=$_POST['id_registro'];
    }

if ($_POST['registro'] == 'nuevo') {
	$opciones=array(
		'cost'=>12
	);

	$password_hashed=password_hash($password, PASSWORD_BCRYPT, $opciones);

	try {
        $stmt=$conn->prepare("INSERT INTO administradores (name, username, password) VALUES(?,?,?)");
        $stmt->bind_param("sss", $name, $username, $password_hashed);
        $stmt->execute();
        $id_resgistro=$stmt->insert_id;
        if($id_resgistro>0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_admin' => $id_resgistro
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }

        $stmt->close();
        $conn->close();

	} catch (Exception $e) {
		echo "Error: ".$e->getMessage();
	}
die(json_encode($respuesta));

}

if ($_POST['registro'] == 'actualizar') {
    try {
        if(empty($_POST['password'])){
            $stmt=$conn->prepare("UPDATE administradores SET username=?, name=?, edited=NOW() WHERE id_admin = ? ");
            $stmt->bind_param("ssi", $name, $username, $id_resgistro);
        }else{
           $opciones=array(
            'cost'=>12
            );  
            
            $hash_password= password_hash($password, PASSWORD_BCRYPT, $opciones);
            $stmt=$conn->prepare("UPDATE administradores SET username=?, name=?, password=?, edited=NOW() WHERE id_admin = ? ");
            $stmt->bind_param("sssi", $name, $username, $password, $id_resgistro);
        }
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta=array(
                'respuesta'=>'exito',
                'id_actualizado'=>$stmt->insert_id
            );
        }else{
            $respuesta=array(
                'respuesta'=>'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta=array(
            'respuesta'=>$e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

if ($_POST['registro'] == 'eliminar') {

    $id_borrar=$_POST['id'];

    try {
        $stmt=$conn->prepare('DELETE FROM administradores WHERE id_admin=?');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if ($stmt->affected_rows) {
            $respuesta=array(
                "respuesta" => "exito",
                "id_eliminado" => $id_borrar
            );
        }else{
            $respuesta=array(
                'respuesta' => 'error'
            ); 
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta=array(
            'respuesta'=>$e->getMessage()
        );
    }
    die(json_encode($respuesta));

}