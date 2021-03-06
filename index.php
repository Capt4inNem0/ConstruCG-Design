    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConstruCG</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/parts/inicio.css">
    <link rel="stylesheet" href="/css/parts/trabajos.css">
    <link rel="stylesheet" href="/css/parts/grid.css">

    <link rel="stylesheet" href="/css/alarma.css">

    <link rel="stylesheet" href="css/parts/header.css">
    <link rel="stylesheet" href="css/parts/contacto.css">
    <link rel="stylesheet" href="/css/parts/presupuesto.css">
    
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
 
</head>
    <body>
        <?php
            include(__DIR__."/parts/header.php")
        ?>
        <?php
            include(__DIR__."/parts/inicio.php")
        ?>
         <?php
            include(__DIR__."/parts/trabajos.php")
        ?>
        <?php
            include(__DIR__."/parts/presupuesto.php")
        ?>
        <?php
            include(__DIR__."/parts/contacto.php")
        ?>
       
    </body>
</html>
<?php
    include(__DIR__."/controllers/post_manager.php")
?>