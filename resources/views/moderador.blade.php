<title>vacuNacion | Moredador</title>

<?php
$dataPoints = array(
	array("label"=> 'CONFIRMADOS TOTALES', "y"=> end($covidArray)['confirmados']),
	array("label"=> 'RECUPERADOS', "y"=> end($covidArray)['recuperados']),
    array("label"=> 'DECESOS TOTALES', "y"=> end($covidArray)['decesos'])
)
?>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-200 border-b border-gray-200">
                    BIENVENIDO <b>{{Auth::user()->name}}</b>, usted ingreso con el rol de <b>Moderador</b>.
                    <br>
                    Aqui podra listar y eliminar CALIFICACIONES que no sean relevantes para la aplicacion.
                    <br>
                    Acceda a las calificaciones especificas seleccionando el centro en la pestaña "Centros registrados"
                    <br>
                    <br>
                    <hr />
                    <br>
                    CASOS COVID EN BAHIA BLANCA EN EL DIA <b>{{end ($covidArray)['fecha']}}</b> 🦠
                    <br>
                    <br>
                    <ul>
                        <li><b>CONFIRMADOS: </b>{{(end ($covidArray)['confirmados']) - prev(($covidArray))['confirmados']}}</li>
                        <li><b>ACTIVOS: </b> {{end ($covidArray)['activos']}}</li>
                        <li><b>CONFIRMADOS TOTALES: </b> {{end ($covidArray)['confirmados']}}</li>
                        <li><b style="color:green;">RECUPERADOS TOTALES: </b> {{end ($covidArray)['recuperados']}}</li>
                        <li><b style="color:red;">DECESOS TOTALES: </b> {{end ($covidArray)['decesos']}}</li>
                        <font size=1>Datos aportados por la Municipalidad de Bahia Blanca</font>
                        <br>
                        <br>

                        <!-- Grafico -->
                        <div class="p-6 bg-white border-b border-gray-200 sm:rounded-lg">
                        <script>
                            window.onload = function() {
                                var chart = new CanvasJS.Chart("chartContainer", {
                                    animationEnabled: true,
                                    exportEnabled: true,
                                    theme: "light2",
                                    axisY: {
                                        includeZero: true
                                    },
                                    data: [{
                                        type: "bar",
                                        indexLabelFontColor: "#5A5757",
                                        indexLabelPlacement: "outside",
                                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                    }]
                                });
                                chart.render();
                            }
                        </script>
                        <div id="chartContainer" style="height: 200px; width: 95%;"></div>
                        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                        </div>
                        <br>
                    </ul>
                    <hr />
                    <br>
                    SITUACION DE VACUNAS EN EL PAIS AL DIA DE LA FECHA 💉
                    <br>
                    <br>
                    <ul>
                        <li><b>DISTRIBUIDAS: </b> {{$totales['distribuidas']}} vacunas</li>
                        <li><b>APLICACIONES: </b> {{$totales['aplicaciones']}} dosis aplicadas</li>
                        <li><b>PRIMERA DOSIS: </b> {{$totales['dosis1']}} aplicaciones</li>
                        <li><b>SEGUNDA DOSIS: </b> {{$totales['dosis2']}} aplicaciones</li>
                        <font size=1>Datos aportados por covidstats.com.ar</font>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>