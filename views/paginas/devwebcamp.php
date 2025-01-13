<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo ?></h2>

    <p class="devwebcamp__descripcion">Conoce la conferencia mas importante de latinoamerica</p>

    <div class="devwebcamp__grid" data-aos="<?php echo aos_animation() ?>">
        <div class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
                <img loading="lazy" src="build/img/sobre_devwebcamp.jpg" width="500"height="300" alt="Imagen devwebcamp">
            </picture>
        </div>

        <div class="devwebcamp__contenido" data-aos="<?php echo aos_animation() ?>">
            <p class="devwebcamp__texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum iure maxime commodi assumenda doloribus aliquid neque debitis adipisci iusto illum ratione quidem nulla labore vitae excepturi repellat odit, delectus sit.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus in soluta quod nesciunt corrupti expedita, vitae ducimus error cupiditate, illum excepturi voluptatem ipsam porro labore similique tempore qui magni fuga!
            </p>

            <p class="devwebcamp__texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum iure maxime commodi assumenda doloribus aliquid neque debitis adipisci iusto illum ratione quidem nulla labore vitae excepturi repellat odit, delectus sit.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto eos magnam vel ullam necessitatibus omnis nihil beatae eligendi suscipit placeat molestiae ratione, ea porro voluptatem laboriosam error aperiam asperiores tenetur.
            </p>
        </div>
    </div>
</main>