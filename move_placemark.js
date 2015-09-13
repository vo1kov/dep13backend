ymaps.ready(function () {

function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

 workerPlacemark = new ymaps.Placemark([55.77782, 37.49426], 
	{        
	 	hintContent: 'Мастер 1',
    balloonContent: 'Иванов Иван Иванович'
    },
	{
		iconLayout: 'default#image',
    iconImageHref: 'map/red_w.png',
    iconImageSize: [52, 52],
    //overlayFactory: 'default#interactiveGraphics',
    iconImageOffset: [-26, -26]
	}); 

myMap.geoObjects.add(workerPlacemark); 


// (1) создать объект для запроса к серверу
var req = getXmlHttp();

setInterval(getPositionFromServer, 1000);

function getPositionFromServer() {
    req.onreadystatechange = function() { 
        // onreadystatechange активируется при получении ответа сервера
        if (req.readyState == 4) {
            //req.statusText // показать статус (Not Found, ОК..)
            if(req.status == 200) {
                 obj = JSON.parse(req.responseText);
                //alert(req.responseText);
                workerPlacemark.geometry.setCoordinates([obj.points[0].Latitude, obj.points[0].Longitude]);
            }
            // тут можно добавить else с обработкой ошибок запроса
        }
    }

    req.open('GET', 'new_place.php', true); 
    req.send(null);  // отослать запрос
}

});


