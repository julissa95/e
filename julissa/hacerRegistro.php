<?php
    
$checkUsuario = $_GET['Usuario'];
$checkPassword = $_GET['Contrasena'];
//var_dump($_GET);

if(checkUser($checkUsuario,$checkPassword)==false){
	// Create connection
$conn = new mysqli("localhost", "root", "", "phpdatabase");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 

 $sql = "insert into  usuario (Nombre, Clave) VALUES ('$checkUsuario','$checkPassword')"; 
 if ($conn->multi_query($sql) === TRUE) {
   
    header("Location: login.php");
	exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location: Registro.php");
  
}

$conn->close();
}
else {
  
    header("Location: Registro.php");
    }


function checkUser($checkUsuario,$checkPassword) {

	 if(!($iden =  mysqli_connect("localhost", "root", "","phpdatabase"))) 
    	die("Error: No se pudo conectar");
    // Sentencia SQL: muestra todo el contenido de la tabla "books" 
  $sentencia = "SELECT * FROM usuario where nombre='$checkUsuario' and clave='$checkPassword'"; 
  // Ejecuta la sentencia SQL 
  $resultado = mysqli_query($iden,$sentencia);
  //var_dump($resultado);
  //die(); 
  $count = $resultado->num_rows;
  if($count<=0) {
		return false;
	}
	else{
		return true;
	}
	$iden->close();
}
//if (check(3)) echo "Returned true!";

?>