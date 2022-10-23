<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    
   
    <?php 
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php", "", $archivo);
        if($pagina == 'invitados'){
            echo '<link rel="stylesheet" href="css/colorbox.css">';
        }else if($pagina == 'conferencias'){
            echo '<link rel="stylesheet" href="css/lightbox.css">';
        }else if($pagina == 'index'){
           echo '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>';
   echo '<link rel="stylesheet" href="css/colorbox.css">';
        }
    ?>

    <!-- font awesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <meta name="theme-color" content="#fafafa">

</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!-- Add your site or application content here -->

    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                </nav>
                <div class="informacion-evento">
                    <div class="clearfix"></div>
                    <p class="fecha"><i class="fas fa-calendar-alt" aria-hidden="true"></i> 10-12 Dic</p>
                    <p class="ciudad"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Venezuela</p>
                </div>
                <h1 class="nombre-sitio">GDLWEBCAMP</h1>
                <p class="slogan">La mejor Conferencia de <span>diseño web</span></p>
            </div>
        </div>
        </div>
    </header>

    <div class="barra">
        <div class="contenedor clearfix">

            <div class="logo">
                <a href="index.php"><img src="img/logo.svg" alt="logo"></a>
            </div>

            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="navegacion-principal clearfix">
                <a href="conferencias.php">Conferencias</a>
                <a href="calendario.php">Calendario</a>
                <a href="invitados.php">Invitados</a>
                <a href="registro.php">Reservaciones</a>
            </nav>

        </div>
    </div>