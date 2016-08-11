<html>
<html>
<head>
  <title>Problema</title>
</head>
<body>
    <?php
      $conexion=mysqli_connect("mysql.hostinger.com.ar","u837072465_hotel","hotelcity","u837072465_enc") or
          die("Problemas con la conexión");

      mysqli_query($conexion,"insert into Encuesta(nroHab,Pregunta1,Pregunta2,Pregunta3,Pregunta4,Pregunta5,Pregunta6,Pregunta7) values ('$_REQUEST[NroHabitacion]','$_REQUEST[Pregunta1]','$_REQUEST[Pregunta2]','$_REQUEST[Pregunta3]','$_REQUEST[Pregunta4]','$_REQUEST[Pregunta5]','$_REQUEST[Pregunta6]','$_REQUEST[Pregunta7]')")
        or die("Problemas en el select".mysqli_error($conexion));

      mysqli_close($conexion);
      if( $conexion ) {
           echo "Conexión establecida.";
      }else{
           echo "Conexión no se pudo establecer.";
           die( print_r( sqlsrv_errors(), true));
      }

    ?>
    <script type="text/javascript">
        window.location = "index.html"
    </script>
</body>
</html>
