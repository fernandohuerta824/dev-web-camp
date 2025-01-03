(function() {
    const tasgInput = document.querySelector('#tags-input');

    if(tasgInput) {
        let tags = [];
        /**
         * 
         * @param {Event} e 
         */
        const guardarTag = e => {
            if(e.keyCode !== 44) 
                return;
            e.preventDefault();
            const tag = asgInput.value.trim();
            if(!tag)
                return
            else 
                tags = [...tags, tag];
            
            tasgInput.value = '';
        }

        tasgInput.addEventListener('keypress', guardarTag)
    }
})()