<main class="contenedor seccion">
    <h1 class="ancho">Contacto</h1>


    <?php
    if ($mensaje) {   ?>
        <p class='alerta exito'> <?php echo $mensaje;  ?></p>
    <?php  } ?>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">

    </picture>
    <h2>Llene el formulario de contacto</h2>
    <form class="formulario" action="/contacto" method="POST">

        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" name="contacto[nombre]" required id="nombre">



            <label for="mensaje">Mensaje</label>
            <textarea name="contacto[mensaje]" id="mensaje" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>
            <label for="opciones">¿Vende o Compra?</label>
            <select id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Presupuesto</label>
            <input type="number" name="contacto[precio]" required placeholder="Tu Precio o Presupuesto" id="presupuesto">

        </fieldset>
        <fieldset>

            <legend>Información sobre la propiedad</legend>
            <p>¿Cómo desea ser contactado?</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]">

                <label for="contactar-email">E-mail</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]">
            </div>

            <div id="contacto"> </div>
        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde ">
    </form>
</main>