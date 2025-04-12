App = {
    initialize: () => {
        let cards = document.querySelector('.cards');
        cards.addEventListener('mouseover', (e) => {
            if (
                !e.target.classList.contains('mycard')
                && !e.target.parentElement.classList.contains('mycard')
            ) { return; }

            let hoverish = document.querySelectorAll('.hoverish')
                e.target.firstElementChild.firstElementChild;
            // hoverish.style.display = 'block';
            // console.log(
            //     !e.target.classList.contains('mycard')
            //     && !e.target.parentElement.classList.contains('mycard')
            // );
            console.log(e.target.parentElement);
            console.log(e.target);
        });
        // cards.addEventListener('mouseout', (e) => {
        //     if (!e.target.classList.contains('mycard')) { return; }
        //
        //     let hoverish = e.target.firstElementChild.firstElementChild;
        //     hoverish.style.display = 'none';
        // });
    }
};

document.addEventListener('DOMContentLoaded', App.initialize);