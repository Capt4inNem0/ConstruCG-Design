<?php
    /*
        Bueno es muy evidente que es una funcion de alerta, si a alguien se le 
        ocurre un mejor nombre para el archivo voy a estar agradecido.

        Argumentos:
            Mensaje: Dale pa media pila es muy obvio
            Persistencia: Cantidad de segundos mostrando el cartel, por defecto 69 minutos

    */

    $model = 
    "
        <div id='errorbox' class='centrado'>
            <h3>Oops, algo salió mal</h3>
            <p id='errorbox-text'></p>
        </div>
    ";
    $model_controller = "<script src='/controllers/alarma.js'></script>";
    echo($model_controller);
    echo($model);


    function display_error($mensaje, $persistencia = 60*69){
        echo("<script>loadAlert('$mensaje', $persistencia)</script>");
    }

?>