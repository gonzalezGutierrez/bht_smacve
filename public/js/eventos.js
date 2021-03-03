
var _SERVERPATH;
var map;
var _eventos = [] ;

$(document).ready(function(){

    let path = window.location.pathname;
    _SERVERPATH = "";
    if(path.indexOf("/eventos") > -1) {
        let idx = path.indexOf("eventos");
        _SERVERPATH = path.substring(0, idx) + "";
    }

});


function initMap() {

    setTimeout(function(){
        set_eventos_in_map();
    }, 1000);

}


function set_eventos_in_map(){


    $.ajax({
        async: true,
        type: "POST",
        dataType: "json",
        //contentType: "application/x-www-form-urlencoded",
        cache: false,
        contentType: false,
        processData: false,
        url: _SERVERPATH+"eventos_json",
        data: '',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        beforeSend: '',
        success: function (datos) {

            var styledMapType = new google.maps.StyledMapType(
                [
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#e9e9e9"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#dedede"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "saturation": 36
                            },
                            {
                                "color": "#333333"
                            },
                            {
                                "lightness": 40
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    }
                ],
                {name: 'Styled Map'});

            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 12.754653, lng: -15.292969},
                zoom:2,
                scrollwheel: false
            });


            //Associate the styled map with the MapTypeId and set it to display.
            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');

            let markers = [];

            for(let i=0; i<datos.length; i++){

                _eventos[datos[i].idEvento] = datos[i];

                let myLatLng = {
                    lat: parseFloat(datos[i].latitud) ,
                    lng: parseFloat(datos[i].longitud)
                };

                let marker = new google.maps.Marker({
                    position: myLatLng,
                    id: datos[i].idEvento,
                    title: datos[i].titulo,
                    icon: _SERVERPATH+"images/map/evento-icon-blue.png"
                });

                marker.addListener('click', function() {
                    show_info_windows(this);
                });

                markers.push(marker);
            }

            let options = {
                imagePath: _SERVERPATH+'libraries/js-marker-clusterer/images/m',
                gridSize: 10
            };

            let markerCluster = new MarkerClusterer(map, markers,options);
        },
        error: function () {

        },
        complete: function (xhr, status) {
        }
    });
}

function show_info_windows(marker){

    let evento = _eventos[marker.id];


    let contentString =  "<div class='infowindow'>";
    contentString += "<div class='title'>"+evento.titulo+"</div>";
    contentString += "<p class='description'>"+evento.descripcion+"</p>";
    contentString += "<div class='text-right'>";
    contentString += "<a type='button' href='"+evento.link+"' target='_blank' class='btn btn-outline-dark btn-sm'>Más Información</a>";
    contentString += "</div>";
    contentString += "</div>";


    let infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 400
    });

    infowindow.open(map, marker);
}
