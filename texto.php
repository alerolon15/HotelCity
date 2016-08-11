<html>
<head>
  <title>Problema</title>
</head>
<body>
    <?php
      $conexion=mysqli_connect("mysql.hostinger.com.ar","u837072465_hotel","hotelcity","u837072465_enc") or
          die("Problemas con la conexión");

      mysqli_query($conexion,"select * from 'Encuesta'")
        or die("Problemas en el select".mysqli_error($conexion));

      mysqli_close($conexion);

      echo "Se probo todo bien!";
    ?>

    <?php
    $serverName = "mysql.hostinger.com.ar"; //serverName\instanceName
    $connectionInfo = array( "Database"=>"u837072465_enc", "UID"=>"u837072465_hotel", "PWD"=>"hotelcity");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

    if( $conn ) {
         echo "Conexión establecida.<br />";
    }else{
         echo "Conexión no se pudo establecer.<br />";
         die( print_r( sqlsrv_errors(), true));
    }
    ?>
</body>
</html>
