let App = {
    initialize: () => {
        let main = document.querySelector('#main');
        let square = document.querySelector('.test');
        let button = document.querySelector('#bb');
        let hover = document.querySelector('.hoverish');
        main.addEventListener('mouseover', (e) => {
            if (
                e.target !== square
                // || e.target !== button
            )
            {
                return;
            }
            // console.log(e.target);
            hover.style.display = 'block';
        });
        main.addEventListener('mouseout', (e) => {
            if (
                e.target !== square
                // || e.target !== button
            )
            {
                return;
            }
            hover.style.display = 'none';
        });
    }
};

document.addEventListener('DOMContentLoaded', App.initialize);