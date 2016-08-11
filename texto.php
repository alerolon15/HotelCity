<html>
<html>
<head>
  <title>Consulta</title>
</head>
<body>
  <pre>
    <?php
      $conexion=mysqli_connect("mysql.hostinger.com.ar","u837072465_hotel","hotelcity","u837072465_enc") or
          die("Problemas con la conexión");

      $todo=mysqli_query($conexion,"SELECT * FROM Encuesta")
          or die("Problemas en el select".mysqli_error($conexion));


      while ($reg=mysqli_fetch_array($todo))
        {
          echo "Numero de Consulta:".$reg['id']."<br>";
          echo "Nro Habitacion:    ".$reg['nroHab']."<br>";
          echo "Estadia:           ".$reg['Pregunta1']."<br>";
          echo "Comida:            ".$reg['Pregunta2']."<br>";
          echo "Decoracion:        ".$reg['Pregunta3']."<br>";
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
        echo "Estadia:           ".round($promedio1,1)."<br>";
        echo "Comida:            ".round($promedio2,1)."<br>";
        echo "Decoracion:        ".round($promedio3,1)."<br>";
        echo "Desayuno:          ".round($promedio4,1)."<br>";
        echo "Wi-Fi:             ".round($promedio5,1)."<br>";
        echo "Precio/Calidad:    ".round($promedio6,1)."<br>";
        echo "Hotel:             ".round($promedio7,1)."<br>";
        echo "<hr>";

      mysqli_close($conexion);
    ?>
</pre>
</body>
</html>
