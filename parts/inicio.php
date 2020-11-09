<article id="nosotros">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            
            <?php
                $origindir = 'imagenes/carousel/';      // Escanea las imagenes en el directorio
                $files = scandir($origindir);           
                $active = "active";                     // Esta variable marca la primer imagen del array como la default
                foreach ($files as $file) {
                    if($file != "." && $file != ".."){  // No acepta los archivos . y ..
                            echo("
                        <div class='carousel-item ".$active."'>
                            <img class='d-block w-100' src=/".$origindir.$file." alt='Slide'>
                        </div>
                        ");
                        $active = "";
                    }
                }
            ?>
            
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="nosotros">
        <h2>Sobre nosotros</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus, esse ducimus consequuntur quo laboriosam labore fuga. Delectus aspernatur eius, id numquam enim, unde iste nostrum, beatae tenetur similique voluptatem fugit.</p>
    </div>
</article>