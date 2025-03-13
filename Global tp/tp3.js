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