<?php
session_start();

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Clientes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <?php include '../encabezado.php'; ?>

        <script>
            function mostrarclientes(str)
            {
            if (str=="")
              {
              document.getElementById("insertarcliente").innerHTML="";
              return;
              } 
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
            xmlhttp.onreadystatechange=function()
              {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                document.getElementById("insertarcliente").innerHTML=xmlhttp.responseText;
                }
              }
            xmlhttp.open("GET","obtenercliente.php?q="+str,true);
            xmlhttp.send();            
            }

        </script>
                
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
                    <a class="brand" href="usuario.php">Folding Cardboard & Boxes Inc.</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="usuario.php">Menu</a></li>
                            <li><a href="pads.php">PADS</a></li>
                            <li><a href="particiones.php">Particiones</a></li>
                             <li><a href="clientes.php">Clientes</a></li>
                           <?php

                    if(($_SESSION["nivel"] == "AD") || ($_SESSION["nivel"] == "ES") ){

                         ?>             

                           <?php 
                              if (isset($_GET["existe"]) AND $_GET["existe"] == 1) { 
                                          echo "<h2 class=\"alert alert-error\">El Numero de Folio ya existe en la Base de Datos</h2>";
                                        } 

                            ?>                                                   

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
                        <?php

                    }

                         ?>          

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

                    <br>
                    <div class="icon" aria-hidden="true" data-icon="">    Clientes</div>                                                                   
                    <br>

                               <?php if (isset($_GET["incorrecto"]) AND $_GET["incorrecto"] == 1) { 

                        echo "<h2 class=\"alert alert-error\">Usuario o Contraseña Incorrectos</h2>";
                    }

                    ?>




			<?php
			if( ($_SESSION["nivel"] == "AD")  || ($_SESSION["nivel"] == "UN") || ($_SESSION["nivel"] == "ES") ){

				 ?>

						 <?php 
							if (isset($_GET["existe"]) AND $_GET["existe"] == 1) { 
				                  echo "<h2 class=\"alert alert-error\">El cliente ya existe en la Base de Datos</h2>";
				                } 

				        ?>

                        <?php 
                            if (isset($_GET["noexiste"]) AND $_GET["noexiste"] == 1) { 
                                  echo "<h2 class=\"alert alert-error\">El cliente no existe en la Base de Datos</h2>";
                                } 

                        ?>

				        
						<?php 
							if (isset($_GET["error"]) AND $_GET["error"] == 1) { 
				                  echo "<h2 class=\"alert alert-error\">Ocurrio un Error al Introducir los Datos</h2>";
				                } 

				        ?>

				        <?php 
							if (isset($_GET["exito"]) AND $_GET["exito"] == 1) { 
				                  echo "<h2 class=\"alert alert-success\">Cliente creado con exito!</h2>";
				                } 

				        ?>

                        <?php 
                            if (isset($_GET["exitoborrado"]) AND $_GET["exitoborrado"] == 1) { 
                                  echo "<h2 class=\"alert alert-success\">Cliente eliminado con exito!</h2>";
                                } 

                        ?>

                        <?php 
                            if (isset($_GET["exitoedit"]) AND $_GET["exitoedit"] == 1) { 
                                  echo "<h2 class=\"alert alert-success\">Cliente modificado con exito!</h2>";
                                } 

                        ?>

                        

            <div id="bloque">
                <h1>Alta</h1>
        			<form name="agregarcliente" action="../procesos/crea_clientes.php" method="POST">Nombre de la empresa:<br />
        				<input type="text" name="empresa" size="30" maxlength="100" required />
                        <br />Encargado:
                            <br />
                        <input id="encargado" type="text" name="encargado" required  />
                            <br />E-mail:
                            <br />
                        <input type="email" name="email" size="30" maxlength="100" required />
        					<br /> Direccion:
        					<br />	
        				<input id="direccion" type="text" name="direccion" required />
                            <br /> Codigo Postal:
                            <br />  
                        <input id="cp" type="text" name="cp" required />
        					<br />Telefono:
        					<br />
        				<input id="telefono" type="text" name="telefono" required  />
        					<br />Ciudad:
        					<br />	
        				<input type="text" name="ciudad" size="30" maxlength="100" required />
        					<br />Pais:
        					<br />
        				<input type="text" name="pais" size="30" maxlength="100" required />				
        					<br />
        			        <br />
                        <input type="hidden" name="creado" size="30" maxlength="100" value="<?php echo $_SESSION["nombre"].' '.$_SESSION["apaterno"]; ?>" required />
        				<input type="submit" name="crear" value="Agregar Cliente" />
                                      
        			</form>
            </div> 
            <div id="bloque">
                 <h1>Baja</h1>
                <form name="eliminarcliente" action="../procesos/elimina_cliente.php" method="POST">
                        
                        <label for="empresaeliminar">Empresa</label><br>
                            <select name='empresaeliminar'><option value=""> --Escoje una Empresa-- </option>
                                <?php 
                                    $query = sprintf("SELECT empresa FROM clientes where 1 ORDER BY empresa ASC ");
                                    $result=mysql_query($query,$link) or die(mysql_error()); 
                                    while($row=mysql_fetch_array($result,MYSQLI_NUM)){
                                    echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";
                                        }
                                ?>
                            </select>              
                            <br />
                            <br />
                        <input type="submit" name="eliminar" value="Eliminar Cliente" />                
                    </form>
            
            </div> 
            <div id="bloque"> 
             <h1>Editar</h1>         
                    <form name="importarcliente" action="../procesos/edita_clientes.php" method="GET">                          

                     
                           
                            <label for="empresaeditar">Empresa</label><br>
                            <select name=cat onchange="mostrarclientes(this.value)"><option value=""> --Escoje una Empresa-- </option>
                                <?php 
                                    $query = sprintf("SELECT empresa FROM clientes where 1 ORDER BY empresa ASC ");
                                    $result=mysql_query($query,$link) or die(mysql_error()); 
                                    while($row=mysql_fetch_array($result,MYSQLI_NUM)){
                                    echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";
                                        }
                                ?>
                            </select>

                    </form>                                                               
                            <div id="insertarcliente"></div>
                        
                    
            </div> 

	<?php } else {
		echo "<h2 class=\"alert alert-error\">No tiene acceso a esta seccion</h2>";
	}
	?>         
           
            <hr>
            <br><br>

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


    </body>
</html>