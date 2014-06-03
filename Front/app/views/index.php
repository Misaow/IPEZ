<?php
    include 'header.php';
?>


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
                                    <img src="<?php echo IMG_DIRECTORY ?>/Slideshow1.jpg" alt="...">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="<?php echo IMG_DIRECTORY ?>/Slideshow2.jpg" alt="...">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="<?php echo IMG_DIRECTORY ?>/Slideshow3.jpg" alt="...">
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
                                    <img width="100%" class="ex" src="<?php echo IMG_DIRECTORY ?>/smartphone.jpg"/>
                                </div>
                            </div>
                            <div class="col-md-4 smallvid">
                                <div class="smallvid-title">
                                    <h3>Television</h3>
                                </div>
                                <div class="smallvid-player">
                                    <img width="100%" class="ex" src="<?php echo IMG_DIRECTORY ?>/tv.jpg"/>
                                </div>
                            </div>
                            <div class="col-md-4 smallvid">
                                <div class="smallvid-title">
                                    <h3>Consoles</h3>
                                </div>
                                <div class="smallvid-player">
                                    <img width="100%" class="ex" src="<?php echo IMG_DIRECTORY ?>/GAME.jpg"/>
                                </div>
                            </div>
                        </div>
                    </div><!--column12-->
                </div><!--row-->

            </div><!--maincontent-->
        </div>



        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_DIRECTORY ?>/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').tooltip('show');
                $('.carousel').carousel({interval: 10000});
            });
        </script>
    </body>
</html>
