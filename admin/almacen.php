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
        <title>Almacen</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <?php include '../encabezado.php'; ?>

        <script>

            function material_val()
              {
                var valor_option = document.getElementById('materialalmacen');
               valormaterial = valor_option.options[valor_option.selectedIndex].value;
                $("#valormaterial").val(valormaterial);

              
              }

             function calibre_val()
              {
                var valor_option = document.getElementById('calibrealmacen');
               valorcalibre = valor_option.options[valor_option.selectedIndex].value;
                $("#valorcalibre").val(valorcalibre);
              
              }  

              function bobina_val()
              {
                var valor_option = document.getElementById('bobinaalmacen');
               valorbobina = valor_option.options[valor_option.selectedIndex].value;
                $("#valorbobina").val(valorbobina);
              
              } 

            function mostrararticulos(str)
            {
                
            if (str=="")
              {
              document.getElementById("insertarmaterial").innerHTML="";
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
                document.getElementById("insertarmaterial").innerHTML=xmlhttp.responseText;
                }
              }



            xmlhttp.open("GET","obteneralmacen.php?q="+str,true);
            xmlhttp.send();            
            }


            function mostrarcalibre(str2)
            {
              
            if (str2=='')
              {
              document.getElementById('insertarcalibre').innerHTML='';
              return;
              } 
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
              }
            xmlhttp.onreadystatechange=function()
              {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                document.getElementById('insertarcalibre').innerHTML=xmlhttp.responseText;
                }
              }
            xmlhttp.open('GET','agrega_calibre.php?w='+str2+"&valormaterial="+valormaterial,true);
            xmlhttp.send();            
            }

             function mostrarbobina(str3)
            {
               
            if (str3=='')
              {
              document.getElementById('insertarbobina').innerHTML='';
              return;
              } 
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
              }
            xmlhttp.onreadystatechange=function()
              {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                document.getElementById('insertarbobina').innerHTML=xmlhttp.responseText;
                }
              }

              
            
            xmlhttp.open("GET","mostrar_articulo.php?&m="+str3+"&valormaterial="+valormaterial+"&valorcalibre="+valorcalibre+"&valorbobina="+valorbobina,true);
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
                            <?php
      if(($_SESSION["nivel"] == "AD") || ($_SESSION["nivel"] == "ES")  ){
         ?>
                            <li><a href="pads.php">PADS</a></li>
                            <li><a href="particiones.php">Particiones</a></li>
                            
                                                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>
                                <ul class="dropdown-menu">                                   
                                <li><a href="clientes.php">Clientes</a></li>
		                            <li><a href="../cotizaciones/archivos.php">Cotizaciones</a></li>
                    <?php
      }
         ?>            
		                            <li class="active"><a href="almacen.php">Almacen</a></li>		   
                    <?php
      if(($_SESSION["nivel"] == "AD") || ($_SESSION["nivel"] == "ES")  ){
         ?>                                     
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
                    <div class="icon" aria-hidden="true" data-icon="">    Almacen</div>                                                                   
                    <br>
                

                               <?php if (isset($_GET["incorrecto"]) AND $_GET["incorrecto"] == 1) { 

                        echo "<h2 class=\"alert alert-error\">Usuario o Contraseña Incorrectos</h2>";
                    }

                    ?>




			<?php
			if(($_SESSION["nivel"] == "AD") || ($_SESSION["nivel"] == "ES") || ($_SESSION["nivel"] == "AL") ){
				 ?>

						 <?php 
							if (isset($_GET["existe"]) AND $_GET["existe"] == 1) { 
				                  echo "<h2 class=\"alert alert-error\">El articulo ya existe en la Base de Datos</h2>";
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
				                  echo "<h2 class=\"alert alert-success\">Articulo creado con exito!</h2>";
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
                            echo "<h2 class=\"alert alert-success\">Articulo editado con exito!</h2>";
                        } 

                ?>



			<div id="bloque">
                <h1>Alta</h1>
            <form name="altaalmacen" action="../procesos/crea_almacen.php" method="POST">
                    Calibre:<br />
				<input type="text" name="calibre" required />
					<br /> Material:
					<br />	
				<input type="text" name="material" required />
					<br />Gramos:
					<br />
				<input type="text" name="gramos"  value="0.000" required />
					<br />Bobina:
					<br />	
				<input type="text" name="bobina" required />
					<br />Precio x Kg:
					<br />
				<input type="text" name="precio" required />					
					<br />Existencia:
					<br />
				<input type="radio" name="existencia" value="SI" checked>SI<br>
                <input type="radio" name="existencia" value="NO">NO<br>
                <input type="hidden" name="creado" size="30" maxlength="100" value="<?php echo $_SESSION["nombre"].' '.$_SESSION["apaterno"]; ?>" required />
					<br />
				<input type="submit" name="creararticulo" value="Crear Articulo" />
			</form>
        </div>

       <div id="bloque">
                <h1>Editar</h1>
                <form name="importararticulos" action="mostrar_articulo.php" method="GET"> 
                           
                            <label for="almaceneditar">Material</label><br>
                            <select id="materialalmacen" name="almacenmaterialedit" onclick ='material_val()' onchange="mostrararticulos(this.value)"><option value=""> --Escoge el Material-- </option>
                                <?php 
                                    $query = sprintf("SELECT material FROM almacen where 1 GROUP BY material");
                                    $result=mysql_query($query,$link) or die(mysql_error()); 
                                    while($row=mysql_fetch_array($result,MYSQLI_NUM)){
                                    echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";
                                        }
                                ?>
                            </select>   
                             <input id="valormaterial" type="hidden" name="valormaterial" required/>  
                            <div id="insertarmaterial"></div>
                            <div id='insertarcalibre'></div>
                             </form>                                                            

                    
        </div>
        <div id="bloque">
            <div id='insertarbobina'></div>
        </div>

	<?php } else {
		echo "<h2 class=\"alert alert-error\">No tiene acceso a esta seccion</h2>";
	}
	?>         
           



<div id="contenedor_cotizaciones">
<h1> Existencia </h1>
    <?php
    $existencia = "SI";
echo "<table id='tablacotizaciones'>";
    echo "<tr>";   
    echo "<th>ID</th>";
    echo "<th>Material</th>";
    echo "<th>Calibre</th>";
    echo "<th>Bobina</th>";
    echo "<th>Gramos</th>";
    echo "<th>Precio Kg</th>";
    echo "</tr>";


 
$dato = $_POST['dato'];
 
$query = sprintf("SELECT * FROM almacen WHERE existencia= '%s' GROUP BY id_almacen ASC", $existencia);
     $result=mysql_query($query,$link) or die(mysql_error()); 


    

while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {

   
    echo "<tr>";    
    echo "<td>".$row[0]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".$row[4]."</td>";
    echo "<td>".$row[3]."</td>";
    echo "<td>".$row[5]."</td>"; 
    echo "</tr>";
   
    
  
  }
  


  echo "</table>"; ?>

</div>



<div id="contenedor_cotizaciones">
<h1> No Disponible </h1>
    <?php
    $existencia = "NO";
echo "<table id='tablacotizaciones'>";
    echo "<tr>";   
    echo "<th>ID</th>";
    echo "<th>Material</th>";
    echo "<th>Calibre</th>";
    echo "<th>Bobina</th>";
    echo "<th>Gramos</th>";
    echo "<th>Precio Kg</th>";
    echo "</tr>";


 
$dato = $_POST['dato'];
 
$query = sprintf("SELECT * FROM almacen WHERE existencia= '%s' GROUP BY id_almacen ASC", $existencia);
     $result=mysql_query($query,$link) or die(mysql_error()); 


    

while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {

   
    echo "<tr>";    
    echo "<td>".$row[0]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".$row[4]."</td>";
    echo "<td>".$row[3]."</td>";
    echo "<td>".$row[5]."</td>"; 
    echo "</tr>";
   
    
  
  }
  


  echo "</table>"; ?>

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