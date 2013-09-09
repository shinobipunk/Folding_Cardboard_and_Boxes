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
                    <title>Sistema de Cotizaciones | Particiones</title>
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
                                        <li><a href="usuario.php">Menu</a></li>
                                        <li><a href="pads.php">PADS</a></li>
                                        <li class="active"><a href="particiones.php">Particiones</a></li>
                                                                    
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrador <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                               <li><a href="clientes.php">Clientes</a></li>
            		                            <li><a href="../cotizaciones/archivos.php">Cotizaciones</a></li>
            		                            <li><a href="almacen.php">Almacen</a></li>		                            
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

            			<h1>Cotizacion de Particiones</h1>

            			<form name="user_form" action="../procesos/crea_pads.php" method="POST" >

                            <label>Fecha</label>            
                                    <input id="fecha" type="text" name="fecha" disabled /> 
                                    <input id="fechaescondido" type="hidden" name="fechaescondido" />
                                    
                                     

                            <label style="margin-left:2%">Folio #</label>            
                                    <input id="folio" type="text" name="folio" value="12345" required /><br/>


                            

                            <div class="items_pad1">                    
                                    
                                                                            
                                    <label># de parte</label><br/>             
                                    <input id="noparte" type="text" name="noparte" value="1" required /> <br/>                                                                
                                                          
                                    <h2>Parte A</h2>

                                <label># de Segmentos</label> <br/>              
                                    <input id="nosegmentosa" type="text" name="nosegmentosa" autocomplete="off" required /><br/>

                                <label>Largo</label> <br/>
                                    <input id="largoa" type="text" name="largoa" autocomplete="off" required /><br/>

                                <label>Alto</label> <br/>
                                    <input id="altoa" type="text" name="altoa" autocomplete="off" required /><br/>

                                    <label>Kilos A</label><br/> 
                                 <input id="kga" type="text" name="kga" disabled /><br/>
                                 <input id="kgescondidoa" type="hidden" name="kgescondidoa" />

                                      
                                     

                                    <label>Sub-Total A</label> <br/>
                                    <input id="subtotala" type="text" name="subtotala" disabled /> <br/>

                                    <input id="subtotalescondidoa" type="hidden" name="subtotalescondidoa"  /> 

                                    <label>Factor U.</label> <br/>
                                 <input id="factoru" type="text" name="factoru" disabled /><br/> 
                                    
                                            
                            </div>     

                             
                                    
                                              
                                   

                            <div class="items_pad1">

                                <label>Cliente</label>  <br/>           
                                    <input id="cliente" type="text" name="cliente" value="Nanolabs" required /> <br/>

                               <h2>Parte B</h2>

                                <label># de Segmentos</label> <br/>              
                                    <input id="nosegmentosb" type="text" name="nosegmentosb" autocomplete="off" required /><br/>

                                <label>Largo</label> <br/>
                                    <input id="largob" type="text" name="largob" autocomplete="off" required /><br/>

                                <label>Alto</label> <br/>
                                    <input id="altob" type="text" name="altob" autocomplete="off" required /><br/>

                                     <label>Kilos B</label><br/> 
                                 <input id="kgb" type="text" name="kgb" disabled /><br/>
                                 <input id="kgescondidob" type="hidden" name="kgescondidob" />




                                     <label>Sub-Total B</label> <br/>
                                    <input id="subtotalb" type="text" name="subtotalb" disabled /> <br/>

                                    <input id="subtotalescondidob" type="hidden" name="subtotalescondidob"  /> 

                                    <label>Precio por Set</label> <br/>
                                 <input id="precioxset" type="text" name="precioxset" disabled /><br/>

                                 <input id="precioxsetescondido" type="hidden" name="precioxsetescondido" />

                                 

                                  
                				
                            </div>

                            <div class="items_pad2">

                                 <label>Email</label> <br/>            
                                    <input id="email" type="email" name="email" value="eliasstaticx@hotmail.com" required /> <br/>

                                  <label># de Sets</label> <br/>              
                                    <input id="nosets" type="text" name="nosets" autocomplete="off" required /><br/>   

                                
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

                                <label>Gramos</label><br/> 
                                     <input id="gr" type="text" name="gr" disabled /> <br/>

                                     <input id="grescondido" type="hidden" name="grescondido" />   



                                <label>Precio x Kg</label> <br/>
                                    <input id="preciokg" type="text" name="preciokg" disabled /><br/>

                                     <input id="preciokgescondido" type="hidden" name="preciokgescondido" />
                                
                                    
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
                                    <th data-sort="int">Pads x bobina</th>
                                    <th data-sort="float">Desperdicio</th>
                                    <th>Bobina</th>
                                    <th>Material</th>
                                    <th>Calibre</th>
                                    <th>Largo</th>
                                    <th>Alto</th>
                                    <th>$ Unitario</th>
                                    <th>Total</th>
                                    
                                    <th>Area PAD</th>
                                    <th>Area Total</th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                                           
                                </tr>
                            </tbody>
                            
                        </table>

                        <table id="tablab" border="0" cellpadding="10" align="center" style="text-align:center;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th data-sort="int">Pads x bobina</th>
                                    <th data-sort="float">Desperdicio</th>
                                    <th>Bobina</th>
                                    <th>Material</th>
                                    <th>Calibre</th>
                                    <th>Largo</th>
                                    <th>Alto</th>
                                    <th>$ Unitario</th>
                                    <th>Total</th>
                                    
                                    <th>Area PAD</th>
                                    <th>Area Total</th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                                           
                                </tr>
                            </tbody>
                            
                        </table>



                        <input id="btndesperdicio" type="button" name="desperdiciobtn" value="Desperdicio" onclick="calcularDesperdicio()" />
                         <br><br>
                        <input id="btncotizar" type="submit" name="cotizarpad" value="Cotizar PAD"  />

                    <!-- Codigo de seleccion de Material con Calibre-->
                        <script type="text/javascript">
                   //------------------------------------------------------------------------------     
                    //-----------------------------------------------------------------------------        
                     //-----------------------------------------------------------------------------    

                        



                         function calcularDesperdicio() {
                            document.getElementById("btncotizar").style.display="block";
                            document.getElementById("tabla").style.display="block";
                            document.getElementById("tablab").style.display="block";


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

                                            if ( (nosegmentosa == "") || (largoa == "") || (altoa == "") || (nosegmentosb == "") || (largob == "") || (altob == "") || (nosegmentosa == 0) || (nosegmentosb == 0) || (largoa == 0) || (altoa == 0) || (largob == 0) || (altob == 0) ){

                                                
                                                alert("No pueden estar vacios o con ceros los campos");

                                            }else{


                                                //Recorremos el option 2 veces por todos los elementos
                                                    //for (var i = 0; i < nobobina; i++) {
                                                        
                                                        $("#"+ idSelect).find('option').each(function()
                                                            {
                                                               
                                                               vbobina = $(this).val(); 



                                                                ppa = 1;
                                                                ppb = 1;
                                                                areappa = altoa * largoa;
                                                                areappb = altob * largob;

                                                                areadesperdicioa = vbobina * altoa;
                                                                areadesperdiciob = vbobina * altob;

                                                                desperdicioa = areadesperdicioa - areappa;
                                                                desperdiciob = areadesperdiciob - areappb;

                                                                

                                                                porcdesppa = (desperdicioa * 100) / areadesperdicioa;
                                                                porcdespreda = porcdesppa.toFixed(3);

                                                                porcdesppb = (desperdiciob * 100) / areadesperdiciob;
                                                                porcdespredb = porcdesppb.toFixed(3);
                                                               

                                                                
                                                                diflargoa = vbobina - largoa;
                                                                
                                                                diflargob = vbobina - largob;



                                                               areappa = areappa.toFixed(3);
                                                               areappb = areappb.toFixed(3);


                                                               areadesperdicioa = areadesperdicioa.toFixed(3);
                                                               areadesperdiciob = areadesperdiciob.toFixed(3);
                                                               desperdicioa = desperdicioa.toFixed(3);
                                                               desperdiciob = desperdiciob.toFixed(3);
                                                               alert(porcdesppa);



                                                                if (  diflargoa < 0 ){

                                                                } else{

                                                                    if (porcdesppa >= 50){

                                                                        largopartes = vbobina / largoa;
                                                                        largopartes = parseInt(largopartes);

                                                                        largodoble = largoa * largopartes;
                                                                        areappadoble= altoa * largodoble;
                                                                        areadesperdicioadoble = vbobina * altoa;
                                                                        desperdicioadoble = areadesperdicioadoble - areappadoble;
                                                                        areadesperdicioadoble = areadesperdicioadoble.toFixed(3);
                                                                        ppa=largopartes;

                                                                        porcdespadoble = (desperdicioadoble * 100) / areadesperdicioadoble;
                                                                        porcdespreaddoble = porcdespadoble.toFixed(3);

                                                                        areappadoble = areappadoble.toFixed(3);                                                                   
                                                                        desperdicioadoble = desperdicioadoble.toFixed(3);

                                                                        
                                                                        
                                                                        indicecheck= indicecheck + 1;
                                                                        


                                                                        // $('#tabla > tbody:last').append('<tr><td><input type="checkbox" name="listado[]"  value="'+  indicecheck + '-   -' + ppa + '-   -' + porcdespreaddoble + '%' + '-   -' + vbobina + '-   -' + material + '-   -' + tipocalibre + '-   -' + largoa + '-   -' + altoa + '-   -' + setunitario + '-   -' + utilidad + '-   -'  + areappadoble + '-   -' + areadesperdicioadoble + '-   -' + desperdicioadoble  +'"></td><td>'+ ppa +'</td><td>'+ porcdespreaddoble + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largoa +'</td><td>'+ altoa +'</td><td>'+ setunitario +'</td><td>'+ utilidad +'</td><td>' + areappadoble +'</td><td>'+ areadesperdicioadoble +'</td><td>'+ desperdicioadoble +'</td></tr>');
                                                                        $('#tabla > tbody:last').append('<tr><td><input type="checkbox" name="listado[]"  value=""></td><td>'+ ppa +'</td><td>'+ porcdespreaddoble + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largoa +'</td><td>'+ altoa +'</td><td>'+ setunitario +'</td><td>'+ utilidad +'</td><td>' + areappadoble +'</td><td>'+ areadesperdicioadoble +'</td><td>'+ desperdicioadoble +'</td></tr>');
                                                                         }else{

                                                                        // $('#tabla > tbody:last').append('<tr><td><input type="checkbox" name="listado[]"  value="'+  indicecheck + '-   -' + ppa + '-   -' + porcdespreaddoble + '%' + '-   -' + vbobina + '-   -' + material + '-   -' + tipocalibre + '-   -' + largoa + '-   -' + altoa + '-   -' + setunitario + '-   -' + utilidad + '-   -'  + areappadoble + '-   -' + areadesperdicioadoble + '-   -' + desperdicioadoble  +'"></td><td>'+ ppa +'</td><td>'+ porcdespreaddoble + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largoa +'</td><td>'+ altoa +'</td><td>'+ setunitario +'</td><td>'+ utilidad +'</td><td>' + areappadoble +'</td><td>'+ areadesperdicioadoble +'</td><td>'+ desperdicioadoble +'</td></tr>');
                                                                                 $('#tabla > tbody:last').append('<tr><td><input type="checkbox" name="listado[]"  value=""></td><td>'+ ppa +'</td><td>'+ porcdespreaddoble + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largoa +'</td><td>'+ altoa +'</td><td>'+ setunitario +'</td><td>'+ utilidad +'</td><td>' + areappadoble +'</td><td>'+ areadesperdicioadoble +'</td><td>'+ desperdicioadoble +'</td></tr>');


                                                                    }

                                                                    
                                                                   
                                                                }

                                                                

                                                                if ( diflargob < 0 ){

                                                                } else{
                                                                    
                                                                    


                                                                    if (porcdesppb >= 50){

                                                                        altopartes = vbobina / altob;
                                                                        altopartes = parseInt(altopartes);
                                                                        altodoble = altob * altopartes;
                                                                        areapaddb= altodoble * largob;
                                                                
                                                                        areadesperdicioaltodb = vbobina * largob;
                                                                        padalto=altopartes;

                                                                        desperdicioaltodb = areadesperdicioaltodb - areapaddb;                                                         

                                                                        porcdesp2db = (desperdicioaltodb * 100) / areadesperdicioaltodb;
                                                                        porcdespred2db = porcdesp2db.toFixed(3);

                                                                        areapaddb = areapaddb.toFixed(3);
                                                                        areadesperdicioaltodb = areadesperdicioaltodb.toFixed(3);
                                                                        desperdicioaltodb = desperdicioaltodb.toFixed(3);

                                                                        indicecheck= indicecheck + 1;

                                                                   
                                                                         $('#tablab > tbody:last').append('<tr><td><input type="checkbox" name="listado[]" value="'+  indicecheck + '-   -' + padalto + '-   -' + porcdespred2db + '%' + '-   -' +  vbobina + '-   -' + material + '-   -' + tipocalibre + '-   -' + largo + '-   -' + alto + '-   -' + unitario + '-   -' + total + '-   -' +'Alto' + '-   -' + areapaddb + '-   -' + areadesperdicioaltodb + '-   -' + desperdicioaltodb + '-   -' +'"></td><td>'+ padalto +'</td><td>'+ porcdespred2db + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largo +'</td><td>'+ alto +'</td><td>'+ unitario +'</td><td>'+ total +'</td><td>Alto</td><td>'+ areapaddb +'</td><td>'+ areadesperdicioaltodb +'</td><td>'+ desperdicioaltodb +'</td></tr>');
                                                                        
                                                                        // $('#tablab > tbody:last').append('<tr><td><input type="checkbox" name="listado[]" value="'+  indicecheck + '-   -' + padalto + '-   -' + porcdespred2db + '%' + '-   -' +  vbobina + '-   -' + material + '-   -' + tipocalibre + '-   -' + largo + '-   -' + alto + '-   -' + unitario + '-   -' + total + '-   -' +'Alto' + '-   -' + areapaddb + '-   -' + areadesperdicioaltodb + '-   -' + desperdicioaltodb + '-   -' +'"></td><td>'+ padalto +'</td><td>'+ porcdespred2db + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largo +'</td><td>'+ alto +'</td><td>'+ unitario +'</td><td>'+ total +'</td><td>Alto</td><td>'+ areapaddb +'</td><td>'+ areadesperdicioaltodb +'</td><td>'+ desperdicioaltodb +'</td></tr>');   
                                                                        }else {
                                                                            $('#tablab > tbody:last').append('<tr><td><input type="checkbox" name="listado[]" value="'+  indicecheck + '-   -' + padalto + '-   -' + porcdespred2db + '%' + '-   -' +  vbobina + '-   -' + material + '-   -' + tipocalibre + '-   -' + largo + '-   -' + alto + '-   -' + unitario + '-   -' + total + '-   -' +'Alto' + '-   -' + areapaddb + '-   -' + areadesperdicioaltodb + '-   -' + desperdicioaltodb + '-   -' +'"></td><td>'+ padalto +'</td><td>'+ porcdespred2db + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largo +'</td><td>'+ alto +'</td><td>'+ unitario +'</td><td>'+ total +'</td><td>Alto</td><td>'+ areapaddb +'</td><td>'+ areadesperdicioaltodb +'</td><td>'+ desperdicioaltodb +'</td></tr>');

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


                                    document.getElementById("btncotizar").style.display="none";
                                    indicecheck = 0;

                                                                 
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

                                                                nosets = $('#nosets').val();
                                                                nosegmentosa = $('#nosegmentosa').val();
                                                                nosegmentosb = $('#nosegmentosb').val();
                                                                altoa = $('#altoa').val();
                                                                largoa = $('#largoa').val();
                                                                altob = $('#altob').val();
                                                                largob = $('#largob').val();


                                                                kga = kilosa;
                                                                kgb = kilosb;

                                                                nosegmentosax = nosegmentosa *nosets;
                                                                nosegmentosbx = nosegmentosb *nosets;

                                                                kilosa = parseFloat(nosegmentosa) * 
                                                                parseFloat(altoa) * parseFloat(largoa) *
                                                                parseFloat(gramos);
                                                                kilosb = parseFloat(nosegmentosb) * 
                                                                parseFloat(altob) * parseFloat(largob) *
                                                                parseFloat(gramos);

                                                                 kilosax = parseFloat(nosegmentosax) * 
                                                                parseFloat(altoa) * parseFloat(largoa) *
                                                                parseFloat(gramos);
                                                                kilosbx = parseFloat(nosegmentosbx) * 
                                                                parseFloat(altob) * parseFloat(largob) *
                                                                parseFloat(gramos);



                                                               
                                                                subtotala = kilosa * pxkg;
                                                                subtotalb = kilosb * pxkg;

                                                                subtotalax = kilosax * pxkg;
                                                                subtotalbx = kilosbx * pxkg;


                                                                subtotal = subtotala + subtotalb;

                                                                factor =2;
                                                                totala = subtotala * factor;
                                                                totalb = subtotalb * factor;
                                                                totala=totala.toFixed(3);
                                                                totalb=totalb.toFixed(3);

                                                                unitarioa = totala / nosegmentosa;
                                                                unitarioa = unitarioa.toFixed(3);
                                                                unitariob = totalb / nosegmentosa;
                                                                unitariob = unitariob.toFixed(3);
                                                                //setunitario = parseFloat(nosets) * parseFloat(subtotal);
                                                                

                                                                ranuradoarmado = 0.0026;
                                                                segmentos = parseFloat(nosegmentosa) + parseFloat(nosegmentosb);
                                                                factorra = parseFloat(segmentos) * parseFloat(ranuradoarmado);
                                                                x = parseFloat(subtotal);
                                                                setunitario = (parseFloat(x) + parseFloat(factorra)) * 2;
                                                               setunitario = setunitario.toFixed(3);


                                                               utilidad = setunitario * nosets;                                                           



                                                                $("#kga").val(kilosax);
                                                                $("#kgescondidoa").val(kilosax);
                                                                $("#kgb").val(kilosbx);
                                                                $("#kgescondidob").val(kilosbx);

                                                                $("#factoru").val(factor);
                                                                
                                                                $("#subtotala").val(subtotalax);
                                                                $("#subtotalescondidoa").val(subtotalax);
                                                                $("#subtotalb").val(subtotalbx);
                                                                $("#subtotalescondidob").val(subtotalbx);

                                                                $("#utilidad").val(utilidad);
                                                                $("#utilidadescondido").val(utilidad);
                                                                $("#tipocalibreescondido").val(tipocalibre);
                                                                $("#precioxset").val(setunitario);





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

                                                                nosets = $('#nosets').val(); 
                                                                nosegmentosa = $('#nosegmentosa').val();
                                                                nosegmentosb = $('#nosegmentosb').val();
                                                                altoa = $('#altoa').val();
                                                                largoa = $('#largoa').val();
                                                                altob = $('#altob').val();
                                                                largob = $('#largob').val();

                                                                nosegmentosax = nosegmentosa *nosets;
                                                                nosegmentosbx = nosegmentosb *nosets;

                                                                 kilosa = parseFloat(nosegmentosa) * 
                                                                parseFloat(altoa) * parseFloat(largoa) *
                                                                parseFloat(gramos);
                                                                kilosb = parseFloat(nosegmentosb) * 
                                                                parseFloat(altob) * parseFloat(largob) *
                                                                parseFloat(gramos);

                                                                 kilosax = parseFloat(nosegmentosax) * 
                                                                parseFloat(altoa) * parseFloat(largoa) *
                                                                parseFloat(gramos);
                                                                kilosbx = parseFloat(nosegmentosbx) * 
                                                                parseFloat(altob) * parseFloat(largob) *
                                                                parseFloat(gramos);

                                                                


                                                                subtotala = kilosa * pxkg;
                                                                subtotalb = kilosb * pxkg;

                                                                subtotalax = kilosax * pxkg;
                                                                subtotalbx = kilosbx * pxkg;

                                                                subtotal = subtotala + subtotalb;



                                                                factor =2;
                                                                totala = subtotala * factor;
                                                                totalb = subtotalb * factor;
                                                                totala=totala.toFixed(3);
                                                                totalb=totalb.toFixed(3);

                                                                unitarioa = totala / nosegmentosa;
                                                                unitarioa = unitarioa.toFixed(3);
                                                                unitariob = totalb / nosegmentosa;
                                                                unitariob = unitariob.toFixed(3);
                                                                //setunitario = parseFloat(nosets) * parseFloat(subtotal);
                                                                

                                                                ranuradoarmado = 0.0026;
                                                                segmentos = parseFloat(nosegmentosa) + parseFloat(nosegmentosb);
                                                                factorra = parseFloat(segmentos) * parseFloat(ranuradoarmado);
                                                                x = parseFloat(subtotal);
                                                                setunitario = (parseFloat(x) + parseFloat(factorra)) * 2;
                                                               setunitario = setunitario.toFixed(3);


                                                               utilidad = setunitario * nosets;                                                           



                                                                $("#kga").val(kilosax);
                                                                $("#kgescondidoa").val(kilosax);
                                                                $("#kgb").val(kilosbx);
                                                                $("#kgescondidob").val(kilosbx);

                                                                $("#factoru").val(factor);
                                                                
                                                                $("#subtotala").val(subtotalax);
                                                                $("#subtotalescondidoa").val(subtotalax);
                                                                $("#subtotalb").val(subtotalbx);
                                                                $("#subtotalescondidob").val(subtotalbx);

                                                                $("#utilidad").val(utilidad);
                                                                $("#utilidadescondido").val(utilidad);
                                                                $("#tipocalibreescondido").val(tipocalibre);
                                                                $("#precioxset").val(setunitario);

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