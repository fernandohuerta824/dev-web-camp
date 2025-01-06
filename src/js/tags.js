document.addEventListener('DOMContentLoaded', function() {
    const tasgInput = document.querySelector('#tags-input');
    
    if(tasgInput) {
        const tagsDiv = document.querySelector('#tags');
        const tagsInputHidden = document.querySelector('[name="tags"]')
        const tagExito = document.querySelector('.alerta.alerta--exito');

        if(tagExito) {
            setTimeout(() => tagExito.remove(), 5000);
        }

        let tags = !tagsInputHidden.value ? [] : tagsInputHidden.value.split(',');
        mostrarTags();

        function actualizarInputHidden() {
            tagsInputHidden.value = tags.toString();
        }
        
        /**
         * Elimina un tag seleccionado.
         * @param {Event} e Evento del clic.
         */
        function eliminarTag(e) {
            const tag = e.target.textContent;
        
            tags = tags.filter(function(t) {
                return t !== tag;
            });
            e.target.remove();
            actualizarInputHidden();
        }
        
        /**
         * Muestra los tags en la interfaz.
         */
        function mostrarTags() {
            tagsDiv.textContent = '';
        
            tags.forEach(function(tag) {
                const tagLi = document.createElement('LI');
                tagLi.classList.add('formulario__tag');
                tagLi.textContent = tag;
                tagLi.addEventListener('click', eliminarTag);
                tagsDiv.appendChild(tagLi);
            });
        }
        
        /**
         * Guarda un tag al presionar una tecla específica (coma en este caso).
         * @param {Event} e Evento de teclado.
         */
        function guardarTag(e) {
            if (e.keyCode !== 44) {
                return;
            }
        
            e.preventDefault();
            const tag = tasgInput.value.trim();
        
            if (!tag) {
                return;
            }
        
            tags = tags.concat(tag);
            mostrarTags();
            actualizarInputHidden();
        
            tasgInput.value = '';
        }
        

        tasgInput.addEventListener('keypress', guardarTag)
    }
})