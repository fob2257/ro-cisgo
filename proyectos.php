<?php
  $proscan = array(
    'nombre' => 'ProScan',
    'descripcion' => 'Durante la clasificación electrónica nos entrega con precisión la clasificación de canales en rastros y salas de corte mediante visión artificial. El sistema realiza un análisis del músculo longissimus dorsi (ribeye) localizado entre la 12va y 13va costilla de un canal, mediante algoritmos de visión artificial.',
    'proceso' => [
        'Marmoleo',
        'Espesor de grasa dorsal',
        'Área del ribeye',
        'Color de carne y grasa',
        'Rendimiento y clasificación'
    ],
    'marmoleo' => 'El sistema obtiene con precisión el nivel de marmoleo, tarea difícil mediante inspección visual.',
    'area' => 'El sistema realiza una segmetación sobre una imagen digital del Rib Eye, permitiendo conocer su área con precisión.',
    'color' => 'Factor decisivo para el consumidor en el punto de venta. El sistema puede obtener el color de la carne y grasa en coordenadas CIE-Lab mediante procesamiento de imágenes.',
    'objetivo' => 'Determinar si el algoritmo de clasificación utilizado por el ProScan tiene variantes importantes al cambiar el ángulo de la imágen captada.',
    'otros' => [
        'Registros estadísticos para el control de calidad',
        'Adaptación del software a solicitud del cliente',
        'Instalación del equipo bajo ambiente de red local'
    ]
  );

  /** Metodo para crear array con las imagenes del producto */
  function getimagenes($cliente) {
    $path = 'img/proyectos/'.$cliente;             // Directorio
    $imgs = [];                // Array con los archivos
    if(is_dir($path)) {
      $dir = opendir($path);      // Abriendo el directorio

      while (($file = readdir($dir)) !== false) {
          $fullfilename = realpath($path.'/'.$file);
          if ($file != "." && $file != ".." && is_file($fullfilename)) {
              $img = [];
              $img['file'] = $file;
              $img['fullfile'] = $fullfilename;
              array_push($imgs, $img);                      // metiendolo el webm al array de webms
          }
      }
    }

    // Usar <=> para php>v7 y usar - para php<v7
    usort($imgs, function($a, $b) {
        return $a['file'] - $b['file'];
    });
    
    // var_dump($imgs);

    return $imgs;
  }

  /** checando que tengamos un cliente en el uri */
  if(!empty($_GET['id'])) {
    $cliente = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    switch($cliente) {
      case 'proscan':
        $info = $proscan;
        break;
    }
    $imgs = getimagenes($cliente);
  }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Cisgo - Consultoría, Innovación y Soluciones" />
        <meta name="keywords" content="Cisgo, Consultoria, Innovacion, Soluciones, Proyectos, Tecnologia, Capital Humano" />
        <title>Cisgo –
            <?php echo ucfirst($cliente); ?>
        </title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="slick-1.6.0/slick/slick.css">
        <link rel="stylesheet" href="slick-1.6.0/slick/slick-theme.css">
        <link rel="stylesheet" href="css/owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owlcarousel/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/cisgo.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        <link rel="icon" type="image/png" href="img/favicon.png" sizes="32x32">
        <link rel="icon" type="image/png" href="img/favicon.png" sizes="16x16">
    </head>

    <body>
        <!-- Navbar -->
        <div id="navbar">
            <nav id="navbar-cisgo" class="navbar navbar-default navbar-fixed-top bignav">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-cisgo-ul" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                        <a class="navbar-brand" href="index.html#inicio">
            <img class="logo-invisible" alt="CISGO" src="img/cropped-logocisgomr.png">
          </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-cisgo-ul">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.html#inicio">INICIO</a></li>
                            <li><a href="index.html#nosotros">NOSOTROS</a></li>
                            <li><a href="index.html#servicios">SERVICIOS</a></li>
                            <li><a href="index.html#clientes">CLIENTES</a></li>
                            <li><a href="index.html#alianzas">ALIANZAS</a></li>
                            <li><a href="index.html#testimonios">TESTIMONIOS</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">PROYECTOS
                            <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="proyectos.php?id=proscan">ProsCan</a></li>
                                </ul>
                            </li>
                            <li><a href="index.html#contacto">CONTACTO</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
        <!-- ./Navbar -->

        <div id="proyectos">
            <div class="row proyectos-padding">
                <div class="col-md-12">
                    <div class="row">
                        <h3>
                            <?php echo ucfirst($info['nombre']); ?>
                        </h3>
                        <div class="col-md-6 padding-right">
                            <div class="galeriaslick">
                                <!-- Generandolos con php -->
                                <?php foreach($imgs as $img){ ?>
                                <div class="img-galeria"><img data-lazy="img/proyectos/<?php echo $cliente.'/'.$img['file']; ?>" alt="<?php echo $img['file']; ?>">
                                    <div class="overlay"></div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="proyectos-inner">

                            <div id="accordion-id">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel-group" id="accordion">

                                            <!-- panel1  -->
                                            <div class="panel panel-default" id="panel1">
                                                <div class="panel-heading" data-toggle="collapse" data-target="#collapse1" data-parent="#accordion">
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-target="#collapse1"  data-parent="#accordion">Descripción</a></h4>
                                                </div>

                                                <div id="collapse1" class="panel-collapse collapse in fade">
                                                    <div class="panel-body">
                                                        <p>
                                                            <?php echo $info['descripcion'];?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- panel2 -->

                                            <div class="panel panel-default" id="panel2">
                                                <div class="panel-heading" data-toggle="collapse" data-target="#collapse2"  data-parent="#accordion">
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-target="#collapse2" class="collapsed"  data-parent="#accordion">Objetivo</a></h4>
                                                </div>
                                                <div id="collapse2" class="panel-collapse collapse  fade">
                                                    <div class="panel-body">
                                                        <p>
                                                            <?php echo $info['objetivo'];?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- panel3 -->

                                            <div class="panel panel-default" id="panel3">
                                                <div class="panel-heading" data-toggle="collapse" data-target="#collapse3" data-parent="#accordion">
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-target="#collapse3" data-parent="#accordion" class="collapsed">Proceso</a></h4>
                                                </div>
                                                <div id="collapse3" class="panel-collapse collapse fade">
                                                    <div class="panel-body">
                                                        <ul>
                                                            <?php foreach($info['proceso'] as $proceso){ ?>
                                                            <li>
                                                                <?php echo $proceso; ?>
                                                            </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- panel4 -->

                                            <div class="panel panel-default" id="panel4">
                                                <div class="panel-heading" data-toggle="collapse" data-target="#collapse4" data-parent="#accordion">
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-target="#collapse4" data-parent="#accordion" class="collapsed">Marmoleo</a></h4>
                                                </div>
                                                <div id="collapse4" class="panel-collapse collapse  fade">
                                                    <div class="panel-body">
                                                        <p>
                                                            <?php echo $info['marmoleo'];?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- panel5 -->

                                            <div class="panel panel-default" id="panel5">
                                                <div class="panel-heading" data-toggle="collapse" data-target="#collapse5" data-parent="#accordion">
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-target="#collapse5" data-parent="#accordion" class="collapsed">Medición del área del ribeye</a></h4>
                                                </div>
                                                <div id="collapse5" class="panel-collapse collapse  fade">
                                                    <div class="panel-body">
                                                        <p>
                                                            <?php echo $info['area'];?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- panel6 -->

                                            <div class="panel panel-default" id="panel6">
                                                <div class="panel-heading" data-toggle="collapse" data-target="#collapse6" data-parent="#accordion">
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-target="#collapse6" data-parent="#accordion" class="collapsed">Color</a></h4>
                                                </div>
                                                <div id="collapse6" class="panel-collapse collapse  fade">
                                                    <div class="panel-body">
                                                        <p>
                                                            <?php echo $info['color'];?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- panel7 -->

                                            <div class="panel panel-default" id="panel7">
                                                <div class="panel-heading" data-toggle="collapse" data-target="#collapse7" data-parent="#accordion">
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-target="#collapse7" data-parent="#accordion" class="collapsed">Rendimiento</a></h4>
                                                </div>
                                                <div id="collapse7" class="panel-collapse collapse  fade">
                                                    <div class="panel-body">
                                                        <h4>El porcentaje de carne útil en la canal es determinado mediante la siguiente ecuación:</h4>
                                                        <p style="text-align: center; font-size: 130%; font-style: italic;">G<sub>R</sub> = 2.5 + 2.5D<sub>R</sub> + .20%<sub>RPC</sub> – .32A<sub>R</sub> + 0.0038P<sub>C</sub></p>
                                                        <ul>
                                                            <li>G<sub>R</sub> = Grado de Rendimiento</li>
                                                            <li>D<sub>R</sub> = Espesor de grasa dorsal</li>
                                                            <li>A<sub>R</sub> = Área de ojo de costilla (ribeye)</li>
                                                            <li>%<sub>RPC</sub> = Porcentaje estimado de grasa en riñon, pelvis y corazón</li>
                                                            <li>P<sub>C</sub> = Peso de la canal en caliente</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- panel8 -->

                                            <div class="panel panel-default" id="panel8">
                                                <div class="panel-heading" data-toggle="collapse" data-target="#collapse8" data-parent="#accordion">
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-target="#collapse8" data-parent="#accordion" class="collapsed">Otras prestaciones</a></h4>
                                                </div>
                                                <div id="collapse8" class="panel-collapse collapse  fade">
                                                    <div class="panel-body">
                                                        <div class="panel-body">
                                                            <ul>
                                                                <?php foreach($info['otros'] as $prestacion){ ?>
                                                                <li>
                                                                    <?php echo $prestacion; ?>
                                                                </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--./proyectos-inner-->
                    </div>
                </div>
            </div>
        </div>
        </div>

    <footer>
        <div id="footer" class="container-fluid">
            <div class="row twofive-viewport">
                <div class=" footer-carousel-overlay">
                    <!--row-inside-wrapper-->
                    <div class="col-md-6 footer-inner footer-info">
                        <a href="#inicio">
                            <img src="img/cisgo_white.png">
                        </a>

                        <h3>INFORMACIÓN DE CONTACTO</h3>
                        <dl class="dl-horizontal">
                            <dt><i class="icon ion-ios-email"></i></dt>
                            <dd><a href="mailto:contacto@cisgo.com.mx">contacto@cisgo.com.mx</a></dd>
                            <dt><i class="icon ion-ios-location"></i></dt>
                            <dd>Rafaela Morera de Romero #47, Colonia 5 de mayo, Hermosillo, Sonora.</dd>
                            <dt><i class="icon ion-android-call"></i></dt>
                            <dd>(662) 280-03-90</dd>
                        </dl>
                    </div>
                    <div class="col-md-4 footer-social">
                        <div class="row">
                            <a href="https://www.facebook.com/Cisgo-Consultor%C3%ADa-SC-1632403327035757/" class="fa fa-facebook"></a>
                            <a href="https://twitter.com/cisgoco" class="fa fa-twitter"></a>
                            <a href="https://www.linkedin.com/company-beta/3002281/" class="fa fa-linkedin"></a>
                        </div>
                    </div>
                    <div id="ro-footerii" class="col-md-2">
                        <div class="row text-center">
                            <p><i>Powered by <a href="http://www.rosolutions.com.mx">RO Solutions</a></i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ro-footeri" class="row text-center">
                <p><i>Powered by <a href="http://www.rosolutions.com.mx">RO Solutions</a></i></p>
            </div>
        </div>
    </footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="slick-1.6.0/slick/slick.js"></script>
        <script type="text/javascript" src="js/smoothScrolling.js"></script>
        <script type="text/javascript" src="js/carousel.js"></script>
        <script type="text/javascript" src="js/navbar.js"></script>
        <script type="text/javascript">
            /** Se ejecuta cuando la pagina esta lista */
            $(document).ready(function () {

                $('.galeriaslick').slick({
                    centerMode: true,
                    centerPadding: '50px',
                    slidesToShow: 3,
                    variableWidth: true,
                    autoplay: true,
                    autoplaySpeed: 6000,
                    lazyLoad: 'ondemand',
                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                arrows: false,
                                centerMode: true,
                                centerPadding: '40px',
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                arrows: false,
                                centerMode: true,
                                centerPadding: '40px',
                                slidesToShow: 1
                            }
                        }
                    ]

                });

            });
        </script>
    </body>

    </html>