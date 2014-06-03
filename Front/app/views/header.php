<?php
define( 'ROOT', dirname(dirname( __DIR__ )) );
include ROOT.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'defines.php';
include '../Autoloader.php';
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="description" />
        <meta name="keywords" content="keywords" />
        <meta name="author" content="IPEZ" />
        <link rel="shortcut icon" href="<?php echo IMG_DIRECTORY ?>/favicon.ico">
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_DIRECTORY ?>/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_DIRECTORY ?>/custom.scss" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_DIRECTORY ?>/highlight.css"/>
    </head>
    <body>

        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="<?php echo IMG_DIRECTORY ?>/logo.png" height="100%" /></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Accueil</a></li>
                        <li><a href="presentation.php">Présentation</a></li>
                        <li><a href="highlight.php">Produits Phares</a></li>
                        <li><a href="newsletter.php">Newsletter</a></li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <a href="connexion.php">Connexion / Inscription</a>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        