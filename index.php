<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sistema de Cotizaciones</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">Está utilizando un <strong> navegador obsoleto. </ strong> Por favor, <a href="http://browsehappy.com/"> actualice su navegador </ a> o <a href="http://www.google.com/chromeframe/?redirect=true"> active Google Chrome </ a> para mejorar su experiencia. </ p>
           <![endif]-->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Folding Cardboard & Boxes Inc.</a>
                    <div class="nav-collapse collapse">
                                                
                        <form id="Formulario" class="navbar-form pull-right" name ="FormLogin" action="procesos/procesa_login.php" method="POST">
                                            
                        <input class="span2" type="text" name="login" placeholder="     Usuario" title="El usuario es necesario." required>                       
                        <input class="span2" type="password" name="pass" placeholder="     Contraseña" title="La Contrase&ntilde;a es necesaria." required>                        
                        <input class="btn" type="submit" value="Entrar">
                    </form>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

                               <?php if (isset($_GET["incorrecto"]) AND $_GET["incorrecto"] == 1) { 

                        echo "<h2 class=\"alert alert-error\">Los datos son Incorrectos</h2>";
                    } else {

                    ?>



            <div class="hero-unit">                              
                <img src="img/logo.jpg">
            </div>
           <?php } ?>
            <hr>

            <footer>
                <p class="alert alert-info">&copy; Nanolabs 2013</p>
            </footer>

        </div> 

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
        
    </body>
</html>
