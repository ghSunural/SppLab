ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map('map', {
        center: [59.994675, 29.702651],// Москва
        zoom: 5,
        controls: ['zoomControl', 'typeSelector', 'fullscreenControl', 'rulerControl', 'searchControl']


    });


  //  window.onload(function (e) {
        ymaps.geoXml.load('http://spplab.000webhostapp.com/resource/content/generated/AllEarthquakes.kml')
            .then(onGeoXmlLoad);
    //    e.target.disabled = true;


   // });


    // Обработчик загрузки XML-файлов.
    function onGeoXmlLoad(res) {
        myMap.geoObjects.add(res.geoObjects);
        if (res.mapState) {
            res.mapState.applyToMap(myMap);
        } else {
            myMap.setBounds(res.geoObjects.getBounds());
        }
    }
}