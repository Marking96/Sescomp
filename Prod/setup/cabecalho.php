<?php

session_start();

require("configuracao.php");

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>

<meta charset="utf-8"/>
<meta name="author" content="UFC"/>
<meta Name="robots" content="index,follow">
<!-- Meta tags de SEO -->
<meta name="description" content="" />
<meta name="keywords" content="Ceará, Russas, UFC" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- ==============================================
Fonts
=============================================== -->
<link href='http://fonts.googleapis.com/css?family=Lato|Open+Sans:400,300' rel='stylesheet' type='text/css'>

<!-- ==============================================
Favicons e Apple Touch Icon
=============================================== -->
<!--
<link rel="shortcut icon" href="images/favicon.ico">
-->
<link rel="shortcut icon" href="<?php echo $urlBase; ?>images/fli.ico">

<link rel="apple-touch-icon" href="<?php echo $urlBase; ?>images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $urlBase; ?>images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $urlBase; ?>images/apple-touch-icon-114x114.png">

<!-- Facebook Open Graph Protocol -->
<meta property="og:image" content="valelivre.org/wp-content/images/fav.png" />


<!-- ==============================================
CSS
=============================================== -->
<link rel="stylesheet" href="<?php echo $urlBase; ?>css/bootstrap.min.css" /> <!-- Twitter Bootstrap -->
<link rel="stylesheet" href="<?php echo $urlBase; ?>css/bootstrap-responsive.min.css" /> <!-- Twitter Bootstrap Responsive -->
<link rel="stylesheet" href="<?php echo $urlBase; ?>css/font-awesome.min.css"> <!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo $urlBase; ?>css/flexslider.css"> <!-- Flexslider -->
<link rel="stylesheet" href="<?php echo $urlBase; ?>css/fancybox/jquery.fancybox.css"/> <!-- Fancybox -->
<link rel="stylesheet" href="<?php echo $urlBase; ?>css/style.css"> <!-- Main stylesheet -->
<link rel="stylesheet" href="<?php echo $urlBase; ?>css/style-responsive.css"> <!-- Main stylesheet responsive -->

<!--[if IE 7]>
  <link rel="stylesheet" href="css/font-awesome-ie7.min.css">
<![endif]-->


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="<?php echo $urlBase; ?>js/vendor/html5shiv.js"></script>
  <script src="<?php echo $urlBase; ?>js/vendor/respond.min.js"></script>
<![endif]-->
