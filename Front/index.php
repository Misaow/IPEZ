<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="description" />
        <meta name="keywords" content="keywords" />
        <meta name="author" content="IPEZ" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="app/content/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="app/content/css/custom.scss" />

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
                    <a class="navbar-brand" href="#"><img src="app/content/images/logo.png" height="100%" /></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Accueil</a></li>
                        <li><a href="#about">Présentation</a></li>
                        <li><a href="#contact">Produits Phares</a></li>
                        <li><a href="#contact">Newsletter</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <a href="#about">Connexion / Inscription</a>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>

        <div class="container">
            <div class="header-wrapper">

                <div class="row">
                    <div class="col-md-12 nogutter">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 420px;">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="app/content/images/Slideshow1.jpg" alt="...">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="app/content/images/Slideshow2.jpg" alt="...">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="app/content/images/Slideshow3.jpg" alt="...">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>


                </div>


            </div><!--Header Wrapper-->

            <div class="maincontent">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 smallvid">
                                <div class="smallvid-title">
                                    <h3>Smartphone</h3>
                                </div>
                                <div class="smallvid-player">
                                    <img width="100%" class="ex" src="app/content/images/smartphone.jpg"/>
                                </div>
                            </div>
                            <div class="col-md-4 smallvid">
                                <div class="smallvid-title">
                                    <h3>Television</h3>
                                </div>
                                <div class="smallvid-player">
                                    <img width="100%" class="ex" src="app/content/images/tv.jpg"/>
                                </div>
                            </div>
                            <div class="col-md-4 smallvid">
                                <div class="smallvid-title">
                                    <h3>Consoles</h3>
                                </div>
                                <div class="smallvid-player">
                                    <img width="100%" class="ex" src="app/content/images/GAME.jpg"/>
                                </div>
                            </div>
                        </div>
                    </div><!--column12-->
                </div><!--row-->

            </div><!--maincontent-->
        </div>



        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="app/content/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').tooltip('show');
                $('.carousel').carousel({interval: 2000});
            });
        </script>
    </body>
</html>
