<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Myriam Penna Psicolog&iacute;a Infantil</title>
        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <!-- CUSTOM CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">

        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?= base_url('assets/css/summernote-bs4.min.css') ?>">

        <!-- CALENDAR CSS-->
        <link href='<?= base_url('assets/css/fullcalendar.css') ?>' rel='stylesheet' />

    </head>
    <body>
        
        <!-- CUERPO -->
        <?= $cuerpo ?>

        <!-- BOOTSTRAP SCRIPTS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <!-- CALENDAR SCRIPTS-->
        <script src='<?= base_url('assets/js/moment.min.js') ?>'></script>
        <script src='<?= base_url('assets/js/fullcalendar.min.js') ?>'></script>
        <script src='<?= base_url('assets/js/locales/es.js') ?>'></script>

        <!-- SUMMER NOTE -->
        <script src="<?= base_url('assets/js/summernote-bs4.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/summernote-es-ES.min.js') ?>"></script>

        <!-- Mis Funciones JS -->
	    <script src="<?= base_url('assets/js/misFunciones.js') ?>"></script>

        <!-- MENSAJE DE ALERTA SI LO UBIESE -->
        <?= $mensaje ?>
        <!-- SCRIPT FUNCION CALENDARIO -->
        <?= $calenjs ?>

    </body>
</html>
