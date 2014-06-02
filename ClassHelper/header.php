<?php
session_start();
define( 'ROOT', dirname( __DIR__ ) );
include ROOT.DIRECTORY_SEPARATOR.'/app'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'defines.php';
include APP . DS . 'Autoloader.php';

\app\core\Install::configExists();

if(isset($_GET['session']) && $_GET['session']=='destroy') {
    session_unset();
    session_destroy();
    header("location:".WEBROOT."/admin/login.php");
    exit();
}
$login = isset($_SESSION["login"]) ? '<span id="user">'.$_SESSION["login"].'</span> <a id="logout" href="?session=destroy">(Se déconnecter)</a>' : '<span id="user">Utilisateur</span>';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo WEBROOT?>/favicon.ico">

    <title>IP Motors - Administration</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo WEBROOT?>/public_html/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo WEBROOT?>/public_html/css/custom.css" rel="stylesheet">
    <link href="<?php echo WEBROOT?>/public_html/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo WEBROOT?>/public_html/css/bootstrap-select.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="admin-section">
    <!-- Header -->
    <header id="admin-mini">
      <div class="col-sm-5"><a href="<?php echo WEBROOT?>/admin/index.php"><img src="<?php echo WEBROOT?>/public_html/images/logo_mini.png" alt="logo"></a></div>
      <div class="col-sm-7"><p id="slogan">Bonjour <?php echo $login; ?></p></div>
    </header>
        <div class="container">
        <?php include ROOT.DIRECTORY_SEPARATOR.'/admin'.DIRECTORY_SEPARATOR.'main_menu.php'; ?>
           