<div class="swiper-wrapper">
    <?php foreach ($eventosDiaAct as $e) : ?>
        <div class="evento swiper-slide">
            <p class="evento__hora"><?php echo $e->hora->hora ?></p>

            <div class="evento__informacion">
                <h4 class="evento__nombre"><?php echo $e->nombre ?></h4>
                <p class="evento__descripcion"><?php echo $e->descripcion ?></p>

                <div class="evento__ponente">
                    <picture>
                        <source
                            srcset="/imagenes/ponentes/<?php echo $e->ponente->imagen->fullName ?>.webp"
                            type="image/webp">
                        <source
                            srcset="/imagenes/ponentes/<?php echo $e->ponente->imagen->fullName ?>.avif"
                            type="image/avif">
                        <img
                            class="evento__imagen-autor"
                            loading="lazy"
                            src="/imagenes/ponentes/<?php echo $e->ponente->imagen->fullName ?>.jpg"
                            width="500"
                            height="300"
                            alt="Foto de <?php echo $e->ponente->nombre ?>"
                            title="Foto de <?php echo $e->ponente->nombre ?>">
                    </picture>
                    <p class="evento__ponente-nombre"><?php echo $e->ponente->nombre . ' ' . $e->ponente->apellido ?></p>
                </div>
            </div>

        </div>
    <?php endforeach ?>
</div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
