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


   $sql_1  = "UPDATE data set estado = 1  WHERE estado  = 0";
   $smt_1 = $db->prepare($sql_1);
   $smt_1->execute();

   $sql_2 = "SELECT * FROM data ORDER BY id DESC limit 5";
   $smt_2  = $db->prepare($sql_2); 
   //Especificamos el fetch mode antes de llamar a fecth
   //$smt_2->setFetchMode(PDO::FETCH_ASSOC);
   $smt_2->execute();
   $cadena = '';

   while($row = $smt_2->fetch(PDO::FETCH_OBJ)){
      $cadena .=  $row->autor . $row->mensaje . "<br>";
   }
   

  
   echo json_encode($cadena);


/*while($row=mysqli_fetch_array($result)) {


	$fechaOriginal = $row["fecha"];
	$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));

	$response = $response . "<div class='notification-item'>" .
	"<div class='notification-subject'>". $row["autor"] . " - <span>". $fechaFormateada . "</span> </div>" . 
	"<div class='notification-comment'>" . $row["mensaje"]  . "</div>" .
	"</div>";
}*/
/*if(!empty($response)) {
	print $response;
}*/


?>