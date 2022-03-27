<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS
++++++++++++++++++++++++++++++++++++++ -->

<link rel="stylesheet" href=<?php echo assets("/assets/css/switcher.css"); ?> />
<link rel="stylesheet" href=<?php echo assets("/assets/css/bootstrap.min.css");?> />
<link rel="stylesheet" href=<?php echo assets("/assets/css/owl.carousel.min.css");?> />
<link rel="stylesheet" href=<?php echo assets("/assets/css/animate.min.css");?> />
<link rel="stylesheet" href=<?php echo assets("/assets/css/swipebox.min.css");?> />
<link rel="stylesheet" href=<?php echo assets("/assets/style.css");?> />
</head>
<body>
<?php include_once('Navigation.php'); ?>	

<?php echo $content; ?>

<?php include_once("Footer.php"); ?>