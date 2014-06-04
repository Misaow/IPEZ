<?php
include 'header.php';
?>
<div class="container maincontent">
    <div class="header-wrapper">
        <div class="row">
            <div class="col-md-12 nogutter smallvid">
                <div class="smallvid-title">
                    <h3> Le numéro 1 de la vente privée vous propose :</h3>
                </div>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 420px;margin-top: 1px;">
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
                <div class="row col-md-offset-1">
                    <a href="presentation.php" type="button" class="custum-btn btn btn-lg col-md-3"> Présentation</a>
                    <a href="highlight.php" type="button" class="custum-btn btn btn-lg col-md-3 col-md-offset-1"> Produits Phare</a>
                    <a href="newsletter.php" type="button" class="custum-btn btn btn-lg col-md-3 col-md-offset-1"> Newsletter</a> 
                </div>
            </div><!--column12-->
        </div><!--row-->

    </div><!--maincontent-->
</div>

<?php include 'footer.php'; ?>