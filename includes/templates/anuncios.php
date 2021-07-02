<?php
   use App\Propiedad;
    
    if($_SERVER["SCRIPT_NAME"] === "/index.php"){
        
        $propiedades = Propiedad::get(3);
        
        
    }else{
        $propiedades = Propiedad::all();
    }

?>
<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedades): ?>
    <div class="anuncio">
    
        <img loading="lazy" src="/imagenes/<?php echo $propiedades->imagen; ?>" alt="Anuncio">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedades->titulo; ?></h3>
            <p><?php echo $propiedades->descripcion; ?></p>
            <p class="precio"> $ <?php echo $propiedades->precio; ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icon" loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                    <p><?php echo $propiedades->wc; ?></p>
                </li>
                <li>
                    <img class="icon" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
                    <p><?php echo $propiedades->estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icon" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono habitaciones">
                    <p><?php echo $propiedades->habitaciones; ?></p>
                </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $propiedades->id; ?>" class="boton-amarillo-block">
                Ver Propiedad
            </a>
                        
        </div>
    </div>
    <?php endforeach;?>
</div>
