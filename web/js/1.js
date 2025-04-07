App = {
    initialize: () => {
        let defaultFileInput = document.querySelector(
    '#uploadform-imagefile'
        );
        let customFileInput = document.createElement('button');
        customFileInput.classList.add('btn', 'btn-primary');
        customFileInput.innerHTML = 'Change avatar';
        customFileInput.id = 'cfi';
        let formGroup = document.querySelector('.form-group');
        formGroup.prepend(customFileInput);
        // defaultFileInput.style.display = 'none';
        defaultFileInput.addEventListener('change', () => {
            console.log('ch');
        });
        // customFileInput.addEventListener('click', () => {
            // let ev = new MouseEvent('click', {bubbles: true});
            // defaultFileInput.dispatchEvent(ev);
            // trigger(defaultFileInput, 'click')
            // defaultFileInput.click();
        // });
    }
};

document.addEventListener('DOMContentLoaded', App.initialize);