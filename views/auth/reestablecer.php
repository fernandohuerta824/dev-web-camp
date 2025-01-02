<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Coloca tu nueva contraseña</p>

    <?php require __DIR__ . '/../template/alertas.php' ?>


    <form method="POST" class="formulario">
    <div class="formulario__campo">
            <label for="password2" class="formulario__label">Confirmar Contraseña: </label>
            <input 
                type="password"
                class="formulario__input"
                id="password2"
                name="password"
                placeholder="Ingresa tu contraseña"
            >
        </div>
    
        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Confirmar Contraseña: </label>
            <input 
                type="password"
                class="formulario__input"
                id="password2"
                name="password2"
                placeholder="Ingresa tu contraseña de nuevo"
            >
        </div>
    
        <input type="submit" class="formulario__submit" value="Iniciar Sesion">
    </form>
</main>