<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Personal</legend>

    <div class="formulario__campo">
        <label for="nombre">Nombre</label>
        <input 
            type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre del ponente"
            value="<?php echo $ponente->nombre ?? '' ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="apellido">Apellido</label>
        <input 
            type="text"
            class="formulario__input"
            id="apellido"
            name="apellido"
            placeholder="Apellido del ponente"
            value="<?php echo $ponente->apellido ?? '' ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="ciudad">Ciudad</label>
        <input 
            type="text"
            class="formulario__input"
            id="ciudad"
            name="ciudad"
            placeholder="Ciudad del ponente"
            value="<?php echo $ponente->ciudad ?? '' ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="pais">Pais</label>
        <input 
            type="text"
            class="formulario__input"
            id="pais"
            name="pais"
            placeholder="Pais del ponente"
            value="<?php echo $ponente->pais ?? '' ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="imagen">Imagen</label>
        <input 
            type="file"
            class="formulario__input--file"
            id="imagen"
            name="imagen"
            accept="image/*"
        >
    </div>

    <?php if($imagenActual->nombreFinal) : ?>
        <p>Foto Actual de <?php echo $ponente->nombre ?></p>
        <picture>
            <source 
                srcset="<?php echo '/imagenes/ponentes/' . $imagenActual->nombreFinal?>.webp" 
                type="image/webp"
            >
            <source 
                srcset="<?php echo '/imagenes/ponentes/' . $imagenActual->nombreFinal?>.avif" 
                type="image/avif"
            >
            <img 
                class="formulario__imagen"
                loading="lazy" 
                src="<?php echo '/imagenes/ponentes/' . $imagenActual->nombreFinal?>.png" 
                width="500"
                height="300" 
                alt="<?php echo $ponente->nombre ?>"
                title="<?php echo $ponente->nombre ?>"
            >
        </picture>
    <?php endif ?>
    
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Extra</legend>

    <div class="formulario__campo">
        <label for="tags-input">Areas de experiencias separadas por coma</label>
        <input 
            type="text"
            class="formulario__input"
            id="tags-input"
            placeholder="Ej, Node JS, PHP, Lavarel, Dev Ops"
        >

        <div class="formulario__listado" id="tags">

        </div>
        <?php //debug(echo $ponente->tags)?>
        <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? '' ?>">
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>

    <?php $redes = json_decode($ponente->redes, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input 
                type="text"
                class="formulario__input formulario__input--social"
                name="redes[facebook]"
                placeholder="Facebook"
                value="<?php echo $redes['facebook'] ?? '' ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input 
                type="text"
                class="formulario__input formulario__input--social"
                name="redes[twitter]"
                placeholder="Twitter"
                value="<?php echo $redes['twitter'] ?? '' ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input 
                type="text"
                class="formulario__input formulario__input--social"
                name="redes[youtube]"
                placeholder="Youtube"
                value="<?php echo $redes['youtube'] ?? '' ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input 
                type="text"
                class="formulario__input formulario__input--social"
                name="redes[instagram]"
                placeholder="Instagram"
                value="<?php echo $redes['instagram'] ?? '' ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input 
                type="text"
                class="formulario__input formulario__input--social"
                name="redes[tiktok]"
                placeholder="Tiktok"
                value="<?php echo $redes['tiktok'] ?? '' ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input 
                type="text"
                class="formulario__input formulario__input--social"
                name="redes[github]"
                placeholder="Github"
                value="<?php echo $redes['github'] ?? '' ?>"
            >
        </div>
    </div>
</fieldset>