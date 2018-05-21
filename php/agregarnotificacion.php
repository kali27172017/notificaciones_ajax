<?php
  $dsn = 'mysql:dbname=notificaciones;host=127.0.0.1';
  $usuario = 'root';
  $contraseña = 'admin';

	
  try{
    $db = new PDO($dsn,$usuario,$contraseña);
    //echo 'Conectado a '.$db->getAttribute(PDO::ATTR_CONNECTION_STATUS);
  }catch(PDOException $ex){
  	echo 'Error conectando a la BBDD. '.$ex->getMessage(); 
  }



	if(!empty($_POST['add'])) {
		$autor = $_POST["autor"];
		$mensaje = $_POST["mensaje"];
        $sql = "INSERT INTO data(autor,mensaje) VALUES(:autor,:mensaje)";
	    $smt  = $db->prepare($sql);
	    $smt->bindParam(':autor',$autor);
	    $smt->bindParam(':mensaje',$mensaje); 
	    $smt->execute();				
		
	}

    //Aqui cuento cuantas notificaciones voy acumulando
    //me doy cuenta porque las que tienen estado 0 son las que recien voy ingresando
   
	header( 'Location: ../' ) ;
?>










