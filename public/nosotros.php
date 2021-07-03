<?php 
require "includes/funciones.php";
incluirTemplate("header");
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="nostros-imagen">
                <picture>
                    <source srcset="build/img/nostros.webp" type="image webp">
                    <source srcset="build/img/nostros.jpg" type="image jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Imagen sobre nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque culpa corporis repudiandae, id nobis optio amet, deleniti error ipsa laudantium est ex. Nostrum, delectus. A, fugiat. Ipsa temporibus quis dolores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ratione est sed voluptatem a neque voluptatum! Tenetur, alias, dolore cumque aliquam est nesciunt fuga debitis, corrupti voluptatem commodi mollitia placeat. Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta neque, ipsam pariatur impedit nobis, porro mollitia veritatis non ratione deserunt, placeat quas commodi natus id. Amet ipsum nostrum fuga aut.</p>
            </div>
        </div>

    </main>

    <section>
        <h1>Más Sobre Nostros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque enim exercitationem debitis tempora. Odio, fugit maiores eaque, omnis exercitationem aspernatur non laudantium accusantium sed quibusdam ad earum placeat. Esse, dolorum!</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque enim exercitationem debitis tempora. Odio, fugit maiores eaque, omnis exercitationem aspernatur non laudantium accusantium sed quibusdam ad earum placeat. Esse, dolorum!</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque enim exercitationem debitis tempora. Odio, fugit maiores eaque, omnis exercitationem aspernatur non laudantium accusantium sed quibusdam ad earum placeat. Esse, dolorum!</p>
        </div>
    </div> <!--fin de div para iconos-->
    </section>

<?php 
    incluirTemplate("footer");
?>