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
        formGroup.append(customFileInput);
        defaultFileInput.style.display = 'none';
        customFileInput.addEventListener('click', () => {
            defaultFileInput.click();
        });
    }
};

document.addEventListener('DOMContentLoaded', App.initialize);