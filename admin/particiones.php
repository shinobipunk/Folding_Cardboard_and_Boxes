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
                    <title>Particiones</title>
                    <meta name="description" content="">
                    <meta name="viewport" content="width=device-width">

                 <?php include '../encabezado.php'; ?>

                 <script type="text/javascript">              

                    $(document).ready(function() {

    document.getElementById("btnenviar").style.display = "none";

    indicecheck = 0;

});

function actualizar() {

    valores();
    calcular();
    totalpads();
    mejoropcion();
}
 </script>


        <script type="text/javascript">
        function mejoropcion(){
              padmenor = 0;
             
               menorpad = new Array();

                    campoop = document.getElementsByClassName( 'campo' );
                    tamcamo = campoop.length;

                    for(var u=0;u<tamcamo;u++){

                      padcamp = campoop[u].value.split('-   -');    
                      totalmen = padcamp[11];
                      totalmen = Number(totalmen);   
                      menorpad[u] = totalmen;                      
                    }

                      resultado = menorpad[0];
                      padsel = campoop[0];
                      for(var ui=0; ui<tamcamo; ui++)
                      {
                        if(menorpad[ui] < resultado)
                          {
                            resultado = menorpad[ui];
                            padsel = campoop[ui];
                          }
                      }                                      
                  
               fondopad = padsel.parentNode;
               fondopad.parentNode.style.backgroundColor='#ccc';

            }

        function totalpads(){
              sumatotalpads = 0;
             


                    agr = document.getElementsByClassName( 'seleccionados' )
                    tamagr = agr.length;

                    for(var i=0;i<tamagr;i++){

                      padagr = agr[i].value.split('-   -')    
                      totalpadagr = padagr[11];
                      totalpadagr = Number(totalpadagr);            
                      sumatotalpads = sumatotalpads + totalpadagr;
                      
                    }

                    sumatotalpads = sumatotalpads.toFixed(3);
                   
                    document.getElementById('sumatotalpads').innerHTML = sumatotalpads;
                    $("#totalapagar").val(sumatotalpads);
             

            }


                  arregloparticiones = new Array();

                    x=0;

                    y=0; //contador para checar los seleccionados

                    p=0; // contador para  los elementos del array

                    verchecks = 0;


                    




                    function anadiroptimos(){





                        document.getElementById("tablaagregados").style.display="block";

                        seleccionado = document.getElementsByClassName("campo");

                           iteraciones = seleccionado.length;



                        $("#tablaelementos").find('tr').each(function(){



                            if (seleccionado[y].checked){

                                verchecks = verchecks + 1;

                            }

                            y=y+1;



                        });



                        if (verchecks > 0){



                                $("#tablaelementos").find('tr').each(function(){                                

                                                                      

                                  // for(x=0; x<iteraciones; x++){

                                   // alert(p);

                                    

                                        if (seleccionado[x].checked){

                                            objetoseleccionado = arregloparticiones[p];

                                            casilla = seleccionado[x];

                                            vaumento = parseFloat(document.getElementById('aumento'+ x +'').value);

                                             <?php

                                          if( ($_SESSION["nivel"] == "AD") || ($_SESSION["nivel"] == "UN")){

                                             ?> 

                                            if (vaumento >= 0){
                                              unitarioaumentado = parseFloat(objetoseleccionado.unitario) + vaumento;  
                                            }else{
                                               unitarioaumentado = parseFloat(objetoseleccionado.unitario) + 0;  
                                            }

                                             <?php 
                                                    }
                                              
                                                 
                                              if ($_SESSION["nivel"] == "ES"){
                                                ?>
                                             

                                           
                                              unitarioaumentado = parseFloat(objetoseleccionado.unitario) + vaumento;  
                                           

                                             <?php 
                                                    }
                                              ?>

                                            totalaumentado = parseFloat(objetoseleccionado.numerosets) * unitarioaumentado;
                                            
                                            if ( (totalaumentado >= 2500) && (totalaumentado <= 4999)  )
                                            {
                                              totalaumentado = totalaumentado - (totalaumentado * .05)
                                            } 
                                            else if ( (totalaumentado >= 5000) && (totalaumentado <= 9999)  )
                                            {
                                              totalaumentado = totalaumentado - (totalaumentado * .1)
                                            }else if ( totalaumentado >= 10000 )
                                            {
                                              totalaumentado = totalaumentado - (totalaumentado * .15)
                                            }

                                            unitarioaumentado = unitarioaumentado.toFixed(3);
                                            totalaumentado = totalaumentado.toFixed(3);

                                            datosenviar = casilla.value + "-   -" +  vaumento;
                                            agregardatos = datosenviar.split("-   -");
                                            agregardatos[10] = unitarioaumentado;
                                            agregardatos[11] = totalaumentado;
                                            datosenviar = agregardatos.join("-   -");

                                           $('#tablaagregados > tbody:last').append('<tr><td><input class="seleccionados"  type="checkbox" name="listado[]" value="' + datosenviar +' " checked></td><td>'+ objetoseleccionado.bobina +'</td><td>'+ objetoseleccionado.material +'</td><td>'+ objetoseleccionado.calibre +'</td><td>'+ optimoobjeto.segmentosa +'</td><td>'+ optimoobjeto.largoa +'</td><td>'+ optimoobjeto.altoa +'</td><td>'+ optimoobjeto.segmentosb +'</td><td>'+ optimoobjeto.largob +'</td><td>'+ optimoobjeto.altob +'</td><td class="resaltado">'+ unitarioaumentado +'</td><td class="resaltado">'+ totalaumentado +'</td><td>'+ objetoseleccionado.desperdicioa +'%</td><td>'+ objetoseleccionado.desperdiciob +'%</td>'); 
                                            //datos = casilla.value.split("-   -");
                                          // alert(datos);

                                        seleccionado[x].checked = false;

                                        }else{

                                        //    alert('no seleccionado');

                                            

                                        }





                                  // }



                                   x=x+1;

                                   p=p+1;

                                 });

                        }else{

                            alert("Tiene que seleccionar al menos una cotizacion");

                        }

                        //vaciar arregloparticiones

                       /* tamarregloparticiones = arregloparticiones.length;

                        for(var i = 0; i < tamarregloparticiones; i++) {

                            arregloparticiones.pop();   

                        }*/

                        

                        x=0;

                        y=0;

                        verchecks = 0;





                    }


                     function eliminargramos(){

                        var Parent = document.getElementById("insertarbobina");

                    while(Parent.hasChildNodes())

                    {

                       Parent.removeChild(Parent.firstChild);

                    }

                    }   

                    function eliminarelementos(){

                        var Parent = document.getElementById("tablaelementos");

                    while(Parent.hasChildNodes())

                    {

                       Parent.removeChild(Parent.firstChild);

                    }

                    }

                   function calcularDesperdicio() {     

                    eliminarelementos();


                       
                        document.getElementById("btnenviar").style.display="block"; 
                        document.getElementById("tabla").style.display="block"; 




                              function optimo(bobina,material,calibre,segmentosa, largoa, altoa, desperdicioa,segmentosb, largob, altob, desperdiciob, numerosets, unitario, total)

                              {                               

                                
                               

                                this.bobina=bobina;

                                this.material=material;

                                this.calibre = calibre;

                                this.segmentosa = segmentosa;

                                this.largoa = largoa;

                                this.altoa = altoa;

                                this.desperdicioa = desperdicioa;                                

                                this.segmentosb = segmentosb;

                                this.largob = largob;

                                this.altob = altob;

                                this.desperdiciob = desperdiciob;                                

                                this.numerosets = numerosets;

                                this.unitario = unitario;

                                this.total = total;

                              }




                               // idSelect =material +" -" + tipocalibre;
                               idSelect ="bobinaalmacen";

                               nobobina = document.getElementById(idSelect).length;



                                //lista = new array();

                                if (nobobina == 1){

                                  alert("No hay bobinas disponibles");



                                }else{


                                        caum = 0;
                                      $("#bobinaalmacen").find('option').each(function()

                                      { 
                                                                             




                                       
                                         optimoobjeto = new optimo();


                                        vbobina = $(this).val(); 

                                        particion = 1;


                                        /////////////////////////////////////////////////
                /// desperdicio/////////////

                                        largopartesa = vbobina /largoax;
                                        largopartesa = parseInt(largopartesa);
                                        largopartesb = vbobina /largobx;
                                        largopartesb = parseInt(largopartesb);

                                        largodoblea = largoax * largopartesa;
                                        largodobleb = largobx * largopartesb;

                                        areapada = altoax * largodoblea;
                                        areapadb = altobx * largodobleb;

                                        areadesperdicioa = vbobina * altoax;
                                        areadesperdiciob = vbobina * altobx;

                                        areadesperdicio = areadesperdicioa + areadesperdiciob;



                                        desperdicioa = areadesperdicioa - areapada;

                                        desperdiciob = areadesperdiciob - areapadb;

                                        desperdicio = desperdicioa + desperdiciob;




                                        porcdespa = (desperdicioa * 100) / areadesperdicioa;

                                        porcdespreda = porcdespa.toFixed(3);

                                        porcdespb = (desperdiciob * 100) / areadesperdiciob;

                                        porcdespredb = porcdespb.toFixed(3);


                                        difaltoa = vbobina-altoax;
                                        difaltob = vbobina-altobx;

                                        diflargoa = vbobina-largoax;
                                        diflargob = vbobina-largobx;



                                        areadesperdicio = areadesperdicio.toFixed(3);

                                        desperdicio = desperdicio.toFixed(3); 

////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////

                                        



                                        ////////////////////////////////////////


                                       
                                        if (  (diflargoa < 0) || (diflargob < 0)   ){



                                        } else{                                       







                                            piezasa= vbobina / largoax;
                                            piezasb= vbobina / largobx;
                                            piezasa = Math.floor(piezasa);
                                            piezasb = Math.floor(piezasb);


                                            nosetsx = parseFloat(nosetsx);
                                            kilosax = parseFloat(vbobina) * parseFloat(altoax) * parseFloat(gramosx) *  ((nosetsx * parseFloat(nosegmentosax))/piezasa);
                                            kilosbx = parseFloat(vbobina) * parseFloat(altobx) * parseFloat(gramosx) *  ((nosetsx * parseFloat(nosegmentosbx))/piezasb);

                                            totalkilos = kilosax + kilosbx;    


                                            subtotalax = kilosax * preciokgx;
                                            subtotalbx = kilosbx * preciokgx;

                                            ranurado = 0.0026;

                                            precioranuradox = (parseFloat(nosegmentosax) + parseFloat(nosegmentosbx)) * ranurado;
                                            subtotalax = parseFloat(subtotalax);
                                            subtotalbx = parseFloat(subtotalbx);

                                            sumasubtotal = subtotalax + subtotalbx;
                                            preciosetalgoritmox = ( (parseFloat(sumasubtotal) / nosetsx ) + parseFloat(precioranuradox) ) * factorx;
                                            preciosetalgoritmox = preciosetalgoritmox.toFixed(3);





                                            totalx = preciosetalgoritmox * nosetsx;
                                            totalx=totalx.toFixed(3);




                                            

                                           optimoobjeto.bobina=vbobina;

                                            optimoobjeto.material=materialx;

                                            optimoobjeto.calibre = calibrex;

                                            optimoobjeto.segmentosa = nosegmentosax;

                                            optimoobjeto.largoa = largoax;

                                            optimoobjeto.altoa = altoax;

                                            optimoobjeto.desperdicioa = porcdespreda;

                                            optimoobjeto.segmentosb = nosegmentosbx;

                                            optimoobjeto.largob = largobx;

                                            optimoobjeto.altob = altobx;

                                            optimoobjeto.desperdiciob = porcdespredb;

                                            optimoobjeto.numerosets = nosetsx;

                                            optimoobjeto.unitario =  preciosetalgoritmox;

                                            optimoobjeto.total = totalx;
                                             
                                               


                                                        
                                            


                                            }


                                              cl = parseFloat(optimoobjeto.desperdicio);
                                              
                                              if ((optimoobjeto.bobina > 0) ){
                                                arregloparticiones[indicecheck] = optimoobjeto;

                                                indicecheck= indicecheck + 1;

                                                
                                                $('#tabla > tbody:last').append('<tr><td><input class="campo" type="checkbox" name="listado[]" value="'+ optimoobjeto.numerosets + '-   -' + optimoobjeto.segmentosa + '-   -'+ optimoobjeto.largoa + '-   -' + optimoobjeto.altoa + '-   -'+ optimoobjeto.segmentosb + '-   -'+ optimoobjeto.largob + '-   -' + optimoobjeto.altob + '-   -' + optimoobjeto.material + '-   -' + optimoobjeto.calibre + '-   -'  + optimoobjeto.bobina + '-   -'  +  optimoobjeto.unitario + '-   -' + optimoobjeto.total +'-   -' + optimoobjeto.desperdicioa +'-   -' + optimoobjeto.desperdiciob +'"></td><td>'+ optimoobjeto.bobina +'</td><td>'+ optimoobjeto.material +'</td><td>'+ optimoobjeto.calibre +'</td><td>'+ optimoobjeto.segmentosa +'</td><td>'+ optimoobjeto.largoa +'</td><td>'+ optimoobjeto.altoa +'</td><td>'+ optimoobjeto.segmentosb +'</td><td>'+ optimoobjeto.largob +'</td><td>'+ optimoobjeto.altob +'</td><td class="resaltado">'+ optimoobjeto.unitario +'</td><td class="resaltado">'+ optimoobjeto.total +'</td><td>' +optimoobjeto.desperdicioa +'%</td><td>' +optimoobjeto.desperdiciob +'%</td><td><input id="aumento'+ caum +'" class="aumento" type="text" name="aumento" value="0" ></td>');                                                                                                                      
                                                    caum =caum + 1;
                                                          }


                                        });
                                      } 











                    }//funcion

                 </script>

                 

                </head>
                <body onLoad="setInterval('actualizar()',1000)">
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
                                        <li class="active"><a href="particiones.php">Particiones</a></li>
                                                                    
                                        
                                    

                                    
                                                                              

                                    <li class="dropdown">

                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>

                                        <ul class="dropdown-menu">
                            

                                           <li><a href="clientes.php">Clientes</a></li>

                                            <li><a href="../cotizaciones/archivos.php">Cotizaciones</a></li>

                                            <?php

                    if( ($_SESSION["nivel"] == "AD") || ($_SESSION["nivel"] == "ES")){

                         ?> 

                                            <li><a href="almacen.php">Almacen</a></li>                                  

                                            <li class="divider"></li>

                                            <li class="nav-header">Seguridad</li>

                                            <li><a href="usuarios.php">Usuarios</a></li>
                                            <?php

                    }

                         ?> 

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




            			<?php
            			if(($_SESSION["nivel"] == "AD") || ($_SESSION["nivel"] == "ES") || ($_SESSION["nivel"] == "UN")){
            				 ?>

                             <?php 
                                        if (isset($_GET["exito"]) AND $_GET["exito"] == 1) { 
                                              echo "<h2 class=\"alert alert-success\">Cotizacion Enviada!</h2>";
                                            } 

                                    ?>

            		<br>
                    <div class="icon" aria-hidden="true" data-icon="">    Cotizacion de Particiones</div>                                                                   
                    <br><br>

            			<form name="user_form" action="../procesos/crea_particiones.php" method="POST" >

                            <label>Fecha</label>   
                                    <input type="hidden" name="creado" value="<?php echo $_SESSION["nombre"].' '.$_SESSION["apaterno"];  ?>" required />         
                                    <input type="hidden" name="emailusuario"  value="<?php echo $_SESSION["email"];  ?>" required />         
                                    <input id="fecha" type="text" name="fecha" disabled /> 
                                    <input id="fechaescondido" type="hidden" name="fechaescondido" />
                                    
                                     

                            <label style="margin-left:2%">Folio #</label>            
                                    <div id="insertarfolio"></div>


                            

                            <div class="items_pad1">                    
                                    
                                                                            
                                    <label># de parte</label><br/>             
                                    <input id="noparte" type="text" name="noparte"  required /> <br/>   

                                                                                                 
                                                          
                                    <h2>Parte A</h2>

                                <label># de Piezas</label> <br/>              
                                    <input id="nosegmentosa" type="text" name="nosegmentosa" autocomplete="off"  required /><br/>

                                <label>Largo</label> <br/>
                                    <input id="largoa" type="text" name="largoa" autocomplete="off"  required /><br/>

                                <label>Alto</label> <br/>
                                    <input id="altoa" type="text" name="altoa" autocomplete="off"  required /><br/>

                            
                                    <label>Kilos A</label><br/> 
                                 <input id="kga" type="text" name="kga" disabled /><br/>
                                                             
                                 <input id="kgescondidoa" type="hidden" name="kgescondidoa" />

                                      
                                     
                                <?php

                                    if( ($_SESSION["nivel"] == "AD") || ($_SESSION["nivel"] == "ES")){

                                ?>                 
                                    <label>Sub-Total A</label> <br/>
                                    <input id="subtotala" type="text" name="subtotala" disabled /> <br/>
                                <?php

                                    }

                                ?>                                     

                                    <input id="subtotalescondidoa" type="hidden" name="subtotalescondidoa"  /> 

                                    <?php 

                                    if ($_SESSION["nivel"] == "ES") { 
                              echo  '<label>Factor</label>  <br/><input id="factoru" type="text" name="factoru" value="2" /><br>'; 
                            }else{ 

                             echo '<input id="factoru" type="hidden" name="factoru" value="2" />';
                              }?>
                                    
                                            
                            </div>     

                             
                                    
                                              
                                   

                            <div class="items_pad1">

                                        
                                     <label># de Sets</label> <br/>              
                                    <input id="nosets" type="text" name="nosets" autocomplete="off" required /><br/>
                              

                               <h2>Parte B</h2>

                                <label># de Piezas</label> <br/>              
                                    <input id="nosegmentosb" type="text" name="nosegmentosb" autocomplete="off"  required /><br/>

                                <label>Largo</label> <br/>
                                    <input id="largob" type="text" name="largob" autocomplete="off"  required /><br/>

                                <label>Alto</label> <br/>
                                    <input id="altob" type="text" name="altob" autocomplete="off"  required /><br/>

                                     
                                         
                                     <label>Kilos B</label><br/> 
                                 <input id="kgb" type="text" name="kgb" disabled /><br/>
                                 <input id="kgescondidob" type="hidden" name="kgescondidob" />

                                    <?php

                                        if( ($_SESSION["nivel"] == "AD") || ($_SESSION["nivel"] == "ES")){

                                    ?> 


                                     <label>Sub-Total B</label> <br/>
                                    <input id="subtotalb" type="text" name="subtotalb" disabled /> <br/>

                                    <input id="subtotalescondidob" type="hidden" name="subtotalescondidob"  /> 

                                    <label>Precio por Set</label> <br/>
                                 <input id="precioxset" type="text" name="precioxset" disabled /><br/>

                                 <input id="precioxsetescondido" type="hidden" name="precioxsetescondido" />

                                 <?php

                                    }

                                ?>  

                                  
                				
                            </div>

                            <div class="items_pad2">

                                 <label for="empresaeditar">Empresa</label><br>
                                     <select id="cliente" name="cliente" onchange="mostrarclientes_pads(this.value)"><option  value=""  required> --Escoje una Empresa-- </option>
                                    <?php 
                                        $query = sprintf("SELECT empresa FROM empresas where 1 GROUP BY empresa ASC ");
                                        $result=mysql_query($query,$link) or die(mysql_error()); 
                                        while($row=mysql_fetch_array($result,MYSQLI_NUM)){
                                        echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";
                                        }
                                     ?>
                                    </select> 

                              <div id="insertarcliente"></div>
                                <div id="insertarclientenombre"></div>    
                              <div id="insertarclienteemail"></div>   
                              <br>

                                     

                                
                               <label for="almaceneditar">Material</label><br>
                            <select id="materialalmacen" name="almacenmaterialedit" onclick ='material_val()' onchange="mostrararticulos(this.value)"><option value=""> --Escoge el Material-- </option>
                                <?php 
                                    $verificar = "SI";
                                    $query = sprintf("SELECT material FROM almacen where existencia='%s' GROUP BY material", $verificar);
                                    $result=mysql_query($query,$link) or die(mysql_error()); 
                                    while($row=mysql_fetch_array($result,MYSQLI_NUM)){
                                    echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";
                                        }
                                ?>
                            </select>   
                             <input id="valormaterial" type="hidden" name="valormaterial" required/>  
                         <!--     </form>     -->                                                       
                            <div id="insertarmaterial"></div>

                            <div id='insertarbobina'></div>

                                <input id="bobinaescondido" type="hidden"  name="bobinaescondido" />

                                <label>Total KG</label> <br/>
                                <input id="totalkg" type="text" name="totalkg" disabled /><br/>
                                <input id="totalkgescondido" type="hidden" name="totalkgescondido" />   
                                                            
                            
                                <?php

                                    if( ($_SESSION["nivel"] == "AD") || ($_SESSION["nivel"] == "ES")){

                                ?>                                      
                                <label>Total</label> <br/>
                                 <input id="utilidad" type="text" name="utilidad" disabled /><br/>
                                <?php

                                    }

                                ?>   

                                 <input id="utilidadescondido" type="hidden" name="utilidadescondido" />

                                	
                                 


                            </div>

                            <div class="clearitem"></div>

                        <!--    <div id="test">asd</div> -->
                            

            			<br><br>
                        <input id="btncotizar" type="button" name="cotizarparticion" value="Cotizar Particion" onclick="calcularDesperdicio()"  />                            
                          <br><br>
                        
                       <!--  <div id="tablapad"></div> -->
                        <table id="tabla" border="0" cellpadding="10" align="center" style="text-align:center;">
                           <h1>Opciones</h1>

                            <thead>
                                <tr>
                                    <th></th>                                    
                                    <th>Bobina</th>
                                    <th>Material</th>
                                    <th>Calibre</th>
                                    <th>Piezas A</th>
                                    <th>Largo A</th>
                                    <th>Alto A</th>
                                    <th>Piezas B</th>
                                    <th>Largo B</th>
                                    <th>Alto B</th>
                                    <th>$ Unitario</th>
                                    <th>Total</th>
                                    <th>Desp a</th>
                                    <th>Desp b</th>
                                    <th>Aumentar</th>
                                    
                                   
                                    
                                </tr>
                            </thead>

                            <tbody id="tablaelementos">

                            <tr>

                                                       

                            </tr>

                        </tbody>
                            
                        </table>
                          

                        <table id="tablaagregados" border="0" cellpadding="10" align="center" style="text-align:center;">
                             <h1>Seleccionados</h1>
                            <thead>
                                <tr>
                                    <th></th>
                                    
                                    <th>Bobina</th>
                                    <th>Material</th>
                                    <th>Calibre</th>
                                    <th>Piezas A</th>
                                    <th>Largo A</th>
                                    <th>Alto A</th>
                                    <th>Piezas B</th>
                                    <th>Largo B</th>
                                    <th>Alto B</th>                                    
                                    <th>$ Unitario</th>
                                    <th>Total</th>
                                    <th>Desp a</th>
                                    <th>Desp b</th>
                                
                                    
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                                           
                                </tr>
                            </tbody>
                            
                        </table>
                    
                    <br>

                    <h1>Total: $<span id="sumatotalpads"></span></h1>
                    <input id="totalapagar" name="totalapagar" type="hidden" /> 
                    <br>

                    <input id="btnagregar" type="button" name="btnagregar" value="Agregar Cotizacion" onclick="anadiroptimos()" />

                    <br>

                    <textarea id="observaciones" name="observaciones" placeholder="Observaciones"  maxlength="1400" cols="20" rows="6"></textarea>
                    <br>


                    <h1><input type="checkbox" name="enviarusuario" value="si"> Reenviar a mi correo</h1>
                    <br>
                    <input id="btnprev" type="submit" name="btnprev" value="Vista Previa"/>
                    <br>

                    <input id="btnenviar" type="submit" name="btnenviar" value="Enviar Cotizacion"  />
                   

                 
                       

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


            <script type="text/javascript">

            function valores(){

                materialx = $('#materialalmacen').val();
                calibrex = $('#calibrealmacen').val();
                bobinax = $('#bobinaalmacen').val();
                gramosx = $('#gramosalmacen').val();
                preciokgx = $('#preciokgalmacen').val();
                factorx = $('#factoru').val();
                nosetsx = $('#nosets').val();
                largoax = $('#largoa').val();
                altoax = $('#altoa').val();
                largobx = $('#largob').val();
                altobx = $('#altob').val();
                nosegmentosax = $('#nosegmentosa').val();
                nosegmentosbx = $('#nosegmentosb').val();



              // alert(materialx + '-' + calibrex +'-' + bobinax +'-' +gramosx +'-' + preciokgx+'-' + factorx +'-' + nopadsx+'-' + largox+'-' + altox);

            }

            function calcular(){

              // ------ Operaciones ------------              

              /*
                //Kilos A
                kilosax = parseFloat(altoax) * parseFloat(largoax) *  parseFloat(gramosx) * parseFloat(nosegmentosax);
              //  kilosax =kilosax.toFixed(3);

                subtotalax = kilosax * preciokgx;
              //  subtotalax = subtotalax.toFixed(3);                



                //Kilos B
                kilosbx = parseFloat(altobx) * parseFloat(largobx) *  parseFloat(gramosx) * parseFloat(nosegmentosbx);
               // kilosbx =kilosbx.toFixed(3);

                subtotalbx = kilosbx * preciokgx;
             //   subtotalbx = subtotalbx.toFixed(3);                



                //Precio x Sets
                ranuradox = (parseFloat(nosegmentosax) + parseFloat(nosegmentosbx)) * 0.0026;
                subtotalax = parseFloat(subtotalax);
                subtotalbx = parseFloat(subtotalbx);
                sumasubtotal = subtotalax + subtotalbx;
                preciosetx = ( parseFloat(sumasubtotal) + parseFloat(ranuradox) ) * factorx;
                preciosetx = preciosetx.toFixed(3);

                totalxsetx = preciosetx * nosetsx;

                totalxsetx=totalxsetx.toFixed(3);
                */

                 /* 
                 //////// BUENO//////////

                kilosax = parseFloat(bobinax) * parseFloat(altoax) * parseFloat(gramosx) * parseFloat(nosegmentosax);
                kilosbx = parseFloat(bobinax) * parseFloat(altobx) * parseFloat(gramosx) * parseFloat(nosegmentosbx);


                subtotalax = kilosax * preciokgx;
                subtotalbx = kilosbx * preciokgx;

                ranuradox = (parseFloat(nosegmentosax) + parseFloat(nosegmentosbx)) * 0.0026;
                subtotalax = parseFloat(subtotalax);
                subtotalbx = parseFloat(subtotalbx);

                sumasubtotal = subtotalax + subtotalbx;
                preciosetalgoritmox = ( parseFloat(sumasubtotal) + parseFloat(ranuradox) ) * factorx;
                preciosetalgoritmox = preciosetalgoritmox.toFixed(3);



                totalx = preciosetalgoritmox * nosetsx;
                totalx=totalx.toFixed(3);


                 */
                piezasa= bobinax / largoax;
                piezasb= bobinax / largobx;
                piezasa = Math.floor(piezasa);
                piezasb = Math.floor(piezasb);

                nosetsx = parseFloat(nosetsx);
                kilosax = parseFloat(vbobina) * parseFloat(altoax) * parseFloat(gramosx) *  ((nosetsx * parseFloat(nosegmentosax))/piezasa);
                kilosbx = parseFloat(vbobina) * parseFloat(altobx) * parseFloat(gramosx) *  ((nosetsx * parseFloat(nosegmentosbx))/piezasb);

                totalkilos = kilosax + kilosbx;


                subtotalax = kilosax * preciokgx;
                subtotalbx = kilosbx * preciokgx;

                ranurado = 0.0026;

                 precioranuradox = (parseFloat(nosegmentosax) + parseFloat(nosegmentosbx)) * ranurado;
                subtotalax = parseFloat(subtotalax);
                subtotalbx = parseFloat(subtotalbx);

                sumasubtotal = subtotalax + subtotalbx;
                preciosetalgoritmox = ( (parseFloat(sumasubtotal) / nosetsx ) + parseFloat(precioranuradox) ) * factorx;
                preciosetalgoritmox = preciosetalgoritmox.toFixed(3);



                totalx = preciosetalgoritmox * nosetsx;
                totalx=totalx.toFixed(3);

                /////////////////////////////////////////////////
                /// desperdicio/////////////

                                        largopartesa = vbobina /largoax;
                                        largopartesa = parseInt(largopartesa);
                                        largopartesb = vbobina /largobx;
                                        largopartesb = parseInt(largopartesb);

                                        largodoblea = largoax * largopartesa;
                                        largodobleb = largobx * largopartesb;

                                        areapada = altoax * largodoblea;
                                        areapadb = altobx * largodobleb;

                                        areadesperdicioa = vbobina * altoax;
                                        areadesperdiciob = vbobina * altobx;

                                        areadesperdicio = areadesperdicioa + areadesperdiciob;



                                        desperdicioa = areadesperdicioa - areapada;

                                        desperdiciob = areadesperdiciob - areapadb;

                                        desperdicio = desperdicioa + desperdiciob;




                                        porcdespa = (desperdicioa * 100) / areadesperdicioa;

                                        porcdespreda = porcdespa.toFixed(3);

                                        porcdespb = (desperdiciob * 100) / areadesperdiciob;

                                        porcdespredb = porcdespb.toFixed(3);


                                        difaltoa = vbobina-altoax;
                                        difaltob = vbobina-altobx;

                                        diflargoa = vbobina-largoax;
                                        diflargob = vbobina-largobx;



                                        areadesperdicio = areadesperdicio.toFixed(3);

                                        desperdicio = desperdicio.toFixed(3); 

////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////


 /*  


                algoritmo2x = parseFloat(bobinax) * parseFloat(largox) * parseFloat(gramosx) * parseFloat(nopadsx);

               // alert("bobina--" + bobina + "alto--" + alto + "gramos--" + gramos + "pads--" + numeropads);

                kgalgoritmofac2x = algoritmo2x * preciokgx;

                subtotalalgoritmo2x = kgalgoritmofac2x * factorx;

                entero2x = bobinax / altox;

                entero2x = Math.floor(entero2x);

                totalnew2x =  subtotalalgoritmo2x / entero2x;

                totalnew2x = totalnew2x.toFixed(3);

               // alert(totalnew);



                unitario2x = totalnew2x / nopadsx;

                unitario2x = unitario2x.toFixed(3);


                //Asignacion
               // alert('kilos' + kilosx + 'subtotal' + kgalgoritmofacx + 'Total 1 :' + totalnewx + 'Total 2 : ' + totalnew2x);

*/
                $("#kga").val(kilosax);

                //$("#kgescondido").val(kilosx);                

                $("#subtotala").val(subtotalax);

                $("#kgb").val(kilosbx);

                //$("#kgescondido").val(kilosx);                

                $("#subtotalb").val(subtotalbx);

                $("#precioxset").val(preciosetalgoritmox);

                $("#utilidad").val(totalx);

                $("#totalkg").val(totalkilos);


/*
                $("#subtotalescondido").val(kgalgoritmofacx);

                $("#subtotall").val(kgalgoritmofac2x);

                $("#subtotalescondidol").val(kgalgoritmofac2x);


                $("#utilidadescondido").val(totalnewx);

                $("#utilidadl").val(totalnew2x);

                $("#utilidadescondidol").val(totalnew2x);

                $("#tipocalibreescondido").val(calibrex);

*/
            }



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
                vbobina = valorbobina;

              } 

              function mostrarclientes_pads(str)
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
            xmlhttp.open("GET","obtenercliente_pads.php?empresa="+str,true);
            xmlhttp.send();            
            }

             function mostrarclientenombre(str)
            {
              posicion=document.getElementById('cliente').options.selectedIndex; //posicion
              encelim = document.getElementById('cliente').options[posicion].text;
              
            if (str=="")
              {
              document.getElementById("insertarclientenombre").innerHTML="";
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
                document.getElementById("insertarclientenombre").innerHTML=xmlhttp.responseText;
                }
              }
            xmlhttp.open("GET","obtenerclientenombre_pads.php?sucursal="+str+"&empresa=" + encelim,true);
            xmlhttp.send();            
            }

            function mostrarclienteemail(str)
            {
              posicion=document.getElementById('cliente').options.selectedIndex; //posicion
              encelim = document.getElementById('cliente').options[posicion].text;

              posicions=document.getElementById('sucursal').options.selectedIndex; //posicion
              suc = document.getElementById('sucursal').options[posicions].text;
              
            if (str=="")
              {
              document.getElementById("insertarclienteemail").innerHTML="";
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
                document.getElementById("insertarclienteemail").innerHTML=xmlhttp.responseText;
                }
              }
            xmlhttp.open("GET","obtenerclienteemail_pads.php?nombre="+str+"&empresa=" + encelim+"&sucursal=" + suc,true);
            xmlhttp.send();            
            }

            function mostrarencargados(str)
            {
            if (str=="")
              {
              document.getElementById("insertarencargado").innerHTML="";
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
                document.getElementById("insertarencargado").innerHTML=xmlhttp.responseText;
                }
              }
            xmlhttp.open("GET","mostrar_encargado.php?e="+str,true);
            xmlhttp.send();            
            }


            function mostrarfolio()
            {


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
                document.getElementById("insertarfolio").innerHTML=xmlhttp.responseText;
                }
              }

            xmlhttp.open("GET","obtenerfolio_pads.php",true);
            xmlhttp.send();            
            } 
            mostrarfolio();


            function mostrararticulos(str)
            {
                eliminargramos();

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



            xmlhttp.open("GET","obteneralmacen_pads.php?q="+str,true);
            xmlhttp.send();            
            }


            function mostrarcalibre(str2)
            {
                eliminargramos();

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
            xmlhttp.open('GET','agrega_calibre_pads.php?w='+str2+"&valormaterial="+valormaterial,true);
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



            xmlhttp.open("GET","mostrar_articulo_pads.php?&m="+str3+"&valormaterial="+valormaterial+"&valorcalibre="+valorcalibre+"&valorbobina="+valorbobina,true);
            xmlhttp.send();            
            }            


        </script>
                </body>
            </html>