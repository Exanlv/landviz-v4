document.getElementById('path94').onclick = function () {
    alert('boop');
}

document.getElementById('special-snowflake').onclick = function () {
    Array.from(document.getElementsByClassName('snowflake')).forEach((snowflake) => {
        snowflake.classList.add('rainbow');
    })
}

setTimeout(function () {
    const header = document.getElementById('header');

    header.style.backgroundImage = 'url("/public/assets/img/header-bg.gif")';
    header.style.backgroundPosition = '50% 40%';
}, 8000000);
