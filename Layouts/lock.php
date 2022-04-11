<?php use Core\Flash\Flash;?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KGB | Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
	
    <link href="<?php echo assets('/ressources/css/style.css');?>"  rel="stylesheet">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
	<link href="<?php echo assets('/style.css');?>"  rel="stylesheet">


</head>
<body class="h-100 color-scheme-6">   
    <?php echo $content;?>
 <!-- Required bases -->
 <script src="<?php echo assets('/ressources/base/global/global.min.js' );?>"></script>
    <script src="<?php echo assets('/ressources/js/custom.min.js' );?>"></script>
	<script src="<?php echo assets('/ressources/js/deznav-init.js' );?>"></script>
	<script src="<?php echo assets('/ressources/base/sweetalert2/dist/sweetalert2.min.js' );?>"></script>


</body>

</html>