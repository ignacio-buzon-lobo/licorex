<?php
// Incluye el archivo de conexión a la base de datos
include('connection.php')
  ?>

<!DOCTYPE html>
<html>

<head>
  <!-- Required meta tags-->
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <!-- Color theme for statusbar (Android only) -->
  <meta name="theme-color" content="#2196f3">
  <!-- Titulo de la app -->
  <title>LicoreX</title>
  <!-- Ruta a la Framework7 Library Bundle CSS -->
  <link rel="stylesheet" href="node_modules\framework7\framework7-bundle.min.css">
  <!-- Rutas a los estilos personalizados -->
  <link rel="stylesheet" href="css\estilos.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
  <?php

  // Comprueba si se han enviado los datos del formulario
  if (isset($_POST['fecha']) && isset($_POST['efectivo']) && isset($_POST['tpv1']) && isset($_POST['tpv2'])) {

    $fecha = $_POST["fecha"];
    $efectivo = $_POST["efectivo"];
    $tpv1 = $_POST["tpv1"];
    $tpv2 = $_POST["tpv2"];
    $total = $efectivo + $tpv1 + $tpv2;

    // Preparar la consulta SQL
    $stmt = $pdo->prepare("INSERT INTO cajas (fecha, efectivo, tpv1, tpv2, total) 
                          VALUES (:fecha, :efectivo, :tpv1, :tpv2, :total)
                          ON DUPLICATE KEY UPDATE efectivo=:efectivo, tpv1=:tpv1, tpv2=:tpv2, total=:total");

    // Vincular los parámetros con los valores
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':efectivo', $efectivo);
    $stmt->bindParam(':tpv1', $tpv1);
    $stmt->bindParam(':tpv2', $tpv2);
    $stmt->bindParam(':total', $total);

    // Ejecutar la consulta
    $stmt->execute();

    // Si no se han enviado los datos del formulario, inicializa las variables a valores predeterminados
  
  } else {
    $fecha = '';
    $efectivo = '';
    $tpv1 = '';
    $tpv2 = '';
  }


  // cerrar la conexión
  $conn = null;
  ?>



  <div id="app">
    <!-- Menu lateral -->
    <div class="panel panel-left fondo-panel">
      <div>
        <!-- Icono app -->
        <img src="images/logoapp.png" class="external">
      </div>
      <div class="list" style="margin-top: 0;">
        <!-- Elementos del menu lateral -->
        <ul>
          <li><a href="home.php" class="item-link item-content external" style="margin-top: 0;">INICIO<i
                class="material-icons icono">home</i></a></li>
          <li><a href="hacerpedidos.php" class="item-link item-content external">HACER PEDIDO<i
                class="material-icons icono">shopping_cart</i></a></li>
          <li><a href="registropedidos.php" class="item-link item-content external">REGISTRO PEDIDOS<i
                class="material-icons icono">receipt</i></a></li>
          <li><a href="distribuidores.php" class="item-link item-content external">DISTRIBUIDORES<i
                class="material-icons icono">contact_mail</i></a></li>
          <li><a href="hacercaja.php" class="item-link item-content external">HACER CAJA<i
                class="material-icons icono">euro</i></a></li>
          <li><a href="registrocaja.php" class="item-link item-content external">REGISTRO CAJAS<i
                class="material-icons icono">list_alt</i></a></li>
        </ul>
      </div>
      <div>
        <!-- Letras logo app -->
        <img src="images/letraslic.png" class="external" style="position: absolute; bottom: 0;">
      </div>
    </div>

    <div class="view view-main">
      <div data-name="home" class="page">

        <!-- Top Navbar -->
        <div class="navbar">
          <div class="navbar-bg"></div>

          <div class="navbar-inner">
            <div class="left">
              <!-- Icono de las tres lineas que despliega el panel lateral -->
              <a href="#" class="link panel-open" data-panel="left" data-panel-id="panel-menu">
                <span class="material-symbols-outlined">
                  menu
                </span>
              </a>

            </div>
            <div class="title">
              <!-- Imagen letras LicoreX -->
              <img src="images/letraslic.png" class="external img1">
            </div>
          </div>
        </div>

        <!-- BOTONES DE ABAJO -->
        <div class="toolbar toolbar-bottom">
          <div class="toolbar-inner pie">
            <!-- Enlaces de los botones de abajo con sus respectivos iconos -->
            <a href="home.php" class="item-link item-content external">
              <i class="material-icons icono">home</i>
            </a>
            <a href="hacerpedidos.php" class="item-link item-content external">
              <i class="material-icons icono">shopping_cart</i>
            </a>

            <a href="distribuidores.php" class="item-link item-content external">
              <i class="material-icons icono">contact_mail</i>
            </a>
            <a href="hacercaja.php" class="item-link item-content external">
              <i class="material-icons icono">euro</i>
            </a>
            <a href="registrocaja.php" class="item-link item-content external">
              <i class="material-icons icono">list_alt</i>
            </a>
          </div>
        </div>

        <!-- Contenido de la página sobre el que se puede hacer scroll -->
        <div class="page-content">
          <div class="block-title">REGISTRO DE CAJAS:</div>
          <!-- Datatable de las cajas -->
          <div class="data-table">
            <table>
              <thead>
                <tr>
                  <th class="label-cell" style="color: #D0BDA4; font-weight: bold;">Fecha</th>
                  <th class="numeric-cell" style="color: #D0BDA4; font-weight: bold;">Efectivo</th>
                  <th class="numeric-cell" style="color: #D0BDA4; font-weight: bold;">TPV1</th>
                  <th class="numeric-cell" style="color: #D0BDA4; font-weight: bold;">TPV2</th>
                  <th class="numeric-cell" style="color: #D0BDA4; font-weight: bold;">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Conecta con la base de datos
                require("connection.php");
                // Se hace una consulta a la base de datos para obtener los datos de las cajas ordenados por fecha descendente
                $sql = $pdo->query("SELECT * FROM cajas ORDER BY fecha DESC");
                // Se muestran las cajas en la tabla                    
                while ($resultado = $sql->fetch(PDO::FETCH_ASSOC)) {
                  echo '<tr>';

                  echo '<td class="label-cell">' . date('d-m-y', strtotime($resultado['fecha'])) . '</td>';
                  echo '<td class="numeric-cell">' . $resultado['efectivo'] . '€</td>';
                  echo '<td class="numeric-cell">' . $resultado['tpv1'] . '€</td>';
                  echo '<td class="numeric-cell">' . $resultado['tpv2'] . '€</td>';
                  echo '<td class="numeric-cell">' . $resultado['total'] . '€</td>';

                  echo '</tr>';
                }

                ?>

              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>


  </div>
  </div>
  </div>
  <!-- Ruta a la Framework7 Library Bundle JS-->
  <script type="text/javascript" src="node_modules\framework7\framework7-bundle.min.js"></script>
  <!-- Ruta al archivo js de la app-->
  <script type="text/javascript" src="js\app.js"></script>
</body>

</html>