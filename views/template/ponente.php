<?php foreach ($ponentes as $p) : ?>
    <div class="speaker" data-aos="<?php echo aos_animation() ?>">

        <picture class="speaker__imagen-container">
            <source
                srcset="/imagenes/ponentes/<?php echo $p->imagen->fullName ?>.webp"
                type="image/webp">
            <source
                srcset="/imagenes/ponentes/<?php echo $p->imagen->fullName ?>.avif"
                type="image/avif">
            <img
                class="speaker__imagen"
                loading="lazy"
                src="/imagenes/ponentes/<?php echo $p->imagen->fullName ?>.jpg"
                width="500"
                height="300"
                alt="Foto de <?php echo $p->nombre ?>"
                title="Foto de <?php echo $p->nombre ?>">
        </picture>

        <div class="speaker__informacion">
            <h4 class="speaker__nombre"><?php echo $p->nombre . ' ' . $p->apellido ?></h4>

            <p class="speaker__ubicacion"><?php echo $p->ciudad . ', ' . $p->pais ?></p>

            <nav class="speaker__sociales">
                <?php
                $redes = json_decode($p->redes, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

                ?>

                <?php if(!empty($redes['facebook'])) :?>
                <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="https://<?php echo $redes['facebook'] ?>">
                    <span class="speaker__ocultar">Facebook</span>
                </a>
                <?php endif ?>

                <?php if(!empty($redes['twitter'])) :?>
                <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="https://<?php echo $redes['twitter'] ?>">
                    <span class="speaker__ocultar">Twitter</span>
                </a>
                <?php endif ?>

                <?php if(!empty($redes['youtube'])) :?>
                <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes['youtube'] ?>">
                    <span class="speaker__ocultar">YouTube</span>
                </a>
                <?php endif ?>

                <?php if(!empty($redes['instagram'])) :?>
                <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="https://<?php echo $redes['instagram'] ?>">
                    <span class="speaker__ocultar">Instagram</span>
                </a>
                <?php endif ?>

                <?php if(!empty($redes['tiktok'])) :?>
                <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes['tiktok'] ?>">
                    <span class="speaker__ocultar">Tiktok</span>
                </a>
                <?php endif ?>

                <?php if(!empty($redes['github'])) :?>
                <a class="speaker__enlace" rel="noopener noreferrer" target="_blank" href="https://<?php echo $redes['github'] ?>">
                    <span class="speaker__ocultar">Github</span>
                </a>
                <?php endif ?>
            </nav>

            <ul class="speaker__listado-skills">
                <?php
                $tags = explode(',', $p->tags);
                foreach ($tags as $t) :
                ?>
                    <li class="speaker__skill">
                        <?php echo $t ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
<?php endforeach ?>