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

                <title>Sistema de Cotizaciones | PADS</title>

                <meta name="description" content="">

                <meta name="viewport" content="width=device-width">



             <?php include '../encabezado.php'; ?>

            <script>

            function valores(){

                materialx = $('#materialalmacen').val();
                calibrex = $('#calibrealmacen').val();
                bobinax = $('#bobinaalmacen').val();
                gramosx = $('#gramosalmacen').val();
                preciokgx = $('#preciokgalmacen').val();
                factorx = $('#factoru').val();
                nopadsx = $('#nopads').val();
                largox = $('#largo').val();
                altox = $('#alto').val();

              // alert(materialx + '-' + calibrex +'-' + bobinax +'-' +gramosx +'-' + preciokgx+'-' + factorx +'-' + nopadsx+'-' + largox+'-' + altox);

            }

            function calcular(){

              // ------ Operaciones ------------              

              

                kilosx = parseFloat(nopadsx) * parseFloat(altox) * parseFloat(largox) *  parseFloat(gramosx);

                subtotalx = kilosx * preciokgx;                

                totalx = subtotalx * factorx;

                totalx=totalx.toFixed(3);

                

                algoritmox = parseFloat(bobinax) * parseFloat(altox) * parseFloat(gramosx) * parseFloat(nopadsx);

               // alert("bobina--" + bobina + "alto--" + alto + "gramos--" + gramos + "pads--" + numeropads);

                kgalgoritmofacx = algoritmox * preciokgx;

                subtotalalgoritmox = kgalgoritmofacx * factorx;

                enterox = bobinax / largox;

                enterox = Math.floor(enterox);

                totalnewx =  subtotalalgoritmox / enterox;

                totalnewx = totalnewx.toFixed(3);

               // alert(totalnew);



                unitariox = totalnewx / nopadsx;

                unitariox = unitariox.toFixed(3);





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


                $("#kg").val(kilosx);

                $("#kgescondido").val(kilosx);                

                $("#subtotal").val(kgalgoritmofacx);

                $("#subtotalescondido").val(kgalgoritmofacx);

                $("#subtotall").val(kgalgoritmofac2x);

                $("#subtotalescondidol").val(kgalgoritmofac2x);

                $("#utilidad").val(totalnewx);

                $("#utilidadescondido").val(totalnewx);

                $("#utilidadl").val(totalnew2x);

                $("#utilidadescondidol").val(totalnew2x);

                $("#tipocalibreescondido").val(calibrex);


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
            xmlhttp.open("GET","obtenercliente_pads.php?q="+str,true);
            xmlhttp.send();            
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



            xmlhttp.open("GET","obteneralmacen_pads.php?q="+str,true);
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

        <script type="text/javascript">

                  arreglopads = new Array();

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

                                            objetoseleccionado = arreglopads[p];

                                            casilla = seleccionado[x];

                                            

                                           $('#tablaagregados > tbody:last').append('<tr><td><input class="seleccionados"  type="checkbox" name="listado[]" value="' + casilla.value +' " checked></td><td>'+ objetoseleccionado.cantidad +'</td><td>'+ objetoseleccionado.desperdicio + '%' + '</td><td>'+ objetoseleccionado.bobina +'</td><td>'+ objetoseleccionado.material +'</td><td>'+ objetoseleccionado.calibre +'</td><td>'+ objetoseleccionado.largo +'</td><td>'+ objetoseleccionado.alto +'</td><td class="resaltado">'+ objetoseleccionado.unitario +'</td><td class="resaltado">'+ objetoseleccionado.total +'</td><td>');                                                                                                                       

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

                        //vaciar arreglopads

                       /* tamarreglopads = arreglopads.length;

                        for(var i = 0; i < tamarreglopads; i++) {

                            arreglopads.pop();   

                        }*/

                        

                        x=0;

                        y=0;

                        verchecks = 0;





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

                        



                         function optimolargo(cantidad,desperdicio,bobina,material,calibre,largo, alto, numeropads, unitario, total)

                            {

                            this.cantidad=cantidad;

                            this.desperdicio=desperdicio;

                            this.bobina=bobina;

                            this.material=material;

                            this.calibre = calibre;

                            this.largo = largo;

                            this.alto = alto;

                            this.numeropads = numeropads;

                            this.unitario = unitario;

                            this.total = total;

                            }



                            function optimoalto(cantidad,desperdicio,bobina,material,calibre,largo, alto, numeropads, unitario, total)

                            {

                            this.cantidad=cantidad;

                            this.desperdicio=desperdicio;

                            this.bobina=bobina;

                            this.material=material;

                            this.calibre = calibre;

                            this.largo = largo;

                            this.alto = alto;

                            this.numeropads = numeropads;

                            this.unitario = unitario;

                            this.total = total;

                            }









                            if (1==0){

                                

                                alert("El largo y ancho es demasiado para la bobina");



                            } else {

                                







                                //Numero de elementos del option bobina 

                               // idSelect =material + "-" + tipocalibre;
                                idSelect = "bobinaalmacen";

                                 nobobina = document.getElementById(idSelect).length;

                                

                                //lista = new array();

                                    if (nobobina == 1){

                                        alert("No hay bobinas disponibles");



                                     }else{

                                      



                                        if ( (nopadsx == "") || (largox == "") || (altox == "") || (nopadsx == 0) || (largox == 0) || (altox == 0) ){



                                            alert("No pueden estar vacios o con ceros los campos");



                                        }else{





                                            //Recorremos el option 2 veces por todos los elementos

                                                //for (var i = 0; i < nobobina; i++) {

                                                    

                                                    $("#"+ idSelect).find('option').each(function()

                                                        {
                                                          

                                                            





                                                           

                                                            objetol = new optimolargo();

                                                            objetoa = new optimoalto();



                                                            vbobina = $(this).val(); 

                                                            padlargo = 1;

                                                            padalto = 1;

                                                            areapad = altox * largox;

                                                            areadesperdicio = vbobina * altox;

                                                            areadesperdicioalto = vbobina * largox;



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

                                                           



                                                            difalto = vbobina-altox;

                                                            diflargo = vbobina-largox;



                                                           areapad = areapad.toFixed(3);

                                                           areadesperdicio = areadesperdicio.toFixed(3);

                                                           areadesperdicioalto = areadesperdicioalto.toFixed(3);

                                                           desperdicio = desperdicio.toFixed(3);

                                                           desperdicioalto = desperdicioalto.toFixed(3);



                                                           algoritmo = parseFloat(vbobina) * parseFloat(altox) * parseFloat(gramosx) * parseFloat(nopadsx);

                                                           // alert("bobina--" + bobina + "alto--" + alto + "gramos--" + gramos + "pads--" + numeropads);

                                                            kgalgoritmofac = algoritmo * preciokgx;

                                                            subtotalalgoritmo = kgalgoritmofac * factorx;

                                                            entero = vbobina / largox;

                                                            entero = Math.floor(entero);

                                                            totalnew =  subtotalalgoritmo / entero;

                                                            totalnew = totalnew.toFixed(3);

                                                           // alert(totalnew);



                                                            unitario = totalnew / nopadsx;

                                                            unitario = unitario.toFixed(3);



                                                            algoritmo2 = parseFloat(vbobina) * parseFloat(largox) * parseFloat(gramosx) * parseFloat(nopadsx);

                                                           // alert("bobina--" + bobina + "alto--" + alto + "gramos--" + gramos + "pads--" + numeropads);

                                                            kgalgoritmofac2 = algoritmo2 * preciokgx;

                                                            subtotalalgoritmo2 = kgalgoritmofac2 * factorx;

                                                            entero2 = vbobina / altox;

                                                            entero2 = Math.floor(entero2);

                                                            totalnew2 =  subtotalalgoritmo2 / entero2;

                                                            totalnew2 = totalnew2.toFixed(3);

                                                           // alert(totalnew);



                                                            unitario2 = totalnew2 / nopadsx;

                                                            unitario2 = unitario2.toFixed(3);









                                                             



                                                              //  alert(totalnew + '---' + totalnew2 + '---' + vbobina);







                                                           if ((diflargo > 0) || (difalto > 0) ){                                                            

                                                            objetol.desperdicio = 110;

                                                            objetoa.desperdicio = 110;

                                                            

                                                           }

















                                                            if (  diflargo < 0 ){



                                                            } else{



                                                                if (porcdespred >= 50){



                                                                    largopartes = vbobina / largox;

                                                                    largopartes = parseInt(largopartes);



                                                                    largodoble = largox * largopartes;

                                                                    areapaddoble= altox * largodoble;

                                                                    areadesperdiciodoble = vbobina * altox;

                                                                    desperdiciodoble = areadesperdiciodoble - areapaddoble;

                                                                    areadesperdiciodoble = areadesperdiciodoble.toFixed(3);

                                                                    padlargo=largopartes;



                                                                    porcdespdoble = (desperdiciodoble * 100) / areadesperdiciodoble;

                                                                    porcdespreddoble = porcdespdoble.toFixed(3);



                                                                    areapaddoble = areapaddoble.toFixed(3);                                                                   

                                                                    desperdiciodoble = desperdiciodoble.toFixed(3);



                                                                    

                                                            algoritmo = parseFloat(vbobina) * parseFloat(altox) * parseFloat(gramosx) * parseFloat(nopadsx);

                                                           // alert("bobina--" + bobina + "alto--" + alto + "gramos--" + gramos + "pads--" + numeropads);

                                                            kgalgoritmofac = algoritmo * preciokgx;

                                                            subtotalalgoritmo = kgalgoritmofac * factorx;

                                                            entero = vbobina / largox;

                                                            entero = Math.floor(entero);

                                                            totalnew =  subtotalalgoritmo / entero;

                                                            totalnew = totalnew.toFixed(3);

                                                           // alert(totalnew);



                                                            unitario = totalnew / nopadsx;

                                                            unitario = unitario.toFixed(3);

                                                                    

                                                                    objetol.cantidad = padlargo; 

                                                                    objetol.desperdicio = porcdespreddoble;



                                                                    objetol.bobina=vbobina;

                                                                    objetol.material=materialx;

                                                                    objetol.calibre = calibrex;

                                                                    objetol.largo = largox;

                                                                    objetol.alto = altox;

                                                                    objetol.numeropads = nopadsx;

                                                                    objetol.unitario = unitario;

                                                                    objetol.total = totalnew;

                                                                    //alert(objetol.desperdicio + '--' + vbobina + '--' + objetol.total);





                                                                     //$('#tabla > tbody:last').append('<tr><td><input type="checkbox" name="listado[]"  value="'+numeropads + '-   -' + largo + '-   -' + alto + '-   -'  + material + '-   -' + tipocalibre + '-   -'  +unitario + '-   -' + total +'"><td>'+ padlargo +'</td></td><td>'+ porcdespreddoble + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largo +'</td><td>'+ alto +'</td><td class="resaltado">'+ unitario +'</td><td class="resaltado">'+ total +'</td><td>Largo</td><td>');







                                                                }else{

                                                                    

                                                                    objetol.cantidad = padlargo; 

                                                                    objetol.desperdicio = porcdespred;



                                                                    objetol.bobina= vbobina;

                                                                    objetol.material=materialx;

                                                                    objetol.calibre = calibrex;

                                                                    objetol.largo = largox;

                                                                    objetol.alto = altox;

                                                                    objetol.numeropads = nopadsx;

                                                                    objetol.unitario = unitario;

                                                                    objetol.total = totalnew;

                                                                   // alert(objetol.desperdicio + '--' + vbobina + '--' + objetol.total);

                                                                    //$('#tabla > tbody:last').append('<tr><td><input type="checkbox" name="listado[]"  value="'+numeropads + '-   -' + largo + '-   -' + alto + '-   -'  + material + '-   -' + tipocalibre + '-   -' +unitario + '-   -' + total +'"><td>'+ padlargo +'</td></td><td>'+ porcdespred + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largo +'</td><td>'+ alto +'</td><td class="resaltado">'+ unitario +'</td><td class="resaltado">'+ total +'</td><td>Largo</td><td>');

                                                                }



                                                                

                                                               

                                                            }



                                                            



                                                            if ( difalto < 0 ){



                                                            } else{

                                                                

                                                                





                                                                if (porcdespred2 >= 50){



                                                                    altopartes = vbobina / altox;

                                                                    altopartes = parseInt(altopartes);

                                                                    altodoble = altox * altopartes;

                                                                    areapaddb= altodoble * largox;

                                                            

                                                                    areadesperdicioaltodb = vbobina * largox;

                                                                    padalto=altopartes;



                                                                    desperdicioaltodb = areadesperdicioaltodb - areapaddb;                                                         



                                                                    porcdesp2db = (desperdicioaltodb * 100) / areadesperdicioaltodb;

                                                                    porcdespred2db = porcdesp2db.toFixed(3);



                                                                    areapaddb = areapaddb.toFixed(3);

                                                                    areadesperdicioaltodb = areadesperdicioaltodb.toFixed(3);

                                                                    desperdicioaltodb = desperdicioaltodb.toFixed(3);



                                                            algoritmo2 = parseFloat(vbobina) * parseFloat(largox) * parseFloat(gramosx) * parseFloat(nopadsx);

                                                           // alert("bobina--" + bobina + "alto--" + alto + "gramos--" + gramos + "pads--" + numeropads);

                                                            kgalgoritmofac2 = algoritmo2 * preciokgx;

                                                            subtotalalgoritmo2 = kgalgoritmofac2 * factorx;

                                                            entero2 = vbobina / altox;

                                                            entero2 = Math.floor(entero2);

                                                            totalnew2 =  subtotalalgoritmo2 / entero2;

                                                            totalnew2 = totalnew2.toFixed(3);

                                                           // alert(totalnew);



                                                            unitario2 = totalnew2 / nopadsx;

                                                            unitario2 = unitario2.toFixed(3);



                                                                objetoa.cantidad = padalto;

                                                                objetoa.desperdicio = porcdespred2db;

                                                                objetoa.bobina=vbobina;

                                                                objetoa.material=materialx;

                                                                objetoa.calibre = calibrex;

                                                                objetoa.largo = largox;

                                                                objetoa.alto = altox;

                                                                objetoa.numeropads = nopadsx;

                                                                objetoa.unitario = unitario2;

                                                                objetoa.total = totalnew2;

                                                               // alert(objetoa.desperdicio + '--' + vbobina + '--' + objetoa.total);

                                                                   //  $('#tabla > tbody:last').append('<tr><td><input type="checkbox" name="listado[]" value="'+ numeropads + '-   -' +  largo + '-   -' + alto + '-   -' + material + '-   -' + tipocalibre + '-   -'  + unitario + '-   -' + total  +'"></td><td>'+ padalto +'</td><td>'+ porcdespred2db + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largo +'</td><td>'+ alto +'</td><td class="resaltado">'+ unitario +'</td><td class="resaltado">'+ total +'</td><td>Alto</td><td>');







                                                                }else{



                                                                objetoa.cantidad = padalto;

                                                                objetoa.desperdicio = porcdespred2;

                                                                objetoa.bobina=vbobina;

                                                                objetoa.material=materialx;

                                                                objetoa.calibre = calibrex;

                                                                objetoa.largo = largox;

                                                                objetoa.alto = altox;

                                                                objetoa.numeropads = nopadsx;

                                                                objetoa.unitario = unitario2;

                                                                objetoa.total = totalnew2;

                                                                //alert(objetoa.desperdicio + '--' + vbobina + '--' + objetoa.total);



                                                                  //  $('#tabla > tbody:last').append('<tr><td><input type="checkbox" name="listado[]" value="'+ numeropads + '-   -' +  largo + '-   -' + alto + '-   -' + material + '-   -' + tipocalibre + '-   -'  + unitario + '-   -' + total  +'"></td><td>'+ padalto +'</td><td>'+ porcdespred2 + '%' + '</td><td>'+ vbobina +'</td><td>'+ material +'</td><td>'+ tipocalibre +'</td><td>'+ largo +'</td><td>'+ alto +'</td><td class="resaltado">'+ unitario +'</td><td class="resaltado">'+ total +'</td><td>Alto</td><td>');

                                                                }





                                                                

                                                               

                                                            }



                                                            cl = parseFloat(objetol.desperdicio);

                                                            ca = parseFloat(objetoa.desperdicio);

                                                            cln=  isNaN(cl);

                                                            can =  isNaN(ca); 

                                                           

                                                           /*if ( cl > ca){

                                                            alert("x");

                                                            arreglopads[indicecheck] = objetoa;

                                                            alert("a");



                                                           }*/



                                                           finito = isFinite(totalnew);

                                                           finito2 = isFinite(totalnew2);



                                                           //alert(finito + '----' + finito2 + '----' + cl + '----' + ca);





                                                    if( (objetol.numeropads<=0) || (objetoa.numeropads<=0) ) { } else{



                                                    if ( cln && can ) { } else{



                                                        

 

                                                           if ((cl > ca) && ((finito == true) || (finito2 == true) ) ){

                                                            arreglopads[indicecheck] = objetoa;

                                                            indicecheck= indicecheck + 1;

                                                            $('#tabla > tbody:last').append('<tr><td><input class="campo" type="checkbox" name="listado[]" value="'+ objetoa.numeropads + '-   -' +  objetoa.largo + '-   -' + objetoa.alto + '-   -' + objetoa.material + '-   -' + objetoa.calibre + '-   -'  + objetoa.unitario + '-   -' + objetoa.total +'"></td><td>'+ objetoa.cantidad +'</td><td>'+ objetoa.desperdicio + '%' + '</td><td>'+ objetoa.bobina +'</td><td>'+ objetoa.material +'</td><td>'+ objetoa.calibre +'</td><td>'+ objetoa.largo +'</td><td>'+ objetoa.alto +'</td><td class="resaltado">'+ objetoa.unitario +'</td><td class="resaltado">'+ objetoa.total +'</td><td>');                                                                                                                      

                                                          //  alert("a");



                                                           }





                                                           if ((cl < ca ) && ((finito == true) || (finito2 == true) ) ){

                                                            arreglopads[indicecheck] = objetol;

                                                            indicecheck= indicecheck + 1;

                                                            $('#tabla > tbody:last').append('<tr><td><input class="campo"  type="checkbox" name="listado[]" value="'+ objetol.numeropads + '-   -' +  objetol.largo + '-   -' + objetol.alto + '-   -' + objetol.material + '-   -' + objetol.calibre + '-   -'  + objetol.unitario + '-   -' + objetol.total  +'"></td><td>'+ objetol.cantidad +'</td><td>'+ objetol.desperdicio + '%' + '</td><td>'+ objetol.bobina +'</td><td>'+ objetol.material +'</td><td>'+ objetol.calibre +'</td><td>'+ objetol.largo +'</td><td>'+ objetol.alto +'</td><td class="resaltado">'+ objetol.unitario +'</td><td class="resaltado">'+ objetol.total +'</td><td>');                                                                                                                      

                                                           // alert("l");



                                                           }



                                                           if (cl == ca){

                                                            

                                                                if ((objetol.cantidad > objetoa.cantidad ) && ((finito == true) || (finito2 == true) ) ){

                                                                    arreglopads[indicecheck] = objetol;

                                                                    $('#tabla > tbody:last').append('<tr><td><input class="campo"  type="checkbox" name="listado[]" value="'+ objetol.numeropads + '-   -' +  objetol.largo + '-   -' + objetol.alto + '-   -' + objetol.material + '-   -' + objetol.calibre + '-   -'  + objetol.unitario + '-   -' + objetol.total  +'"></td><td>'+ objetol.cantidad +'</td><td>'+ objetol.desperdicio + '%' + '</td><td>'+ objetol.bobina +'</td><td>'+ objetol.material +'</td><td>'+ objetol.calibre +'</td><td>'+ objetol.largo +'</td><td>'+ objetol.alto +'</td><td class="resaltado">'+ objetol.unitario +'</td><td class="resaltado">'+ objetol.total +'</td><td>');                                                                                                                      

                                                                    indicecheck= indicecheck + 1;

                                                                  //  alert("=l");

                                                                }



                                                                if ((objetol.cantidad < objetoa.cantidad) && ((finito == true) || (finito2 == true) ) ){

                                                                    arreglopads[indicecheck] = objetoa;

                                                                    $('#tabla > tbody:last').append('<tr><td><input class="campo"  type="checkbox" name="listado[]" value="'+ objetoa.numeropads + '-   -' +  objetoa.largo + '-   -' + objetoa.alto + '-   -' + objetoa.material + '-   -' + objetoa.calibre + '-   -'  + objetoa.unitario + '-   -' + objetoa.total +'"></td><td>'+ objetoa.cantidad +'</td><td>'+ objetoa.desperdicio + '%' + '</td><td>'+ objetoa.bobina +'</td><td>'+ objetoa.material +'</td><td>'+ objetoa.calibre +'</td><td>'+ objetoa.largo +'</td><td>'+ objetoa.alto +'</td><td class="resaltado">'+ objetoa.unitario +'</td><td class="resaltado">'+ objetoa.total +'</td><td>');                                                                                                                      

                                                                    indicecheck= indicecheck + 1;

                                                                   // alert("=a");

                                                                }



                                                                if ((objetol.cantidad == objetoa.cantidad) && ((finito == true) || (finito2 == true) ) ){

                                                                    arreglopads[indicecheck] = objetol;

                                                                    $('#tabla > tbody:last').append('<tr><td><input class="campo"  type="checkbox" name="listado[]" value="'+ objetol.numeropads + '-   -' +  objetol.largo + '-   -' + objetol.alto + '-   -' + objetol.material + '-   -' + objetol.calibre + '-   -'  + objetol.unitario + '-   -' + objetol.total  +'"></td><td>'+ objetol.cantidad +'</td><td>'+ objetol.desperdicio + '%' + '</td><td>'+ objetol.bobina +'</td><td>'+ objetol.material +'</td><td>'+ objetol.calibre +'</td><td>'+ objetol.largo +'</td><td>'+ objetol.alto +'</td><td class="resaltado">'+ objetol.unitario +'</td><td class="resaltado">'+ objetol.total +'</td><td>');                                                                                                                      

                                                                    indicecheck= indicecheck + 1;

                                                                  //  alert("==");

                                                                }

                                                            



                                                           }



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

        </script>

            </head>

            <body onLoad="setInterval('actualizar()',400)">

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

                                    <li class="active"><a href="pads.php">PADS</a></li>

                                    <li><a href="particiones.php">Particiones</a></li>

                                    <?php

                    if( $_SESSION["nivel"] == "AD" ){

                         ?>                                                                

                                    <li class="dropdown">

                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrador <b class="caret"></b></a>

                                        <ul class="dropdown-menu">

                                           <li><a href="#">Clientes</a></li>

        		                            <li><a href="../cotizaciones/archivos.php">Cotizaciones</a></li>

        		                            <li><a href="#">Almacen</a></li>		                            

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

        			if( ($_SESSION["nivel"] == "AD")  || ($_SESSION["nivel"] == "UN") ){

        				 ?>



                         <?php 

                                    if (isset($_GET["exito"]) AND $_GET["exito"] == 1) { 

                                          echo "<h2 class=\"alert alert-success\">Cotizacion Enviada!</h2>";

                                        } 



                                ?>



        			<br>
                    <div class="icon" aria-hidden="true" data-icon="">    Cotizacion de PADS</div>                                                                   
                    <br><br>



        			<?php echo" <form name='formulario' action='../procesos/crea_pads.php' method='POST' >"; ?>   



                        <label>Fecha</label>            

                                <input id="fecha" type="text" name="fecha" disabled /> 

                                <input id="fechaescondido" type="hidden" name="fechaescondido" />

                                

                                 



                        <label style="margin-left:2%">Folio #</label>            

                                <input id="folio" type="text" name="folio" value="12345" required /><br/> 





                        

                        <div class="items_pad1">                    

                                

                                                                        

                                <label># de parte</label> <br/>            

                                <input id="noparte" type="text" name="noparte" value="1" required /> <br/>                                                                

                                                      

                                <label>Cliente</label>  <br/>   
                                <label for="empresaeditar">Empresa</label><br>
                            <select id="cliente" name="cliente" onchange="mostrarclientes_pads(this.value)"><option  value=""  required> --Escoje una Empresa-- </option>
                                <?php 
                                    $query = sprintf("SELECT empresa FROM clientes where 1 ORDER BY empresa ASC ");
                                    $result=mysql_query($query,$link) or die(mysql_error()); 
                                    while($row=mysql_fetch_array($result,MYSQLI_NUM)){
                                    echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";
                                        }
                                ?>
                            </select> 

                              <div id="insertarcliente"></div>       

                                <input id="clienteagregar" type="hidden" name="clienteagregar"  /> <br/>                                                                                                                                      



                                 <input id="grescondido" type="hidden" name="grescondido" />    

                                 



                                <label>Sub-Total x Alto</label> <br/>

                                <input id="subtotal" type="text" name="subtotal" disabled /> <br/>



                                <input id="subtotalescondido" type="hidden" name="subtotalescondido"  /> 



                                <label>Sub-Total x Largo</label> <br/>

                                <input id="subtotall" type="text" name="subtotal" disabled /> <br/>



                                <input id="subtotalescondidol" type="hidden" name="subtotalescondido"  /> <br/>

                                

                                        

                        </div>     



                        <div class="items_pad1">



                            <label># de PADS</label> <br/>              

            				    <input id="nopads" type="text" name="nopads" autocomplete="off" required /><br/>



            				<label>Largo</label> <br/>

                                <input id="largo" type="text" name="largo" autocomplete="off" required /><br/>



                            <label>Alto</label>	<br/>

            				    <input id="alto" type="text" name="alto" autocomplete="off" required /><br/>



                           



                                 <input id="preciokgescondido" type="hidden" name="preciokgescondido" />



                            

                             <input id="factoru" type="hidden" name="factoru" value="2" /> 



                              <label>Kilos</label><br/> 

                             <input id="kg" type="text" name="kg" disabled /><br/>

                             <input id="kgescondido" type="hidden" name="kgescondido" />

                                

                            <label>Total por Alto</label> <br/>

                             <input id="utilidad" type="text" name="utilidad" disabled /><br/>



                             <input id="utilidadescondido" type="hidden" name="utilidadescondido" />



                             <label>Total por Largo</label> <br/>

                             <input id="utilidadl" type="text" name="utilidadl" disabled /><br/>



                             <input id="utilidadescondidol" type="hidden" name="utilidadescondidol" />

            				

                        </div>





                        <div class="items_pad2">


<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->

                            <input id="bobinaescondido" type="hidden"  name="bobinaescondido" />

                           <!--  <form name="importararticulos" action="mostrar_articulo.php" method="GET"> -->
                           
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

<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
<!--  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->



                        </div>



                        <div class="clearitem"></div>



                    <!--    <div id="test">asd</div> -->

                        



        			
                    <br><br>
                    <input id="btncotizar" type="button" name="btncotizar" value="Cotizar" onclick="calcularDesperdicio()" />

                   <!--  <div id="tablapad"></div> -->

                    <table id="tabla" border="0" cellpadding="10" align="center" style="text-align:center;">

                        <h1>Opciones</h1>

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

                            </tr>

                        </thead>



                        <tbody id="tablaelementos">

                            <tr>

                                                       

                            </tr>

                        </tbody>

                        

                    </table>
                    <br>
                    
                   

                     <table id="tablaagregados" border="0" cellpadding="10" align="center" style="text-align:center;">

                        <h1>Seleccionados</h1>

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

                            </tr>

                        </thead>



                        <tbody>

                            <tr>

                                                       

                            </tr>

                        </tbody>

                        

                    </table>







                    
                      <br>
                    <input id="btnagregar" type="button" name="btnagregar" value="Agregar Cotizacion" onclick="anadiroptimos()" />

                     <br>

                    <input id="btnenviar" type="submit" name="btnenviar" value="Enviar Cotizacion"  />

                    



                <!-- Codigo de seleccion de Material con Calibre-->

                    <script type="text/javascript">

              

                        $(document).ready(function() {                        
                          
                          document.getElementById("btnenviar").style.display="none";

                          indicecheck = 0;   

                        });

                        function actualizar(){

                                valores();
                                calcular();
                        }


                          //  $("input").focus(function () {

                                



                             // }).focus();

                    </script>





            





             <?php echo"</form>"; ?>    



            



        	<?php } 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            else {

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

                    //Implement you own means of displaying error messbobinas to the user here.

                    password1.focus();

                }

            }, false);

        </script>

            </body>

        </html>