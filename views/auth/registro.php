<main class="auth">
    <div class="auth__contenedor">
        <h2 class="auth__heading"><?php echo $titulo ?></h2>
        <p class="auth__texto">Registrate en DevWebCamp</p>

        <form method="POST" class="formulario">
            <div class="formulario__campo">
                <label for="nombre" class="formulario__label">Nombre: </label>
                <input 
                    type="text"
                    class="formulario__input"
                    id="nombre"
                    name="nombre"
                    placeholder="Ingresa tu nombre"
                >
            </div>

            <div class="formulario__campo">
                <label for="apellido" class="formulario__label">Apellido: </label>
                <input 
                    type="text"
                    class="formulario__input"
                    id="apellido"
                    name="apellido"
                    placeholder="Ingresa tu apellido"
                >
            </div>

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

            <div class="formulario__campo">
                <label for="password2" class="formulario__label">Confirmar contraseña: </label>
                <input 
                    type="password"
                    class="formulario__input"
                    id="password2"
                    name="password2"
                    placeholder="Ingresa tu contraseña de nuevo"
                >
            </div>
    
            <input type="submit" class="formulario__submit" value="Crear Cuenta">
        </form>
    
        <div class="acciones">
            <a href="/login" class="acciones__enlace">Inicia Sesión</a>
            <a href="/olvide" class="acciones__enlace">Restablecer contraseña</a>
        </div>
    </div>
</main>