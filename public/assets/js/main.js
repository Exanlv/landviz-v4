document.getElementById('path94').onclick = function () {
    alert('boop');
}

document.getElementById('special-snowflake').onclick = function () {
    Array.from(document.getElementsByClassName('snowflake')).forEach((snowflake) => {
        snowflake.classList.add('rainbow');
    })
}
