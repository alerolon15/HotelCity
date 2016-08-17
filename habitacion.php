<!DOCTYPE html>
<html lang="es">
<head>
  <title>Consulta</title>


</head>
<body>
  <pre>
    <?php
      $conexion=mysqli_connect("mysql.hostinger.com.ar","u837072465_hotel","hotelcity","u837072465_enc") or
          die("Problemas con la conexión");

      $todo=mysqli_query($conexion,"SELECT * FROM Encuesta WHERE nroHab = '$_REQUEST[NroHabitacion]'")
          or die("Problemas en el select".mysqli_error($conexion));

if ($reg=mysqli_fetch_array($todo)){
      while ($reg=mysqli_fetch_array($todo))
        {
          echo "Numero de Consulta:".$reg['id']."<br>";
          echo "Nro Habitacion:    ".$reg['nroHab']."<br>";
          echo "Personal:          ".$reg['Pregunta1']."<br>";
          echo "Decoracion:        ".$reg['Pregunta2']."<br>";
          echo "Limpieza           ".$reg['Pregunta3']."<br>";
          echo "Desayuno:          ".$reg['Pregunta4']."<br>";
          echo "Wi-Fi:             ".$reg['Pregunta5']."<br>";
          echo "Precio/Calidad:    ".$reg['Pregunta6']."<br>";
          echo "Hotel:             ".$reg['Pregunta7']."<br>";
          echo "<hr>";
          $count = $reg['id'];
          $promedio1 = $promedio1 + $reg['Pregunta1'];
          $promedio2 = $promedio2 + $reg['Pregunta2'];
          $promedio3 = $promedio3 + $reg['Pregunta3'];
          $promedio4 = $promedio4 + $reg['Pregunta4'];
          $promedio5 = $promedio5 + $reg['Pregunta5'];
          $promedio6 = $promedio6 + $reg['Pregunta6'];
          $promedio7 = $promedio7 + $reg['Pregunta7'];
        }
        echo "Cantidad de Encuestas: ".$count."<br>";
        $promedio1 = $promedio1/$count;
        $promedio2 = $promedio2/$count;
        $promedio3 = $promedio3/$count;
        $promedio4 = $promedio4/$count;
        $promedio5 = $promedio5/$count;
        $promedio6 = $promedio6/$count;
        $promedio7 = $promedio7/$count;
        echo "Promedios de puntuacion: "."<br>";
        echo "Personal:          ".round($promedio1,1)."<br>";
        echo "Decoracion:        ".round($promedio2,1)."<br>";
        echo "Limpieza:          ".round($promedio3,1)."<br>";
        echo "Desayuno:          ".round($promedio4,1)."<br>";
        echo "Wi-Fi:             ".round($promedio5,1)."<br>";
        echo "Precio/Calidad:    ".round($promedio6,1)."<br>";
        echo "Hotel:             ".round($promedio7,1)."<br>";
        echo "<hr>";
}else {
  echo "no Existen Registros de esta Habitacion!";
}
      mysqli_close($conexion);
    ?>
</pre>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.bundle.js"></script>

<div width="400px" height="400px">
<canvas id="myChart"></canvas></div>

<script>
var nroHabit = <?php echo $_REQUEST[NroHabitacion]; ?>;
var count = <?php echo $count; ?>;
var promedio1 = <?php echo $promedio1; ?>;
var promedio2 = <?php echo $promedio2; ?>;
var promedio3 = <?php echo $promedio3; ?>;
var promedio4 = <?php echo $promedio4; ?>;
var promedio5 = <?php echo $promedio5; ?>;
var promedio6 = <?php echo $promedio6; ?>;
var promedio7 = <?php echo $promedio7; ?>;

var ctx = document.getElementById("myChart");

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Personal", "Decoracion", "Limpieza", "Desayuno", "WI-FI", "Precio/calidad", "Hotel"],
        datasets: [{
            label: "Habitacion Nro: " + nroHabit,
            data: [promedio1,promedio2,promedio3,promedio4,promedio5,promedio6,promedio7],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

</body>
</html>
