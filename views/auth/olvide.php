<main class="auth">
    <div class="auth__contenedor">
        <h2 class="auth__heading"><?php echo $titulo ?></h2>
        <p class="auth__texto">Restablece tu contraseña con tu email</p>
    
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
            <a href="/" class="acciones__enlace">Inica sesión</a>
            <a href="/registro" class="acciones__enlace">Crear Cuenta</a>
        </div>
    </div>
</main>