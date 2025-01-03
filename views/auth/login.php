<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Inicia sesion en DevWebCamp</p>
    
    <?php require __DIR__ . '/../template/alertas.php' ?>

    <form method="POST" class="formulario">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email: </label>
            <input 
                type="email"
                class="formulario__input"
                id="email"
                name="email"
                placeholder="Ingresa tu email"
                value="<?php echo $email ?>"
            >
        </div>
    
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Contraseña: </label>
            <input 
                type="password"
                class="formulario__input"
                id="password"
                name="password"
                placeholder="Ingresa tu contraseña"
            >
        </div>
    
        <input type="submit" class="formulario__submit" value="Iniciar Sesion">
    </form>
    
    <div class="acciones">
        <a href="/registro" class="acciones__enlace">Crear una cuenta nueva</a>
        <a href="/olvide" class="acciones__enlace">Restablecer contraseña</a>
    </div>
</main>