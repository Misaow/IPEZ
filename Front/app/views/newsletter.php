<?php
include 'header.php';
if (!empty($_GET['inscription'])) {
    include CONTROLLER_DIRECTORY . '/newsletter.php';
} else if (!empty($_GET['desabonner'])) {
    include CONTROLLER_DIRECTORY . '/desabonnement.php';
}
?>

<div class="container maincontent">
    <div class="row">
        <div class="col-md-12 smallvid">
            <div class="smallvid-title">
                <h3>Alerte  et Newsletter</h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <!-- form -->
                <?php if (!empty($_GET['inscription'])) { ?>
                    <div class="form-group col-sm-12">
                        <div class="alert alert-success" id="alertbox">Vous receverez désormais les newsletter ainsi que les alertes</div>
                    </div>
                <?php } else if (!empty($_GET['desabonner'])) { ?>
                    <div class="form-group col-sm-12">
                        <div class="alert alert-success" id="alertbox">Vous ne receverez plus de newsletter ni d'alertes </div>
                    </div>
                <?php } else { ?>
                <div class="form-group col-sm-12 center-block" style='margin-top: 25px;text-align: center;'>
                    <a class='btn loginbtn btn-default' href='newsletter.php?inscription=yes'>S'abonner</a>
                    <a class='btn loginbtn btn-default' href='newsletter.php?desabonner=yes'>Se désabonner</a>
                </div>
                    
                <?php } ?>
            </div>
        </div>
    </div>


</div>

<?php include 'footer.php'; ?>