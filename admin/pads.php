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
                <title>Sistema de Cotizaciones | PADS</title>
                <meta name="description" content="">
                <meta name="viewport" content="width=device-width">

                <link rel="shortcut icon" href="../favicon.ico">
                <link rel="stylesheet" href="../css/bootstrap.min.css">
                <style>
                    body {
                        padding-top: 60px;
                        padding-bottom: 40px;
                    }
                </style>
                <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
                <link rel="stylesheet" href="../css/main.css">
                <link rel="stylesheet" href="../css/icon.css" />
                <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
                <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>  
                <script src="../js/jquery.tablesorter.js"></script>  
                <script type="text/javascript" src="../js/moment.min.js"></script>
                <script type="text/javascript">
                $(document).ready(function() {

                    

                fecha = moment().format('MMMM Do YYYY, h:mm:ss a');
                $("#fecha").val(fecha);
                $("#fechaescondido").val(fecha);
                });

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
                                    <li class="active"><a href="#">PADS</a></li>
                                    <li><a href="#">Particiones</a></li>
                                                                
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrador <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                           <li><a href="#">Clientes</a></li>
        		                            <li><a href="#">Cotizaciones</a></li>
        		                            <li><a href="#">Almacen</a></li>		                            
                                            <li class="divider"></li>
                                            <li class="nav-header">Seguridad</li>
                                            <li><a href="usuarios.php">Usuarios</a></li>
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

                                       <?php if (isset($_GET["incorrecto"]) AND $_GET["incorrecto"] == 1) { 

                                echo "<h2 class=\"alert alert-error\">Usuario o Contraseña Incorrectos</h2>";
                            }

                            ?>




        			<?php
        			if($_SESSION["nivel"] == "AD"){
        				 ?>

                         <?php 
                                    if (isset($_GET["exito"]) AND $_GET["exito"] == 1) { 
                                          echo "<h2 class=\"alert alert-success\">Cotizacion Enviada!</h2>";
                                        } 

                                ?>

        			<h1>Cotizacion de PADS</h1>

        			<form name="user_form" action="../procesos/crea_pads.php" method="POST">

                        <label>Fecha</label>            
                                <input id="fecha" type="text" name="fecha" disabled /> 
                                <input id="fechaescondido" type="hidden" name="fechaescondido" />
                                
                                 

                        <label style="margin-left:2%">Folio #</label>            
                                <input id="folio" type="text" name="folio" disabled="disabled" /><br/>        
                        
                        <div class="items_pad1">                    
                                
                                                                        
                                <label># de parte</label> <br/>            
                                <input id="noparte" type="text" name="noparte" value="1" required /> <br/>                                                                
                                                      
                                <label>Cliente</label>  <br/>           
                                <input id="cliente" type="text" name="cliente" value="Nanolabs" required /> <br/>
                                          
                                <label>Email</label> <br/>            
                                <input id="email" type="email" name="email" value="eliasstaticx@hotmail.com" required /> <br/>

                                 <label>Gramos</label><br/> 
                                 <input id="gr" type="text" name="gr" disabled /> <br/>

                                 <input id="grescondido" type="hidden" name="grescondido" /> <br/>   
                                 

                                <label>Sub-Total</label> <br/>
                                <input id="subtotal" type="text" name="subtotal" disabled /> <br/>

                                <input id="subtotalescondido" type="hidden" name="subtotalescondido"  /> <br/>
                                
                                        
                        </div>     

                        <div class="items_pad1">

                            <label># de PADS</label> <br/>              
            				    <input id="nopads" type="text" name="nopads" autocomplete="off" required /><br/>

            				<label>Largo</label> <br/>
                                <input id="largo" type="text" name="largo" autocomplete="off" required /><br/>

                            <label>Alto</label>	<br/>
            				    <input id="alto" type="text" name="alto" autocomplete="off" required /><br/>

                            <label>Precio x Kg</label> <br/>
                                <input id="preciokg" type="text" name="preciokg" disabled /><br/>

                                 <input id="preciokgescondido" type="hidden" name="preciokgescondido" /><br/>

                            <label>Factor U.</label> <br/>
                             <input id="factoru" type="text" name="factoru" disabled /><br/>  

                              
            				
                        </div>

                        <div class="items_pad2">

                            <label>Material</label> <br/>     	
            				<select id="material" name="material">
            			        <option value="Kraft">Kraft</option>
            			    	<option value="Wax">Wax</option>
                                <option value="PolyWhite">Poly White</option>
                                <option value="PolyKraft">Poly Kraft</option>
            			    </select><br/>

                            

                            <label>Calibre</label><br/>
        <!-- ///////////////////////// Kraft Calibre /////////////////////////////////////////////////-->
                                    <select id="Kraft-seleccionado" class="sub-opcion hide">
                                        <option value="20">20</option>
                                        <option value="24">24</option>
                                        <option value="26">26</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="47">47</option>
                                        <option value="55">55</option>
                                    </select>
        <!-- /////////////////////////////// Wax Calibre //////////////////////////////////////////////////-->
                                     <select id="Wax-seleccionado" class="sub-opcion hide">
                                        <option value="40">40</option>
                                        <option value="47">47</option>                        
                                    </select>
        <!-- //////////////////////////// PolyWhite Calibre ////////////////////////////////////////////-->
                                    <select id="PolyWhite-seleccionado" class="sub-opcion hide">                        
                                        <option value="24">24</option>
                                        <option value="26">26</option>                        
                                    </select>
        <!-- //////////////////////////// PolyWKraft Calibre ///////////////////////////////////////////-->
                                    <select id="PolyKraft-seleccionado" class="sub-opcion hide">                        
                                        <option value="30">30</option>
                                        <option value="40">40</option>                        
                                    </select>
                               
                            <input id="tipocalibreescondido" type="hidden"  name="tipocalibreescondido" />

                            <br/>
                            <label>Bobina</label><br/>
        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ Kraft-20 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="Kraft-20" class="opcion-bobina hide">                        
                                <option value="26" gramos="0.000230" pxkg="0.75">26</option>                        
                            </select>

        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ Kraft-24 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="Kraft-24" class="opcion-bobina hide">
                                <option value="21" gramos="0.000259" pxkg="0.75">21</option>
                                <option value="30" gramos="0.000259" pxkg="0.75">30</option>                        
                            </select>
        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ Kraft-26 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="Kraft-26" class="opcion-bobina hide">
                                <option value="24" gramos="0.000270" pxkg="0.75">24</option>
                                <option value="30" gramos="0.000270" pxkg="0.75">30</option>                        
                            </select>
        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ Kraft-30 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="Kraft-30" class="opcion-bobina hide">
                                <option value="24" gramos="0.000355" pxkg="0.75">24</option>
                                <option value="30" gramos="0.000355" pxkg="0.75">30</option>                        
                            </select>
        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ Kraft-40 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="Kraft-40" class="opcion-bobina hide">
                                <option value="24" gramos="0.000432" pxkg="0.75">24</option>
                                <option value="30" gramos="0.000432" pxkg="0.75">30</option>                        
                            </select>                    
        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ Kraft-47 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="Kraft-47" class="opcion-bobina hide">
                                <option value="24" gramos="0.000503" pxkg="0.75">24</option>
                                <option value="30" gramos="0.000503" pxkg="0.75">30</option>                        
                            </select> 
        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ Kraft-55 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="Kraft-55" class="opcion-bobina hide">
                                <option value="24" gramos="0.000594" pxkg="0.75">24</option>
                                <option value="30" gramos="0.000594" pxkg="0.75">30</option>                        
                            </select> 

        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ Wax-40 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="Wax-40" class="opcion-bobina hide">                        
                                <option value="23" gramos="0.000432" pxkg="0.90">23</option>   
                                <option value="30" gramos="0.000432" pxkg="0.90">30</option>                     
                            </select>

        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ Wax-47 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="Wax-47" class="opcion-bobina hide">
                                <option value="30" gramos="0.000503" pxkg="0.90">30</option>                        
                            </select>
        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ PolyWhite-24 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="PolyWhite-24" class="opcion-bobina hide">
                                <option value="25.8125" gramos="0.000259" pxkg="1.85">25.8125</option>
                                <option value="26.6875" gramos="0.000259" pxkg="1.85">26.6875</option>                        
                                <option value="27.5" gramos="0.000259" pxkg="1.85">27.5</option>
                            </select>
        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ PolyWhite-26 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="PolyWhite-26" class="opcion-bobina hide">
                                <option value="25" gramos="0.000270" pxkg="1.85">25</option>                        
                            </select>
        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ PolyKraft-30 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="PolyKraft-30" class="opcion-bobina hide">
                                <option value="18" gramos="0.000355" pxkg="1.2">18</option>
                                <option value="24" gramos="0.000355" pxkg="1.2">24</option>                        
                                <option value="30" gramos="0.000355" pxkg="1.2">30</option>
                            </select>
        <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\ PolyKraft-40 \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->                    
                            <select id="PolyKraft-40" class="opcion-bobina hide">
                                <option value="18" gramos="0.000432" pxkg="1.2">18</option>
                                <option value="24" gramos="0.000432" pxkg="1.2">24</option>                        
                                <option value="30" gramos="0.000432" pxkg="1.2">30</option>                       
                            </select><br/>

                            <input id="bobinaescondido" type="hidden"  name="bobinaescondido" />


                            <label>Kilos</label><br/> 
                             <input id="kg" type="text" name="kg" disabled /><br/>
                             <input id="kgescondido" type="hidden" name="kgescondido" /><br/>
                                
                            <label>Total</label> <br/>
                             <input id="utilidad" type="text" name="utilidad" disabled /><br/>

                             <input id="utilidadescondido" type="hidden" name="utilidadescondido" />
            					
                             


                        </div>

                        <div class="clearitem"></div>

                    <!--    <div id="test">asd</div> -->
                        

        			
                    
                   <!--  <div id="tablapad"></div> -->
                    <table id="tabla" border="0" cellpadding="10" align="center" style="text-align:center;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Pads x bobina</th>
                                <th>Desperdicio</th>
                                <th>Bobina</th>
                                <th>Material</th>
                                <th>Calibre</th>
                                <th>Largo</th>
                                <th>Alto</th>
                                <th>Total Unitario</th>
                                <th>Posicion</th>
                                <th>Area PAD</th>
                                <th>Area Total</th>
                                <th>Area Desperdicio</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                                       
                            </tr>
                        </tbody>
                        
                    </table>
                    <input type="button" name="desperdiciobtn" value="Desperdicio en todas las bobinas" onclick="calcularDesperdicio()" />
                     <input type="button" name="desperdiciobtn" value="Checados" onclick="checados()" />

                    <input type="submit" name="cotizarpad" value="Cotizar PAD" />

                <!-- Codigo de seleccion de Material con Calibre-->
                    <script type="text/javascript">
               //------------------------------------------------------------------------------     
                //-----------------------------------------------------------------------------        
                 //-----------------------------------------------------------------------------        

                     function checados(){

                        $("input:checkbox:checked").each(function(){
                          //cada elemento seleccionado
                          alert($(this).val());
                        });
                     }


                     function calcularDesperdicio() {

                            if (1==0){
                                
                                alert("El largo y ancho es demasiado para la bobina");

                            } else {
                                



                                //Numero de elementos del option bobina 
                                idSelect =material + "-" + tipocalibre;
                                 nobobina = document.getElementById(idSelect).length;
                                
                                //lista = new array();
                                    if (nobobina == 0){
                                        alert("No hay bobinas disponibles");

                                     }else{

                                        if ( (numeropads == "") || (largo == "") || (alto == "") || (numeropads == 0) || (largo == 0) || (alto == 0) ){

                                            alert("No pueden estar vacios o con ceros los campos");

                                        }else{


                                            //Recorremos el option 2 veces por todos los elementos
                                                //for (var i = 0; i < nobobina; i++) {
                                                    
                                                    $("#"+ idSelect).find('option').each(function()
                                                        {
                                                           
                                                           vbobina = $(this).val(); 



                                                            padlargo = 1;
                                                            padalto = 1;
                                                            areapad = alto * largo;
                                                            areadesperdicio = vbobina * alto;
                                                            areadesperdicioalto = vbobina * largo;

                                                            desperdicio = areadesperdicio - areapad;
                                                            desperdicioalto = areadesperdicioalto - areapad;

                                                            $("#areapad").val(areapad);
                                                            $("#areadesperdicio").val(areadesperdicio);
                                                            $("#desperdicio").val(desperdicio);
                                                            $("#areadesperdicioalto").val(areadesperdicioalto);
                                                            $("#desperdicioalto").val(desperdicioalto);

                                                            porcdesp = (desperdicio * 100) / areadesperdicio;
                                                            porcdespred = porcdesp.toFixed(3);

                                                            porcdesp2 = (desperdicioalto * 100) / areadesperdicioalto;
                                                            porcdespred2 = porcdesp2.toFixed(3);

                                                            difalto = vbobina-alto;
                                                            diflargo = vbobina-largo;

                                                           areapad = areapad.toFixed(3);
                                                           areadesperdicio = areadesperdicio.toFixed(3);
                                                           areadesperdicioalto = areadesperdicioalto.toFixed(3);
                                                           desperdicio = desperdicio.toFixed(3);
                                                           desperdicioalto = desperdicioalto.toFixed(3);



                                                            if (  diflargo < 0 ){

                                                            } else{

                                                                if (porcdespred >= 50){

                                                                    largopartes = vbobina / largo;
                                                                    largopartes = parseInt(largopartes);

                                                                    largodoble = largo * largopartes;
                                                                    areapaddoble= alto * largodoble;
                                                                    areadesperdiciodoble = vbobina * alto;
                                                                    desperdiciodoble = areadesperdiciodoble - areapaddoble;
                                                                    areadesperdiciodoble = areadesperdiciodoble.toFixed(3);
                                                                    padlargo=largopartes;

                                                                    porcdespdoble = (desperdiciodoble * 100) / areadesperdiciodoble;
                                                                    porcdespreddoble = porcdespdoble.toFixed(3);

                                                                    areapaddoble = areapaddoble.toFixed(3);                                                                   
                                                                    desperdiciodoble = desperdiciodoble.toFixed(3);
                                                                    

                                                                     $('#tabla > tbody:last').append('<tr><td><input type="checkbox"  value="'+  vbobina +'"><td>'+ padlargo +'</td></td><td>'+ porcdespreddoble + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largo +'</td><td>'+ alto +'</td><td>'+ total +'</td><td>Largo</td><td>'+ areapaddoble +'</td><td>'+ areadesperdiciodoble +'</td><td>'+ desperdiciodoble +'</td></tr>');



                                                                }else{

                                                                    $('#tabla > tbody:last').append('<tr><td><input type="checkbox"  value="'+  vbobina +'"><td>'+ padlargo +'</td></td><td>'+ porcdespred + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largo +'</td><td>'+ alto +'</td><td>'+ total +'</td><td>Largo</td><td>'+ areapad +'</td><td>'+ areadesperdicio +'</td><td>'+ desperdicio +'</td></tr>');
                                                                }

                                                                
                                                               
                                                            }

                                                            

                                                            if ( difalto < 0 ){

                                                            } else{
                                                                


                                                                if (porcdespred2 >= 50){

                                                                    altopartes = vbobina / alto;
                                                                    altopartes = parseInt(altopartes);
                                                                    altodoble = alto * altopartes;
                                                                    areapaddb= altodoble * largo;
                                                            
                                                                    areadesperdicioaltodb = vbobina * largo;
                                                                    padalto=altopartes;

                                                                    desperdicioaltodb = areadesperdicioaltodb - areapaddb;                                                         

                                                                    porcdesp2db = (desperdicioaltodb * 100) / areadesperdicioaltodb;
                                                                    porcdespred2db = porcdesp2db.toFixed(3);

                                                                    areapaddb = areapaddb.toFixed(3);
                                                                    areadesperdicioaltodb = areadesperdicioaltodb.toFixed(3);
                                                                    desperdicioaltodb = desperdicioaltodb.toFixed(3);

                                                               
                                                                     $('#tabla > tbody:last').append('<tr><td><input type="checkbox"  value="'+  vbobina +'"></td><td>'+ padalto +'</td><td>'+ porcdespred2db + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largo +'</td><td>'+ alto +'</td><td>'+ total +'</td><td>Alto</td><td>'+ areapaddb +'</td><td>'+ areadesperdicioaltodb +'</td><td>'+ desperdicioaltodb +'</td></tr>');



                                                                }else{

                                                                    $('#tabla > tbody:last').append('<tr><td><input type="checkbox"  value="'+  vbobina +'"></td><td>'+ padalto +'</td><td>'+ porcdespred2 + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largo +'</td><td>'+ alto +'</td><td>'+ total +'</td><td>Alto</td><td>'+ areapad +'</td><td>'+ areadesperdicioalto +'</td><td>'+ desperdicioalto +'</td></tr>');
                                                                }








                                                                
                                                               
                                                            }
                                                           

                                                            
                                                           
                                                          // var tablapad = document.getElementById("tabla");                                                                                                                                                                                                               
                                                          // var parrafo = document.createElement("p");
                                                          // parrafo.innerHTML = "--- " + $(this).val() + "------ " + "----  " + material + "------- " + "-----  " + tipocalibre  + "--------  " + largo + "--------  " + alto + "--------  " + total + "BOBINA :" + bobina;
                                                          // tablapad.appendChild(parrafo);
                                                           
                                                        });
                                                  //}
                                        }


              
                                    }




                            }

                        }
                //-----------------------------------------------------------------------------        
                 //-----------------------------------------------------------------------------        
                  //-----------------------------------------------------------------------------        


                    // Mostramos la lista de calibres dependiendo el material
                     function materialSeleccion() {
                            $('.sub-opcion').hide();
                            var materialSeleccionado = $('#material').val();
                            if (materialSeleccionado) {
                                $('#' + materialSeleccionado + '-seleccionado').show();
                            } 
                        }

                       // Mostramos la lista de bobinas dependiendo el calibre
                        function calibreSeleccion() {
                            $('.opcion-bobina').hide();
                            var calibreSeleccionado = $('#'+ material + '-seleccionado').val();
                           
                            if (calibreSeleccionado) {                         
                                $('#'+ material + '-' + tipocalibre ).show();
                            }

                        }



                        $(document).ready(function() {

                                                             
                                $('#material').change(materialSeleccion );
                                 materialSeleccion();
                                 
                                $("#material").change(function () {
                                               material = $('#material option:selected').val();
                                               calibre = $("#" + material  + "-seleccionado option:selected").val() || material;
                                              
                                            $("#" + material +"-seleccionado").change(function(){
                                              
                                                    tipocalibre = $('#' + material + '-seleccionado option:selected').val();
                                                    

                                                    calibreSeleccion();
                                                    if (material=="Kraft") {
                                                        operacion= parseFloat(tipocalibre) * 2;
                                                        //$("#kg").text(operacion);
                                                    };
                                                  
                                                 
                                                         $('#'+ material + '-' + tipocalibre ).change(function(){
                                                              

                                                          gramos = $('option:selected', this).attr('gramos');
                                                          pxkg = $('option:selected', this).attr('pxkg');
                                                          bobina = $('option:selected', this).attr('value');
                                                          $("#bobinaescondido").val(bobina);
                                                          
         
                                                           }).change();                                           
                                                           

                                                             $("#gr").val(gramos);
                                                             $("#grescondido").val(gramos);
                                                             $("#preciokg").val(pxkg);
                                                             $("#preciokgescondido").val(pxkg);

                                                             // ------ Operaciones ------------

                                                            numeropads = $('#nopads').val();
                                                            alto = $('#alto').val();
                                                            largo = $('#largo').val();
                                                            kilos = parseFloat(numeropads) * 
                                                            parseFloat(alto) * parseFloat(largo) *
                                                            parseFloat(gramos);
                                                            subtotal = kilos * pxkg;
                                                            factor =2;
                                                            total = subtotal * factor;
                                                            total=total.toFixed(3);

                                                            
                                                            

                                                            $("#kg").val(kilos);
                                                            $("#kgescondido").val(kilos);
                                                            $("#factoru").val(factor);
                                                            $("#subtotal").val(subtotal);
                                                            $("#subtotalescondido").val(subtotal);
                                                            $("#utilidad").val(total);
                                                            $("#utilidadescondido").val(total);
                                                            $("#tipocalibreescondido").val(tipocalibre);




                                                          //$("#test").text(bobina + "--" + tipocalibre + "--" + operacion + "--" + calibre + "--"  + kilos + " - " + numeropads + " - " + alto+ " - " +  largo+ " - "  + gramos );

                                            }).change();
                                            
                                            

                                    })
                                    .change();


            
                            });


                            $("input").keyup(function () {

                                                            

                                                             $("#gr").val(gramos);
                                                             $("#grescondido").val(gramos);
                                                             $("#preciokg").val(pxkg);
                                                             $("#preciokgescondido").val(pxkg);
                                                            numeropads = $('#nopads').val();
                                                            alto = $('#alto').val();
                                                            largo = $('#largo').val();
                                                            kilos = parseFloat(numeropads) * 
                                                            parseFloat(alto) * parseFloat(largo) *
                                                            parseFloat(gramos);
                                                            subtotal = kilos * pxkg;
                                                            factor =2;
                                                            total = subtotal * factor;
                                                            total=total.toFixed(3);

                                                            $("#kg").val(kilos);
                                                            $("#kgescondido").val(kilos);
                                                            $("#factoru").val(factor);
                                                            $("#subtotal").val(subtotal);
                                                            $("#subtotalescondido").val(subtotal);
                                                            $("#utilidad").val(total);
                                                            $("#utilidadescondido").val(total);
                                                            $("#tipocalibreescondido").val(tipocalibre);

                                                            //$("#test").text(bobina + "--" + tipocalibre + "--" + operacion + "--" + calibre + "--"  + kilos + " - " + numeropads + " - " + alto+ " - " +  largo+ " - "  + gramos );
                             }).keyup();



                                                            

                            
                    </script>


            


               </form>    




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