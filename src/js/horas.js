document.addEventListener('DOMContentLoaded', () => {
    const horas = document.querySelector('#horas')

    if(horas) {
        const categoria = document.querySelector('#categoria');
        const dias = document.querySelector('#dia');
        const inputHiddenDia = document.querySelector('[name="dia_id"]');
        const inputHiddenHora= document.querySelector('[name="hora_id"]');

        
        let busqueda = {
            categoria_id: +categoria.value,
            dia_id: +dias.value
        }

        buscarEventos();
        
        /**
         * 
         * @param {Event} e 
        */

        let horaAnterior = null;
        function seleccionarHora (e) {
            const id = +e.target.dataset.horaId;
            inputHiddenHora.value = id;
            console.log(e.target)
            if(horaAnterior)
                horaAnterior.classList.remove('horas__hora--seleccionada');
            horaAnterior = e.target;
            e.target.classList.add('horas__hora--seleccionada');
            
        }
        
        /**
         * 
         * @param {Array<{id: int, categoria_id: int, dia_id: int, hora_id: int}>} eventos 
         */
        function obtenerHoras(eventos) {
            const horasDispo = document.querySelectorAll('.horas__hora');
            horasDispo.forEach(h => {

                if(!eventos.some(e => e.hora_id === +h.dataset.horaId)) {
                    h.addEventListener('click', seleccionarHora);
                    h.classList.remove('horas__hora--deshabilitada');
                } else {
                    h.classList.add('horas__hora--deshabilitada');
                    h.classList.remove('horas__hora--seleccionada');
                    h.removeEventListener('click', seleccionarHora)
                    if(inputHiddenHora.value === h.dataset.horaId)
                        inputHiddenHora.value = '';
                }
            })
        }

        async function buscarEventos() {
            if(Object.values(busqueda).includes(0))
                return;
            try {
                const url = `/api/eventos-horario?dia_id=${busqueda.dia_id}&categoria_id=${busqueda.categoria_id}`;
                const resultado = await fetch(url);
                const datos = await resultado.json();
                const { data: eventos } = datos

                obtenerHoras(eventos);
            } catch (error) {
                console.log(error);
            }
            
        }
        /**
         * 
         * @param {Event} e 
         */
        function manejarBusqueda (e) {
            busqueda[e.target.name] = +e.target.value;

            buscarEventos();
        }

        categoria.addEventListener('change', manejarBusqueda)

        dias.addEventListener('change', manejarBusqueda)
    }
})