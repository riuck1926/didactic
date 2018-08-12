<?php 
	/*$destino = "riuck2012@gmail.com";*/
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
  $empresa = $_POST["empresa"];
	$telefono = $_POST["telefono"];
	$mensaje = $_POST["mensaje"];
	/*$contenido = "Nombre: " . $nombre . "\ncorreo: " . $correo . "\ntelefono: " . $telefono . "\nmensaje:" . $mensaje;*/
	/*mail($destino,"contacto", $contenido);*/
	


	  // Si hay valores en blanco no hacer nada y borrar lo que hay en #contenido.
    if ($nombre == "" || $correo == "" || $empresa == "" || $telefono == "" || $mensaje == "") {
      echo '<script type="text/javascript">document.getElementById("contenido").innerHTML = "";</script>';
    }


     else {
      $destino = "contacto@gypmark.tk";
      $contenido = "Nombre: " . $nombre . "\ncorreo: " . $correo . "\nempresa: " . $empresa . "\ntelefono: " . $telefono . "\nmensaje:" . $mensaje;
      
      if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
      $envio = mail($destino, "contacto", $contenido);
      header("location:index.php?id=correcto");
      // Revisar el envío y según lo que pase mostrar mensaje.
      }
      else{
        header("location:index.php?id=incorrecto");
      }


      if($envio){
        echo '<script type="text/javascript">document.getElementById("contenido").innerHTML = "El formulario se envío con éxito";</script>';
      } else {
        echo '<script type="text/javascript">document.getElementById("contenido").innerHTML = "Fallo el envío del formulario.";</script>';
      }
    }

	header("Location:index.php");

?>