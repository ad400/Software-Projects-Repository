document.addEventListener('DOMContentLoaded', () => {
    function updateTotalPrice() {
        const city = document.getElementById('city').value;
        const isStudent = document.getElementById('etudiant_yes').checked;
        let price = 0;

        if (city) {
            switch (city) {
                case 'rabat':
                    price = 40;
                    break;
                case 'mohammedia':
                    price = 20;
                    break;
                case 'marrakech':
                    price = 150;
                    break;
                case 'tanger':
                    price = 290;
                    break;
            }

            if (isStudent) {
                price *= 0.5;
            }
        }

        document.getElementById('totprix').textContent = `${price} DH`;
    }

    document.querySelectorAll('#city, #etudiant_yes, #etudiant_no')
    .forEach(el => el.addEventListener('change', updateTotalPrice));

});
document.addEventListener('DOMContentLoaded', () => {
 
    document.getElementById('dark').addEventListener('click', () => {
        document.querySelector('header').style.backgroundColor = '#000';
        document.querySelector('footer').style.backgroundColor = '#000';
        document.querySelector('header').style.color = '#fff';
        document.querySelector('footer').style.color = '#fff';
    });

    document.getElementById('blue').addEventListener('click', () => {
        document.querySelector('header').style.backgroundColor = '#00f';
        document.querySelector('footer').style.backgroundColor = '#00f';
        document.querySelector('header').style.color = '#fff';
        document.querySelector('footer').style.color = '#fff';
    });

    document.getElementById('red').addEventListener('click', () => {
        document.querySelector('header').style.backgroundColor = '#f00';
        document.querySelector('footer').style.backgroundColor = '#f00';
        document.querySelector('header').style.color = '#fff';
        document.querySelector('footer').style.color = '#fff';
    });
});