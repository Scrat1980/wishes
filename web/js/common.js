let App = {
    initialize: () => {
        let main = document.querySelector('#main');
        main.addEventListener('mouseover', (e) => {
            // console.log();
            if (
                document.querySelector('.hoverish[data-number]')
                && !e.target.contains(document.querySelector('.hoverish[data-number]'))
            ) {
                return;
            }

            let hover = document.querySelector(
                '.hoverish[data-number="' + e.target.dataset.number + '"]'
            );
            if (hover) {
                hover.style.display = 'block';
            }
        });
        main.addEventListener('mouseout', (e) => {
            if (
                document.querySelector('.hoverish[data-number]')
                && !e.target.contains(document.querySelector('.hoverish[data-number]'))
            ) {
                return;
            }
            let hover = document.querySelector(
                '.hoverish[data-number="' + e.target.dataset.number + '"]'
            );
            if (hover) {
                hover.style.display = 'none';
            }
        });
    }
};

document.addEventListener('DOMContentLoaded', App.initialize);