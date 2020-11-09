<?php
	/*
		TODO:
		Hacer que salga una ventana emergente que avise de errores
		en el formulario.
		Separar Nombre y apellido.
		Agregar la variable "consulta"
		Reforzar la parte de "consulta" y Nombre y apellido 
		para evitar un ataque de mierda o mejor llamado XSS.
		Arreglar una cosa tocahuevos que al recargar la pagina con F5,
		aun se siga enviando el formulario (maldito _POST).
		Ian se la come (no es algo que hacer, solo lo reafirmo).
	*/
    if ($_POST) {
        if ((empty($_POST["nombre"])) && (empty($_POST["apellido"])))
		{
			echo "Ingrese algun Nombre y/o Apellido. No seas trolo man\n";
		}
		else 
		{
			if ((!preg_match("/^[a-zA-Z]+/", $_POST["nombre"])) && (!preg_match("/^[a-zA-Z]+/", $_POST["apellido"]))) {
				echo "Que trolo sos man. No jugues con los caracteres";
			}
			else
			{
				$nombre = $_POST["nombre"];
				$apellido = $_POST["apellido"];
			}
		}
		
		if (empty($_POST["email"])) {
			echo "El email es requerido pedazo de gil\n";
		} 
		else 
		{
			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_POST["email"])) {
				echo "Formato de email incorrecto imbecil hincha de Racing\n";
			}
			else
			{
				$email = $_POST["email"];
			}
		}
		unset($_POST["nombre"]);
		unset($_POST["apellido"]);
		unset($_POST["email"]);
    }
?>