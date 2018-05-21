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


    $count = 0;
    $sql_2  =  "SELECT  * FROM data WHERE estado = 0";
    $smt_2 =  $db->prepare($sql_2);
    $smt_2->execute();
    $result  = $smt_2->fetchAll(PDO::FETCH_ASSOC);
    $count  = count($result);
 
