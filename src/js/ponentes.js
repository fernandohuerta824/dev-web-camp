document.addEventListener('DOMContentLoaded', () => {
    const ponentesInput = document.querySelector('#ponentes');

    if(ponentesInput) {
        let ponentes = [];
        let ponentesFiltrados = [];
        const tagExito = document.querySelector('.alerta.alerta--exito');

        if(tagExito) {
            setTimeout(() => tagExito.remove(), 5000);
        }
        const ponenteLista = document.querySelector('#listado-ponentes');
        const ponenteInputHidden = document.querySelector('[name="ponente_id"]')
        
        ponentesInput.addEventListener('input', buscarPonentes)


        function includesNormalizado(cadena1, cadena2) {
            const normalizar = cadena => 
                cadena.normalize('NFD').replace(/[\u0300-\u036f]/g, '').toLowerCase().trim();
        
            return normalizar(cadena1).includes(normalizar(cadena2));
        }

        /**
         * 
         * @param {Event} e 
         */
        function buscarPonentes(e) {
            const busqueda = e.target.value;

            while(ponenteLista.firstChild) {
                ponenteLista.removeChild(ponenteLista.firstChild)
            }

            if(busqueda.length < 3) 
                return;
            ponentesFiltrados = ponentes.filter(p => includesNormalizado(p.nombre, busqueda)
            );

            mostrarPonentes();
        }

        /**
         * 
         * @param {Event} e 
         */
        function seleccionarPonente(e) {
            const ponente = e.target;

            const ponentePrevio = document.querySelector('.listado-ponentes__ponente--seleccionado');

            if(ponentePrevio)
                ponentePrevio.classList.remove('listado-ponentes__ponente--seleccionado');

            ponente.classList.add('listado-ponentes__ponente--seleccionado')

            ponenteInputHidden.value = ponente.dataset.ponenteId;
        }

        function mostrarPonentes() {

            if(ponentesFiltrados.length === 0) {
                const noResultados = document.createElement('P');
                noResultados.classList.add('listado-ponentes__no-resultado');
                noResultados.textContent = 'No hay resultados para tu busqueda';
                ponenteLista.appendChild(noResultados);
            }

            ponentesFiltrados.forEach(p => {
                const ponenteLI = document.createElement('LI');
                ponenteLI.classList.add('listado-ponentes__ponente')
                ponenteLI.textContent = p.nombre;
                ponenteLI.dataset.ponenteId = p.id;
                ponenteLI.addEventListener('click', seleccionarPonente);
                ponenteLista.appendChild(ponenteLI);
            });
        }
        
        async function obtenerPonentes() {
            const url = '/api/ponentes';
            const resultado = await fetch(url);
            const datos = await resultado.json();
            formatearPonentes(datos.data)
        }
        
        
        function formatearPonentes(ponentesArray = []) {
            ponentes = ponentesArray.map(p => {
                return {
                    id: p.id,
                    nombre: `${p.nombre.trim()} ${p.apellido}`
                }
            })

            

        }

        obtenerPonentes();
    }
})