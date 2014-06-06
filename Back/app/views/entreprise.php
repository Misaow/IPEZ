<?php
include 'header.php';
if(!empty($_POST["text"])){
//include CONTROLLER_DIRECTORY . '/login.php';
}
?>

<div class="container maincontent">
    <div class="row">
        <div class="col-md-12 smallvid">
            <div class="smallvid-title">
                <h3>Connexion</h3>
            </div>
            <div class="smallvid-player" style="height: auto;">

                <?php
                if (!empty($register)) {
                        ?>
                        <div class="form-group col-sm-12">
                            <div class="alert alert-danger" id="alertbox">Une erreur s\'est produite lors de l\'authentification. Veuillez réessayer.</div>
                        </div>
                        <form method="POST" action="entreprise.php" role="form">
                            <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto">
                                <h3 class="form-title">Edition de la page entreprise</h3>
                                <div class="form-bloc">
                                    <!-- Nom -->
                                    <div class="form-group col-sm-12">
                                        <div class="form-group">
                                            <textarea  name="text" class="form-control" id="" placeholder="Entrez votre présentation d'entreprise"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <div class="form-group">
                                            <p id="loginbox"><button type="submit" class="btn loginbtn btn-default">Enregistrer</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                    else {
                    ?>

                    <form method="POST" action="entreprise.php" role="form">
                            <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto">
                                <h3 class="form-title">Edition de la page entreprise</h3>
                                <div class="form-bloc">
                                    <!-- Nom -->
                                    <div class="form-group col-sm-12">
                                        <div class="form-group">
                                            <textarea  name="text" class="form-control" id="" placeholder="Entrez votre présentation d'entreprise"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <div class="form-group">
                                            <p id="loginbox"><button type="submit" class="btn loginbtn btn-default">Enregistrer</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php include 'script.php'; ?>
<?php include 'footer.php'; ?>
