/*

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GPS</title>
</head>
<body>
<h1 class="app-name">GeoEar</h1>
<h2 class="app-goal">местоположение <br> без интернета!</h2>
<div class="data">Широта: <span class="lat">...</span></div>
<div class="data">Долгота: <span class="lng">...</span></div>
<div class="data">Точность: <span class="acc">...</span></div>

<br>
<div class="data">итерация(5 сек.): <span class="iteration">...</span></div>

</body>


</html>
*/




    document.write('Начало<br>');

    /*
    if (navigator.geolocation) {

        // Геолокация доступна
        alert('Геолокация доступна');

    } else {

        // Геолокация не доступна
        alert('Геолокация не доступна');
    }
    */



    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };

    let Itr = 0;
    let vLat = document.querySelector('.lat');
    let vLng = document.querySelector('.lng');
    let vAcc = document.querySelector('.acc');
    let vItr = document.querySelector('.iteration');

   let success = function(position) {

        document.write('success<br>');
        vLat.innerHTML = '';
        vLng.innerHTML = '';
        vAcc.innerHTML = '';
        vItr.innerHTML = '';
        vLat.innerHTML = position.coords.latitude.toFixed(5);
        vLng.innerHTML = position.coords.longitude.toFixed(5);
        vAcc.innerHTML = "&#177;" + position.coords.accuracy.toFixed(0);

        vItr.innerHTML = Itr;
        Itr++;
       document.write("\nlat "+ position.coords.latitude.toFixed(5) + '<br>');
       document.write("\nlng "+ position.coords.longitude.toFixed(5) + '<br>');

    }

     let error = function(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
    }

    // navigator.geolocation.getCurrentPosition(success, error, options);

    window.setInterval(function(){
        document.write('Начало цикла<br>');
        /// call your function here
        navigator.geolocation.getCurrentPosition(success, error, options);
        document.write('\Конец цикла<br>');

    }, 5000);

 


