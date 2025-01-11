<main class="agenda">
    <h2 class="agenda__heading">Workshops & Conferencias</h2>
    <p class="agenda__descripcion">Talleres y Conferencias dictados por expertos en desarrollo web</p>

    <div class="eventos">
        <h3 class="eventos__heading">&lt;Conferencias /></h3>

        <p class="eventos__fecha">Lunes</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_1']['categoria_1'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>

        <p class="eventos__fecha">Martes</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_2']['categoria_1'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>

        <p class="eventos__fecha">Miercoles</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_3']['categoria_1'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>

        <p class="eventos__fecha">Jueves</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_4']['categoria_1'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>

        <p class="eventos__fecha">Viernes</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_5']['categoria_1'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>

        <p class="eventos__fecha">Sabado</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_6']['categoria_1'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>

        <p class="eventos__fecha">Domingo</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_7']['categoria_1'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>
    </div>

    <div class="eventos eventos--workshops">
        <h3 class="eventos__heading">&lt;Workshops /></h3>

        <p class="eventos__fecha">Lunes</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_1']['categoria_2'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>

        <p class="eventos__fecha">Martes</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_2']['categoria_2'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>

        <p class="eventos__fecha">Miercoles</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_3']['categoria_2'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>

        <p class="eventos__fecha">Jueves</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_4']['categoria_2'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>

        <p class="eventos__fecha">Viernes</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_5']['categoria_2'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>

        <p class="eventos__fecha">Sabado</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_6']['categoria_2'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>

        <p class="eventos__fecha">Domingo</p>

        <div class="eventos__listado slider swiper">
            <?php 
            $eventosDiaAct = $eventos['dia_7']['categoria_2'];
            include __DIR__ . '/../template/eventos.php';
            ?> 
        </div>
    </div>
</main> 
