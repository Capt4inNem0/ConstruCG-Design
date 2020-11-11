<?php
	include_once "alarma.php";
	/*
		Listorti:
			Hacer que salga una ventana emergente que avise de errores en el formulario.
			(Ver alarma.php y la funcion sum Error de aca abajo)

		TODO:

		Separar Nombre y apellido.
		Reforzar la parte de "consulta" y Nombre y apellido 
		para evitar un ataque de mierda o mejor llamado XSS.
		Arreglar una cosa tocahuevos que al recargar la pagina con F5,
		aun se siga enviando el formulario (maldito _POST).
		Ian se la come (no es algo que hacer, solo lo reafirmo).
		Agregar Fecha y hora al archivo generado para diferenciar de personas
		que tengan mismo nombre y apellido (se sobrescriben unos a otros).
	*/

	$errores = "";

	function sumError(String $var = "")
	{
		global $errores;
		$errores = $errores.$var." <br> ";
	}

    if ($_POST) {
        if ((empty($_POST["nombre"])) && (empty($_POST["apellido"])))
		{
			sumError("- Dale pa pone bien el nombre");
		}
		else 
		{
			if ((!preg_match("/^[a-zA-Z]+/", $_POST["nombre"])) && (!preg_match("/^[a-zA-Z]+/", $_POST["apellido"]))) {
				sumError("- Te esta dando un acv o tocaste cualquier cosa?");
			}
			else
			{
				$nombre = $_POST["nombre"];
				$apellido = $_POST["apellido"];
			}
		}
		
		if (empty($_POST["email"])) {
			sumError("- El email es requerido pedazo de gil");
		} 
		else 
		{
			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_POST["email"])) {
				sumError("- Dale amargo ni el email sabes escribir bien");
			}
			else
			{
				$email = $_POST["email"];
			}
		}
		
		if (empty($_POST["consulta"]))
		{
			sumError("- Ay mirala se hace la dificil, manda mensajes vacios, toxica de mierda");
		}
		else 
		{
			$consulta = $_POST["consulta"];
		}
		
		if ($errores != "") {
			display_error($errores, 10);
		}
		else
		{
			$file = fopen("mensajes/$nombre"."_$apellido.txt","w");
			fwrite($file,"Nombre y Apellido: ".$nombre." ".$apellido);
			fwrite($file,"\nEmail: ".$email);
			fwrite($file,"\nMensaje:\n  ".$consulta);
				
			fclose($file);
		}
		unset($_POST["nombre"]);
		unset($_POST["apellido"]);
		unset($_POST["email"]);
		unset($_POST["consulta"]);
    }
?>