let App = {
    initialize: () => {
        let main = document.querySelector('#main');
        let cards = document.querySelectorAll('.mycard');
        main.addEventListener('mouseover', (e) => {
            for (let i in cards) {
                if (
                    cards[i].contains(e.target)
                ) {
                    let hover = document.querySelector(
                        '.hoverish[data-number="' + cards[i].dataset.number + '"]'
                    );
                    if (hover) {
                        hover.style.display = 'block';
                    }

                    console.log(hover);
                    break;
                }
            }
        });
        main.addEventListener('mouseout', (e) => {
            for (let i in cards) {
                if (
                    cards[i].contains(e.target)
                ) {
                    let hover = document.querySelector(
                        '.hoverish[data-number="' + cards[i].dataset.number + '"]'
                    );
                    if (hover) {
                        hover.style.display = 'none';
                    }

                    console.log(hover);
                    break;
                }
            }
        });
    }
};

document.addEventListener('DOMContentLoaded', App.initialize);