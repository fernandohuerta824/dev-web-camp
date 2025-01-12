<main class="paquetes">
    <h2 class="paquetes__heading"><?php echo $titulo ?></h2>

    <p class="paquetes__descripcion">Compara los paquetes de devWebCamp</p>

    <div class="paquetes__grid">
        <div class="paquete" data-aos="<?php echo aos_animation() ?>">
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
            </ul>

            <div class="paquete__precio">$0</div>
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
        </div>
    </div>
</main>