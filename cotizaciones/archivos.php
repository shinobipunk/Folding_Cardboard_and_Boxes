<? 

$host=$_SERVER['HTTP_HOST']; 

/* 

Directory Listing Script - Version 2.1 

==================================== 

Script Author: Ash Young <ash@evoluted.net>. www.evoluted.net ;  
Editor: Fran's.- www.Hunter-Gamers.net 

*/ 

$startdir = '.'; 

$showthumbnails = false;  

$showdirs = true; 

$forcedownloads = false; 

$hide = array( 

                'dlf', 

                'public_html',                 

                'index.php', 

                'Thumbs', 

                '.htaccess', 

                '.htpasswd' 

            ); 

$displayindex = false; 

$allowuploads = false; 

$overwrite = false; 



$indexfiles = array ( 

                'index.html', 

                'index.htm', 

                'default.htm', 

                'default.html' 

            ); 

             

$filetypes = array ( 

                'png' => 'jpg.gif', 

                'jpeg' => 'jpg.gif', 

                'bmp' => 'jpg.gif', 

                'jpg' => 'jpg.gif',  

                'gif' => 'gif.gif', 

                'zip' => 'archive.png', 

                'rar' => 'archive.png', 

                'exe' => 'exe.gif', 

                'setup' => 'setup.gif', 

                'txt' => 'text.png', 

                'htm' => 'html.gif', 

                'html' => 'html.gif', 

                'php' => 'php.gif',                 

                'fla' => 'fla.gif', 

                'swf' => 'swf.gif', 

                'xls' => 'xls.gif', 

                'doc' => 'doc.gif', 

                'sig' => 'sig.gif', 

                'fh10' => 'fh10.gif', 

                'pdf' => 'pdf.gif', 

                'psd' => 'psd.gif', 

                'rm' => 'real.gif', 

                'mpg' => 'video.gif', 

                'mpeg' => 'video.gif', 

                'mov' => 'video2.gif', 

                'avi' => 'video.gif', 

                'eps' => 'eps.gif', 

                'gz' => 'archive.png', 

                'asc' => 'sig.gif', 

            ); 

             

error_reporting(0); 

if(!function_exists('imagecreatetruecolor')) $showthumbnails = false; 

$leadon = $startdir; 

if($leadon=='.') $leadon = ''; 

if((substr($leadon, -1, 1)!='/') && $leadon!='') $leadon = $leadon . '/'; 

$startdir = $leadon; 



if($_GET['dir']) { 

    //check this is okay. 

     

    if(substr($_GET['dir'], -1, 1)!='/') { 

        $_GET['dir'] = $_GET['dir'] . '/'; 

    } 

     

    $dirok = true; 

    $dirnames = split('/', $_GET['dir']); 

    for($di=0; $di<sizeof($dirnames); $di++) { 

         

        if($di<(sizeof($dirnames)-2)) { 

            $dotdotdir = $dotdotdir . $dirnames[$di] . '/'; 

        } 

         

        if($dirnames[$di] == '..') { 

            $dirok = false; 

        } 

    } 

     

    if(substr($_GET['dir'], 0, 1)=='/') { 

        $dirok = false; 

    } 

     

    if($dirok) { 

         $leadon = $leadon . $_GET['dir']; 

    } 

} 







$opendir = $leadon; 

if(!$leadon) $opendir = '.'; 

if(!file_exists($opendir)) { 

    $opendir = '.'; 

    $leadon = $startdir; 

} 



clearstatcache(); 

if ($handle = opendir($opendir)) { 

    while (false !== ($file = readdir($handle))) {  

        //first see if this file is required in the listing 

        if ($file == "." || $file == "..")  continue; 

        $discard = false; 

        for($hi=0;$hi<sizeof($hide);$hi++) { 

            if(strpos($file, $hide[$hi])!==false) { 

                $discard = true; 

            } 

        } 

         

        if($discard) continue; 

        if (@filetype($leadon.$file) == "dir") { 

            if(!$showdirs) continue; 

         

            $n++; 

            if($_GET['sort']=="date") { 

                $key = @filemtime($leadon.$file) . ".$n"; 

            } 

            else { 

                $key = $n; 

            } 

            $dirs[$key] = $file . "/"; 

        } 

        else { 

            $n++; 

            if($_GET['sort']=="date") { 

                $key = @filemtime($leadon.$file) . ".$n"; 

            } 

            elseif($_GET['sort']=="size") { 

                $key = @filesize($leadon.$file) . ".$n"; 

            } 

            else { 

                $key = $n; 

            } 

            $files[$key] = $file; 

             

            if($displayindex) { 

                if(in_array(strtolower($file), $indexfiles)) { 

                    header("Location: $file"); 

                    die(); 

                } 

            } 

        } 

    } 

    closedir($handle);  

} 



//sort our files 

if($_GET['sort']=="date") { 

    @ksort($dirs, SORT_NUMERIC); 

    @ksort($files, SORT_NUMERIC); 

} 

elseif($_GET['sort']=="size") { 

    @natcasesort($dirs);  

    @ksort($files, SORT_NUMERIC); 

} 

else { 

    @natcasesort($dirs);  

    @natcasesort($files); 

} 



//order correctly 

if($_GET['order']=="desc" && $_GET['sort']!="size") {$dirs = @array_reverse($dirs);} 

if($_GET['order']=="desc") {$files = @array_reverse($files);} 

$dirs = @array_values($dirs); $files = @array_values($files); 





?> 

<?php
session_start();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sistema de Cotizaciones | Cotizaciones</title>
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
                            <li><a href="../admin/usuario.php">Menu</a></li>
                            <li><a href="../admin/pads.php">PADS</a></li>
                            <li><a href="../admin/particiones.php">Particiones</a></li>
                                                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrador <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                   <li><a href="#">Clientes</a></li>
                                    <li class="active"><a href="archivos.php">Cotizaciones</a></li>
                                    <li><a href="../admin/almacen.php">Almacen</a></li>                                    
                                    <li class="divider"></li>
                                    <li class="nav-header">Seguridad</li>
                                    <li><a href="../admin/usuarios.php">Usuarios</a></li>
                                </ul>
                            </li>
                        </ul>                      
                       

                        <form id="Formulario" class="navbar-form pull-right" name ="FormLogin" action="../admin/logout.php" method="POST">
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




            <?php
            if($_SESSION["nivel"] == "AD"){
                 ?>

                         <?php 
                            if (isset($_GET["existe"]) AND $_GET["existe"] == 1) { 
                                  echo "<h2 class=\"alert alert-error\">El usuario ya existe en la Base de Datos</h2>";
                                } 

                        ?>

                        <?php 
                            if (isset($_GET["coincidir"]) AND $_GET["coincidir"] == 1) { 
                                  echo "<p class=\"alert alert-error\">Las Contraseñas deben de coincidir</p>";
                                } 

                        ?>

                        <?php 
                            if (isset($_GET["error"]) AND $_GET["error"] == 1) { 
                                  echo "<h2 class=\"alert alert-error\">Ocurrio un Error al Introducir los Datos</h2>";
                                } 

                        ?>

                        <?php 
                            if (isset($_GET["exito"]) AND $_GET["exito"] == 1) { 
                                  echo "<h2 class=\"alert alert-success\">Usuario creado con exito!</h2>";
                                } 

                        ?>

                        <h1> Cotizaciones</h1>

<div id="listingcontainer"> 

    <div id="listingheader">  

    <div id="headerfile">Nombre</div> 

    <div id="headersize">Tamaño</div> 

    <div id="headermodified">Ultima Modificación.</div> 

    </div> 

    <div id="listing"> 

    <? 

    $class = 'b'; 

    if($dirok) { 

    ?> 

    <div><a href="<?=$dotdotdir;?>" class="<?=$class;?>"><img src="http://www.000webhost.com/images/index/dirup.png" alt="Folder" /><strong>..</strong> <em>-</em> <?=date ("M d Y h:i:s A", filemtime($dotdotdir));?></a></div> 

    <? 

        if($class=='b') $class='w'; 

        else $class = 'b'; 

    } 

    $arsize = sizeof($dirs); 

    for($i=0;$i<$arsize;$i++) { 

    ?> 

    <div><a href="<?=$leadon.$dirs[$i];?>" class="<?=$class;?>"><img src="http://www.000webhost.com/images/index/folder.png" alt="<?=$dirs[$i];?>" /><strong><?=$dirs[$i];?></strong> <em>-</em> <?=date ("M d Y h:i:s A", filemtime($leadon.$dirs[$i]));?></a></div> 

    <? 

        if($class=='b') $class='w'; 

        else $class = 'b';     

    } 

     

    $arsize = sizeof($files); 

    for($i=0;$i<$arsize;$i++) { 

        $icon = 'unknown.png'; 

        $ext = strtolower(substr($files[$i], strrpos($files[$i], '.')+1)); 

        $supportedimages = array('gif', 'png', 'jpeg', 'jpg'); 

        $thumb = ''; 

                 

        if($filetypes[$ext]) { 

            $icon = $filetypes[$ext]; 

        } 

         

        $filename = $files[$i]; 

        if(strlen($filename)>43) { 

            $filename = substr($files[$i], 0, 40) . '...'; 

        } 

         

        $fileurl = $leadon . $files[$i]; 

    ?> 

    <div><a href="<?=$fileurl;?>" class="<?=$class;?>"<?=$thumb2;?>><img src="http://www.000webhost.com/images/index/<?=$icon;?>" alt="<?=$files[$i];?>" /><strong><?=$filename;?></strong> <em><?=round(filesize($leadon.$files[$i])/1024);?>KB</em> <?=date ("M d Y h:i:s A", filemtime($leadon.$files[$i]));?><?=$thumb;?></a></div> 

    <? 

        if($class=='b') $class='w'; 

        else $class = 'b';     

    }     

    ?></div> 

  </div> 

 
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
    
    <script>
    //Script para verificar password
    var password1 = document.getElementById('pass1');
    var password2 = document.getElementById('pass2');

    var checkPasswordValidity = function() {
        if (password1.value != password2.value) {
            password1.setCustomValidity('Las Contraseñas deben coincidir');
        } else {
            password1.setCustomValidity('');
        }        
    };

    password1.addEventListener('change', checkPasswordValidity, false);
    password2.addEventListener('change', checkPasswordValidity, false);

    var form = document.getElementById('passwordForm');
    form.addEventListener('submit', function() {
        checkPasswordValidity();
        if (!this.checkValidity()) {
            event.preventDefault();
            //Implement you own means of displaying error messages to the user here.
            password1.focus();
        }
    }, false);
</script>
            

    <?php } else {
        echo "<h2 class=\"alert alert-error\">No tiene acceso a esta seccion</h2>";
    }
    ?>         
           
            <hr>

       



  
  
    </body>
</html>