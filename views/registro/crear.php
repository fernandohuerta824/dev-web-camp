<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo ?></h2>
    <p class="registro__descripcion">Elige tu plan</p>

    <div class="paquetes__grid">
        <div class="paquete" data-aos="<?php echo aos_animation() ?>">
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
            </ul>

            <div class="paquete__precio">$0</div>

            
            <form action="/finalizar-registro/gratis" method="post">
                <input class="paquetes__submit" type="submit" value="Inscripcion Gratis">
            </form>
        </div>

        <div class="paquete paquete--premium" data-aos="<?php echo aos_animation() ?>">
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por dos dias</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las grabaciones</li>
                <li class="paquete__elemento">Camisa del evento</li>
                <li class="paquete__elemento">Comida y bebida</li>
            </ul>

            <div class="paquete__precio">$199</div>

            <form action="/finalizar-registro/presencial" method="post">
                <input class="paquetes__submit" type="submit" value="Inscripcion Presencial">
            </form>
        </div>


        <div class="paquete" data-aos="<?php echo aos_animation() ?>">
            <h3 class="paquete__nombre">Pase Virtual</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
                <li class="paquete__elemento">Pase por dos dias</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las grabaciones</li>
            </ul>

            <div class="paquete__precio">$49</div>

            <form action="/finalizar-registro/virtual" method="post">
                <input class="paquetes__submit" type="submit" value="Inscripcion Virtual">
            </form>
        </div>
    </div>
</main>
