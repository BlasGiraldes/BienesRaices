
<main class="contenedor seccion">
    <h1 class="ancho">Sobre Nosotros</h1>

    <?php include 'iconos.php'?>

</main>

<section class="seccion contenedor">
    <h2 class="ancho">Casas y Departamentos en Venta</h2>

        <?php 
            include 'listado.php'
        ?>

    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-verde">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a href="contacto" class="boton-amarillo">Contactános</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3 class="ancho">Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpg">
                    <img loadgin="lazy" src="build/img/blog1.jpg alt=" text entrada blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>13/12/2022</span>
                        <br> Editor: <span>Blas</span>
                    </p>

                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y
                        ahorrando dinero</p>

                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpg">
                    <img loadgin="lazy" src="build/img/blog2.jpg alt=" text entrada blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada">
                    <h4>Guía para la decoración de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>06/11/2022</span>
                        <br> Editor: <span>Blas</span>
                    </p>

                    <p>Cómo decorar tu hogar: una guía completa con consejos y trucos para darle vida a tu espacio
                    </p>

                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3 class="upm">Satisfacción garantizada: testimonios de nuestros clientes</h3>
        <div class="testimonial">
            <blockquote>
                Me brindaron un excelente servicio y me ayudaron a encontrar el inmueble perfecto. El proceso de
                compra fue muy sencillo gracias a su ayuda. Estoy muy
                contento con mi elección.
            </blockquote>
            <p>- Pablo Giraldes</p>
        </div>
    </section>
    <script src="/build/js/bundle.min.js"></script>
</div>
