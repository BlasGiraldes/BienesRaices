<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad){ ?>
    <div class="anuncio">
        <img class="img-prop" loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="">

        <div class="contenido-anuncio">
            <!--Contenido anuncio-->
            <h3><?php echo $propiedad->titulo; ?></h3>
           
           <p class="descripcion parrafo"> 
            <?php 
                    echo limitar_cadena($propiedad->descripcion, 80, "...");
            ?>
            </p>
            <p class="precio">$<?php echo number_format($propiedad->precio)?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                    <p><?php echo $propiedad->wc;?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento;?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono habitaciones">
                    <p><?php echo $propiedad->habitaciones;?></p>
                </li>
            </ul>
            <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">
                    VER PROPIEDAD
                </a>
            </a>
        </div><!--Contenido anuncio-->
    </div> <!--anuncio-->
    <?php } ?>
</div>

<script src="/build/js/bundle.min.js"></script>
