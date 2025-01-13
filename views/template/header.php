<header class="header">
    <div class="header__contenedor">
        <nav class="header__navegacion">
            <?php

            use Model\Registro;

            session_start();
            if(!isset($_SESSION['id'])) : 
            ?>
                <a href="/registro" class="header__enlace">Registro</a>
                <a href="/login" class="header__enlace">Iniciar Sesion</a>

            <?php 
            endif; 
            if(isset($_SESSION['id']) && $_SESSION['admin'] === 1) :
            ?>
                <a href="/admin/dashboard" class="header__enlace">Administrar</a>

            <?php 
            endif;
            if(isset($_SESSION['id'])) :
            ?>
                <form action="/logout" method="post">
                    <input type="submit" class="header__enlace" value="Cerrar Sesion">
                </form>
            <?php endif?>

            
        </nav>

        <div class="header__contenido" data-aos="fade-up">
            <a href="/">
                <h1 class="header__logo">&#60;DevWebCamp/&#62;</h1>
            </a>

            <p class="header__texto">OCTUBRE 5-6 - 2023</p>
            <p class="header__texto header__texto--modalidad">En linea - Presencia</p>

            <?php   
            if(!$_SESSION['id']) :
            ?>
                <a href="/registro" class="header__boton">Comprar pase</a>
            <?php 
            else :
                $registro = Registro::where('usuario_id', $_SESSION['id']); 
                if(!$registro):  
            ?>
                <a href="/finalizar-registro" class="header__boton">Comprar pase</a>
                <?php else : ?>
                    <a href="/boleto?id=<?php echo $registro->token ?>" class="header__boton">Ver Boleto</a>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>
</header>

<div class="barra">
    <div class="barra__contenido">
        <a href="/">
            <h2 class="barra__logo">
                &#60;DevWebCamp/&#62
            </h2>
        </a>

        <nav class="navegacion">
            <a href="/devwebcamp" class="navegacion__enlace<?php echo paginaActual('/devwebcamp') ? ' navegacion__enlace--actual' : '' ?>">Eventos</a>
            <a href="/paquetes" class="navegacion__enlace<?php echo paginaActual('/paquetes') ? ' navegacion__enlace--actual' : '' ?>">Paquetes</a>
            <a href="/workshop" class="navegacion__enlace<?php echo paginaActual('/workshop') ? ' navegacion__enlace--actual' : '' ?>">Workshops / Conferencias</a>
            <?php   
            if(!$_SESSION['id']) :
            ?>
                <a href="/registro" class="navegacion__enlace<?php echo paginaActual('/registro') ? ' navegacion__enlace--actual' : '' ?>">Comprar pase</a>
            <?php 
            else :
                $registro = Registro::where('usuario_id', $_SESSION['id']); 
                if(!$registro):  
            ?>
                <a href="/finalizar-registro" class="navegacion__enlace<?php echo paginaActual('/finalizar-registro') ? ' navegacion__enlace--actual' : '' ?>">Comprar pase</a>
                <?php else : ?>
                    <a href="/boleto?id=<?php echo $registro->token ?>" class="navegacion__enlace<?php echo paginaActual('/boleto') ? ' navegacion__enlace--actual' : '' ?>">Ver Boleto</a>
                <?php endif ?>
            <?php endif ?>
        </nav>
    </div>
</div>