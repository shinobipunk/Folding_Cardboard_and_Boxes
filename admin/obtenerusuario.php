<?php
session_start();
$q = $_GET['q'];
include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();


 $query = sprintf("SELECT * FROM usuarios WHERE login = '".$q."'");
     $result=mysql_query($query,$link) or die(mysql_error()); 


$sesionlog = $_SESSION["login"];
while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
                            echo "<form name='editarusuario' action='../procesos/edita_usuarios.php' method='POST'>";
                            echo "<input type='hidden' name='idedit' size='30' maxlength='100' value='". $row[0] . "' />";
                            echo "Nombre de Usuario(nick):<br />";
                            echo "<input type='text' name='loginedit' size='30' maxlength='100' value='". $row[4] . "'  required />";
                            echo "<br /> Nombre:";
                            echo "<br />  ";                            
                            echo "<input type='text'name='nombreedit'size='30'maxlength='100' value='". $row[1] . "' required />";
                            echo "<br />";
                            echo "Apellido Paterno:";
                            echo "<br />";
                            echo "<input type='text'name='apaternoedit'size='30'maxlength='100' value='". $row[2] . "' required />";
                            echo "<br />Apellido Materno:";
                            echo "<br />";
                            echo "<input type='text'name='amaternoedit'size='30'maxlength='100' value='". $row[3] . "' required />";
                            echo "<br />E-mail:";
                            echo "<br />";
                            echo "<input type='email'name='emailedit'size='30'maxlength='100' value='". $row[6] . "' required />";
                            echo "<br />Nivel del Usuario:";
                            echo "<br />";
                            echo "<select name='niveledit'>";
                            echo "<option value='". $row[7] . "'>". $row[7] . "</option>";
                            echo "<option value='AD'>Administrador</option>";
                            echo "<option value='UN'>Usuario Normal</option>";
                            echo "<option value='ES'>Usuario Especial</option>";
                            echo "</select>";
                            echo "<input type='hidden' name='modificado' size='30' maxlength='100' value='". $sesionlog ."' required />";
                            echo "<br />";
                            echo "<br />";
                            echo "<input type='submit' name='crear'value='Editar Usuario'/>";
                            echo "</form>";                            
  }

?>