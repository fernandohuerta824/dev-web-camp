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

            <script src="https://www.paypal.com/sdk/js?client-id=AX7oaKEWGaBj42r4kubhc-x8WuawrB5zze-B6LMomNUuZoSMxr5dLJrNwugcQZY_aeXlxw5i5xs3MnrR"></script>
            <div id="paypal-button-container"></div>

            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '199.00' // Monto que deseas cobrar (en formato decimal)
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            (async function(){
                                const formData = new FormData();
                                formData.append('pago_id',details.purchase_units[0].payments.captures[0].id )
                                   
                                const resultado = await fetch('/finalizar-registro/presencial', {
                                    method: 'POST',
                                    body: formData
                                })

                                if(resultado.status === 201) {
                                    const { token } = await resultado.json(); 
                                    window.location = '/finalizar-registro/conferencias';
                                }
                            })()
                        });
                    },
                    onError: function(err) {
                        console.error('Error en el proceso de pago:', err);
                    }
                }).render('#paypal-button-container');
            </script>
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
            
            <div id="paypal-button-container-2"></div>

            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '49.00' // Monto que deseas cobrar (en formato decimal)
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            (async function(){
                                const formData = new FormData();
                                formData.append('pago_id',details.purchase_units[0].payments.captures[0].id )
                                   
                                const resultado = await fetch('/finalizar-registro/virtual', {
                                    method: 'POST',
                                    body: formData
                                })

                                if(resultado.status === 201) {
                                    const { token } = await resultado.json(); 
                                    window.location = '/finalizar-registro/conferencias';
                                }
                            })()
                        });
                    },
                    onError: function(err) {
                        console.error('Error en el proceso de pago:', err);
                    }
                }).render('#paypal-button-container-2');
            </script>
        </div>
    </div>
</main>
