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
        <title>Sistema de Cotizaciones | Usuarios</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <?php include '../encabezado.php'; ?>

        <script>
            function mostrarusuarios(str)
            {
            if (str=="")
              {
              document.getElementById("insertarusuario").innerHTML="";
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
                document.getElementById("insertarusuario").innerHTML=xmlhttp.responseText;
                }
              }
            xmlhttp.open("GET","obtenerusuario.php?q="+str,true);
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
                    <a class="brand" href="#">Folding Cardboard & Boxes Inc.</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="usuario.php">Menu</a></li>
                            <li><a href="pads.php">PADS</a></li>
                            <li><a href="#">Particiones</a></li>
                                                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrador <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                   <li><a href="clientes.php">Clientes</a></li>
		                            <li><a href="../cotizaciones/archivos.php">Cotizaciones</a></li>
		                            <li><a href="#">Almacen</a></li>		                            
                                    <li class="divider"></li>
                                    <li class="nav-header">Seguridad</li>
                                    <li class="active"><a href="usuarios.php">Usuarios</a></li>
                                </ul>
                            </li>
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
            <h1>Usuarios</h1><br>

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
				                  echo "<h2 class=\"alert alert-error\">Las Contraseñas deben de coincidir</h2>";
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

                        <?php 
                            if (isset($_GET["noexiste"]) AND $_GET["noexiste"] == 1) { 
                                  echo "<h2 class=\"alert alert-error\">El usuario no existe en la Base de Datos</h2>";
                                } 

                        ?>

                        <?php 
                            if (isset($_GET["exitoborrado"]) AND $_GET["exitoborrado"] == 1) { 
                                  echo "<h2 class=\"alert alert-success\">Usuario eliminado con exito!</h2>";
                                } 

                        ?>

                        <?php 
                            if (isset($_GET["exitoedit"]) AND $_GET["exitoedit"] == 1) { 
                                  echo "<h2 class=\"alert alert-success\">Usuario Modificado con exito!</h2>";
                                } 

                        ?>

                        <?php 
                            if (isset($_GET["exitopass"]) AND $_GET["exitopass"] == 1) { 
                                  echo "<h2 class=\"alert alert-success\">Contraseña modificada con exito!</h2>";
                                } 

                        ?>

                        <?php 
                            if (isset($_GET["coincidirpass"]) AND $_GET["coincidirpass"] == 1) { 
                                  echo "<h2 class=\"alert alert-error\">Las Contraseñas deben de coincidir</h2>";
                                } 

                        ?>



			<div id="bloque">
                <h1>Alta</h1>
            <form name="altausuario" action="../procesos/crea_usuarios.php" method="POST">Nombre de Usuario(nick):<br />
				<input type="text" name="login" size="30" maxlength="100" required />
					<br /> Contraseña:
					<br />	
				<input id="pass1" type="password" name="pass1" required />
					<br />Repite Contraseña:
					<br />
				<input id="pass2" type="password" name="pass2" required  />
					<br />Nombre:
					<br />	
				<input type="text" name="nombre" size="30" maxlength="100" required />
					<br />
					Apellido Paterno:
					<br />
				<input type="text" name="apaterno" size="30" maxlength="100" required />
					<br />Apellido Materno:
					<br />
				<input type="text" name="amaterno" size="30" maxlength="100" required />
					<br />E-mail:
					<br />
				<input type="email" name="email" size="30" maxlength="100" required />
					<br />Nivel del Usuario:
					<br />
				<select name="nivel">
			        <option value="AD">Administrador</option>
			    	<option value="UN">Usuario Normal</option>
                    <option value="ES">Usuario Especial</option>
			    </select>
                <input type="hidden" name="creado" size="30" maxlength="100" value="<?php echo $_SESSION["login"]?>" required />
					<br />
			        <br />
				<input type="submit" name="crearusuario" value="Crear Usuario" />
			</form>
        </div>

        <div id="bloque">
                <h1>Baja</h1>
                <form name="bajausuario" action="../procesos/elimina_usuarios.php" method="POST">
                        
                        <label for="usuarioeliminar">Nick</label><br>
                            <select name='usuarioeliminar'><option value=""> --Escoje un Usuario-- </option>
                                <?php 
                                    $query = sprintf("SELECT login FROM usuarios where 1 ORDER BY login ASC ");
                                    $result=mysql_query($query,$link) or die(mysql_error()); 
                                    while($row=mysql_fetch_array($result,MYSQLI_NUM)){
                                    echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";
                                        }
                                ?>
                            </select>              
                            <br />
                            <br />
                        <input type="submit" name="eliminar" value="Eliminar Usuario" />                
                    </form>
                    <br>
                <h1>Cambiar Pass</h1>
                <form name="editapass" action="../procesos/edita_pass.php" method="POST">
                        
                        <label for="usuariopass">Nick</label><br>
                            <select name='usuariopass'><option value=""> --Escoje un Usuario-- </option>
                                <?php 
                                    $query = sprintf("SELECT login FROM usuarios where 1 ORDER BY login ASC ");
                                    $result=mysql_query($query,$link) or die(mysql_error()); 
                                    while($row=mysql_fetch_array($result,MYSQLI_NUM)){
                                    echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";
                                        }
                                ?>
                            </select>              
                                                              
                    <br /> Nueva Contraseña:
                    <br />                      
                    <input id="pass1" type="password" name="pass1edit" required />
                        <br />Repite la Nueva Contraseña:
                        <br /> 
                    <input id="pass2" type="password" name="pass2edit" required  />        
                        <br />           
                    <input type="submit" name="editapass" value="Edita Contraseña" />
                    <input type='hidden' name='modificado' size='30' maxlength='100' value="<?php echo $_SESSION["login"]?>" required />
                </form>

        </div>

         <div id="bloque">
                <h1>Editar</h1>
                <form name="importarusuario" action="../procesos/edita_usuarios.php" method="POST"> 
                           
                            <label for="usuarioeditar">Nick</label><br>
                            <select name=cat onchange="mostrarusuarios(this.value)"><option value=""> --Escoje un Usuario-- </option>
                                <?php 
                                    $query = sprintf("SELECT login FROM usuarios where 1 ORDER BY login ASC ");
                                    $result=mysql_query($query,$link) or die(mysql_error()); 
                                    while($row=mysql_fetch_array($result,MYSQLI_NUM)){
                                    echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";
                                        }
                                ?>
                            </select>                                                                 
                    </form>
                    <div id="insertarusuario"></div>
        </div>

	<?php } else {
		echo "<h2 class=\"alert alert-error\">No tiene acceso a esta seccion</h2>";
	}
	?>         
           
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