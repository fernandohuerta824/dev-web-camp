<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Restablece tu contraseña con tu email</p>

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
            >
        </div>

        <input type="submit" class="formulario__submit" value="Enviar Instrucciones">
    </form>
    
    <div class="acciones">
        <a href="/login" class="acciones__enlace">Inicia sesión</a>
        <a href="/registro" class="acciones__enlace">Crear Cuenta</a>
    </div>
</main>