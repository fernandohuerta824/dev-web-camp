<?php
    include __DIR__ . '/conferencias.php';
?>

<section class="resumen">
    <div class="resumen__grid">
        <div data-aos="<?php echo aos_animation() ?>" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $ponentesTotal ?></p>
            <p class="resumen__texto">Speakers</p>
        </div>

        <div data-aos="<?php echo aos_animation() ?>" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $conferenciasTotal ?></p>
            <p class="resumen__texto">Conferencias</p>
        </div>

        <div data-aos="<?php echo aos_animation() ?>" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $workshopsTotal ?></p>
            <p class="resumen__texto">Workshops</p>
        </div>

        <div data-aos="<?php echo aos_animation() ?>" class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero">+500</p>
            <p class="resumen__texto">Asistentes</p>
        </div>
    </div>
</section>

<section class="speakers">
    <h2 class="speakers__heading">Speakers</h2>
    <p class="speakers__descripcion">Cononce a nuestros expertos en DevWebCamp</p>

    <div class="speakers__grid" >
        <?php include __DIR__ . '/../template/ponente.php' ?>
    </div>
</section>


<div id="mapa">

</div>

<section class="boletos">
    <h2 class="boletos__heading">Boletos & Precios</h2>
    <p class="boletos__descripcion">Precios para DebWebCamp</p>

    <div class="boletos__grid">
        <div class="boleto boleto--presencial" data-aos="<?php echo aos_animation() ?>">
            <h4 class="boleto__logo">&#60;DevWebCamp/&#62;</h4>
            <p class="boleto__plan">Presencial</p>
            <p class="boleto__precio">$199</p>
        </div>

        <div class="boleto boleto--virtual" data-aos="<?php echo aos_animation() ?>">
            <h4 class="boleto__logo">&#60;DevWebCamp/&#62;</h4>
            <p class="boleto__plan">Virtual</p>
            <p class="boleto__precio">$49</p>
        </div>

        <div class="boleto boleto--gratis" data-aos="<?php echo aos_animation() ?>">
            <h4 class="boleto__logo">&#60;DevWebCamp/&#62;</h4>
            <p class="boleto__plan">Gratis</p>
            <p class="boleto__precio">Gratis - $0</p>
        </div>
    </div>

    <div class="boleto__enlance--contenedor">
        <a href="/paquetes" class="boleto__enlace">Ver paquetes</a>
    </div>
</section>