
<?php  define("RUTA", "http://localhost/graficasistema");  ?>
<link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="<?php echo RUTA; ?>/css/bootstrap.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo RUTA; ?>/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="<?php echo RUTA; ?>/css/main.css">
        <link rel="stylesheet" href="<?php echo RUTA; ?>/css/icon.css" />

        <script src="<?php echo RUTA; ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>                 
        <script type="text/javascript" src="<?php echo RUTA; ?>/js/moment.min.js"></script>              
                
                <script type="text/javascript">
                $(document).ready(function() {                     

                fecha = moment().format('MMMM Do YYYY, h:mm:ss a');
                $("#fecha").val(fecha);
                $("#fechaescondido").val(fecha);
                });

                </script>





                
               
                
               
                
                