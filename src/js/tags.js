(function() {
    const tasgInput = document.querySelector('#tags-input');
    
    if(tasgInput) {
        const tagsDiv = document.querySelector('#tags');
        const tagsInputHidden = document.querySelector('[name="tags"]')
        let tags = [];

        const actualizarInputHidden = () => {
            tagsInputHidden.value = tags.toString();
        }

        /**
         * 
         * @param {Event} e 
         */
        const eliminarTag = e => {
            const tag = e.target.textContent;

            tags = tags.filter(t => t !== tag )
            e.target.remove();
            actualizarInputHidden();
        }

        const mostrarTags = () => {
            tagsDiv.textContent = '';

            tags.forEach(tag => {
                const tagLi = document.createElement('LI');
                tagLi.classList.add('formulario__tag');
                tagLi.textContent = tag;
                tagLi.addEventListener('click', eliminarTag);
                tagsDiv.appendChild(tagLi);
            })
        }

        /**
         * 
         * @param {Event} e 
         */
        const guardarTag = e => {
            if(e.keyCode !== 44) 
                return;
            e.preventDefault();
            const tag = tasgInput.value.trim();
            if(!tag)
                return
            else {
                tags = [...tags, tag];
                mostrarTags();
                actualizarInputHidden();
            }
            
            tasgInput.value = '';
        }

        tasgInput.addEventListener('keypress', guardarTag)
    }
})()