<?php
	//conexion con la base de datos y el servidor
	$link = mysql_connect("localhost:3306","acoviviendas","96080415653") or die("<h2>No se encuentra el servidor</h2>");
	$db = mysql_select_db("id6938506_acovivienda",$link) or die("<h2>Error de Conexion</h2>");

	//obtenemos los valores del formulario
	$nombres = $_POST['nombreuser'];
	$apellidos = $_POST['apellidosuser'];
	$telefono = $_POST['telefonouser']
	$pais=$_POST['paisuser'];
	$email = $_POST['correouser'];
	$pass = $_POST['pass'];
	$rpass = $_POST['rpass'];

	//Obtiene la longitus de un string
	$req = (strlen($nombres)*strlen($apellidos)*strlen($email)*strlen($pass)*strlen($rpass)) or die("No se han llenado todos los campos");

	//se confirma la contraseña
	if ($pass != $rpass) {
		die('Las contraseñas no coinciden, Verifique <br /> <a href="contacto.php">Volver</a>');
	}

	//se encripta la contraseña
	$contraseñaUser = md5($pass);

	//ingresamos la informacion a la base de datos
	mysql_query("INSERT INTO datos VALUES('','$nombres','$apellidos','$email','$contraseñaUser')",$link) or die("<h2>Error Guardando los datos</h2>");
	echo'
		<script>
			alert("Registro Exitoso");
			location.href="contacto.html";
		</script>
	'


?>