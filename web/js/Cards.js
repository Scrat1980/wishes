App.Cards = {
    initialize: () => {
        let main = document.querySelector('#main');
        main.addEventListener(
            'mouseover',
            (e) => { App.Cards.toggleButton(e, 'block'); }
        );
        main.addEventListener(
            'mouseout',
            (e) => { App.Cards.toggleButton(e, 'none'); }
        );
    },
    toggleButton: (e, displayType) => {
        let cards = document.querySelectorAll('.mycard');
        for (let i in cards) {
            if (
                cards[i]
                && cards[i] instanceof HTMLElement
                && cards[i].contains(e.target)
            ) {
                let hover = document.querySelector(
                    '.hoverish[data-number="' + cards[i].dataset.number + '"]'
                );
                hover.style.display = displayType;
                break;
            }
        }
    }
};