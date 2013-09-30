<?php
session_start();
?>

<?php
if(($_SESSION["nivel"] == "AD") || ($_SESSION["nivel"] == "ES") ){
     ?>

            <!DOCTYPE html>
            <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
            <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
            <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
            <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                    <title>Sistema de Cotizaciones | Menu</title>
                    <meta name="description" content="">
                    <meta name="viewport" content="width=device-width">

                    <?php include '../encabezado.php'; ?>
                    

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
                                    <ul class="nav">
                                        <li class="active"><a href="usuario.php">Menu</a></li>
                                        <li><a href="pads.php">PADS</a></li>
                                        <li><a href="particiones.php">Particiones</a></li>
                                        <li><a href="clientes.php">Clientes</a></li>
                                                                    
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>
                                            <ul class="dropdown-menu">                                               
            		                            <li><a href="../cotizaciones/archivos.php">Cotizaciones</a></li>
            		                            <li><a href="almacen.php">Almacen</a></li>		                            
                                                <li class="divider"></li>
                                                <li class="nav-header">Seguridad</li>
                                                <li><a href="usuarios.php">Usuarios</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    
                                    <form id="Formulario" class="navbar-form pull-right" name ="FormLogin" action="logout.php" method="POST">
            						<label id="usuariolog"> <?php echo $_SESSION["nombre"]." ".$_SESSION["apaterno"]; ?></label>                                                                                        
                                    <input class="btn" type="submit" value="Cerrar Sesion">
                                </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">

                                           <?php if (isset($_GET["incorrecto"]) AND $_GET["incorrecto"] == 1) { 

                                    echo "<h2 class=\"alert alert-error\">Usuario o Contraseña Incorrectos</h2>";
                                }

                                ?>

            <div class="row">
                            
                            <a href="pads.php"><div class="span4">
                                
                                <div class="icon" aria-hidden="true" data-icon="&#xe001;"></div>                    
                                
                                <h2>PADS</h2>                                        
                            </div></a>
                            
                            <a href="particiones.php"><div class="span4">
                                <div class="icon" aria-hidden="true" data-icon="&#xe000;"></div>
                                <h2>Particiones</h2>                                        
                            </div></a>
                            
                            <a href="clientes.php"><div class="span4">
                                <div class="icon" aria-hidden="true" data-icon="&#xe004;"></div>
                                <h2>Clientes</h2>                                        
                            </div></a>
                            
                            <a href="../cotizaciones/archivos.php"><div class="span4">
                                <div class="icon" aria-hidden="true" data-icon="&#xe005;"></div>
                                <h2>Cotizaciones</h2>                                        
                            </div></a>
                            
                            <a href="almacen.php"><div class="span4">
                                <div class="icon" aria-hidden="true" data-icon="&#xe002;"></div>
                                <h2>Almacen</h2>                                        
                            </div></a>
                            
                            <a href="usuarios.php"><div class="span4">
                                <div class="icon" aria-hidden="true" data-icon="&#xe003;"></div>
                                <h2>Usuarios</h2>                                        
                            
                            </div></a>
                        </div>

                        <hr>

                        <footer>
                            <p class="alert alert-info">&copy; Nanolabs 2013</p>
                        </footer>

                    </div> 

                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

                    <script src="../js/vendor/bootstrap.min.js"></script>

                    <script src="../js/main.js"></script>

                    <script>
                document.getElementById("glyphs").addEventListener("click", function(e) {
                    var target = e.target;
                    if (target.tagName === "INPUT") {
                        target.select();
                    }
                });
                </script>
                    
                </body>
            </html>




<?php } else { ?>
            	 <!DOCTYPE html>
            <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
            <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
            <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
            <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                    <title>Sistema de Cotizaciones | Menu</title>
                    <meta name="description" content="">
                    <meta name="viewport" content="width=device-width">

                    <?php include '../encabezado.php'; ?>
                    
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
                                    <ul class="nav">
                                        <li class="active"><a href="usuario.php">Menu</a></li>
                                        <li><a href="pads.php">PADS</a></li>
                                        <li><a href="particiones.php">Particiones</a></li>                                                                                                        
                                        <li><a href="clientes.php">Clientes</a></li>                                        
                                    </ul>
                                    
                                    <form id="Formulario" class="navbar-form pull-right" name ="FormLogin" action="logout.php" method="POST">
                                    <label id="usuariolog"> <?php echo $_SESSION["nombre"]." ".$_SESSION["apaterno"]." ".$_SESSION["amaterno"]; ?></label>                                                                                        
                                    <input class="btn" type="submit" value="Cerrar Sesion">
                                </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">

                                           <?php if (isset($_GET["incorrecto"]) AND $_GET["incorrecto"] == 1) { 

                                    echo "<h2 class=\"alert alert-error\">Usuario o Contraseña Incorrectos</h2>";
                                }

                                ?>

            <div class="row">
                            
                            <a href="pads.php"><div class="span4">
                                
                                <div class="icon" aria-hidden="true" data-icon="&#xe001;"></div>                    
                                
                                <h2>PADS</h2>                                        
                            </div></a>
                            
                            <a href="particiones.php"><div class="span4">
                                <div class="icon" aria-hidden="true" data-icon="&#xe000;"></div>
                                <h2>Particiones</h2>                                        
                            </div></a>
                            
                            <a href="clientes.php"><div class="span4">
                                <div class="icon" aria-hidden="true" data-icon="&#xe004;"></div>
                                <h2>Clientes</h2>                                        
                            </div></a>
                            
                            
                        </div>

                        <hr>

                        <footer>
                            <p class="alert alert-info">&copy; Nanolabs 2013</p>
                        </footer>

                    </div> 

                    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

                    <script src="../js/vendor/bootstrap.min.js"></script>

                    <script src="../js/main.js"></script>

                    <script>
                document.getElementById("glyphs").addEventListener("click", function(e) {
                    var target = e.target;
                    if (target.tagName === "INPUT") {
                        target.select();
                    }
                });
                </script>
                    
                </body>
            </html>

<?php } ?>