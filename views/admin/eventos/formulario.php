<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion del evento</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="nombre-evento">Nombre del evento</label>
        <input 
            type="text"
            class="formulario__input"
            id="nombre-evento"
            name="nombre"
            placeholder="Nombre del evento"
            value="<?php echo $evento->nombre ?>"
        >
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="descripcion">Descripcion</label>
        <textarea class="formulario__textarea" name="descripcion" id="descripcion" placeholder="Descripcion del evento" rows="8"><?php echo $evento->descripcion ?></textarea>
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="categoria">Categoria</label>
        <select class="formulario__select" name="categoria_id" id="categoria">
            <option value="" disabled selected>-- Seleccion la categoria -- </option>
            <?php foreach($categorias as $c) : ?>
                <option <?php echo $c->id === $evento->categoria_id ? 'selected' : '' ?> value="<?php echo $c->id ?>"><?php echo $c->nombre ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="dia">Seleccion el dia</label>

        <!-- <div class="formulario__radio">
            <?php //foreach($dias as $d) : ?>
                <div>
                    <label for="<?php //echo strtolower( $d->nombre) ?>">
                        <?php //echo $d->nombre ?>
                    </label>

                    <input 
                        type="radio"
                        id=<?php //echo strtolower( $d->nombre) ?>
                        name="dia"
                        value="<?php //echo $d->id ?>"
                    >
                </div>
            <?php //endforeach ?>
        </div> -->
        <select class="formulario__select" id="dia" name="dia_id">
            <option 
                value="" 
                disabled 
                selected
            >
                -- Seleccion el dia -- 
            </option>
            <?php foreach($dias as $d) : ?>
                <option <?php echo $d->id === $evento->dia_id ? 'selected' : '' ?> value="<?php echo $d->id ?>"><?php echo $d->nombre ?></option>
            <?php endforeach ?>
        </select>

    </div>

    <div class="formulario__campo" id="horas">
        <label class="formulario__label">Seleccionar Hora</label>

        <ul class="horas" id="horas">
            <?php foreach($horas as $h) : ?>
                <li data-hora-id="<?php echo $h->id ?>" class="horas__hora horas__hora--deshabilitada"><?php echo $h->hora ?></li>
            <?php endforeach ?>
        </ul>

        <input type="hidden" name="hora_id" value="<?php echo $evento->hora_id; ?>">
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion extra</legend>
    
    <div class="formulario__campo">
        <label class="formulario__label" for="ponentes">Ponentes del evento</label>
        <input 
            type="search"
            class="formulario__input"
            id="ponentes"
            placeholder="Buscar Ponente"
            value="<?php echo ($evento->ponente->nombre . ' ' . $evento->ponente->apellido) === ' ' ? '' : ($evento->ponente->nombre . ' ' . $evento->ponente->apellido) ?>"
        >

        <ul id="listado-ponentes" class="listado-ponentes"></ul>
        <input type="hidden" name="ponente_id" value="<?php echo $evento->ponente_id === 0 ? '' : $evento->ponente_id?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="disponibles">Lugares disponibles</label>
        <input 
            type="number"
            class="formulario__input"
            id="disponibles"
            name="disponibles"
            placeholder="Ej: 20"
            min="1"
            value="<?php echo $evento->disponibles ?>"
        >
    </div>
</fieldset>