<?php
include 'header.php';
include CONTROLLER_DIRECTORY . '/inscription.php';
?>

<div class="container maincontent">
    <div class="row">
        <div class="col-md-12 smallvid">
            <div class="smallvid-title">
                <h3>Inscription</h3>
            </div>
            <div class="smallvid-player" style="height: auto;">

                <?php
                if ($clientcreate) {
                    ?>
                    <div class="form-group col-sm-12">';
                        <div class="alert alert-success" id="alertbox">Inscription réalisée avec succès. Vous allez être redirigé...</div>';
                    </div>
                    <?php
                    header("Refresh: 3; URL=index.php");
                } else {
                    ?>
                    <form method="POST" action="inscription.php" role="form">
                        <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto">
                            <div class="form-bloc">
                                <div class="form-group col-sm-12" style="padding-top: 5px;">
                                    <input type="text" name="nom" class="form-control" id="InputNom" placeholder="Entrez votre Nom" required/>
                                    <input type="text" name="prenom" class="form-control" id="InputPrenom" placeholder="Entrez votre Prénom" required/>
                                    <input type="password" name="mdp" class="form-control" id="Inputmdp" placeholder="Entrez votre mot de passe" required/>
                                    <input type="email" name="email" class="form-control" id="InputMail" placeholder="Entrez votre Mail" required/>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="form-group">
                                        <p id="loginbox">
                                            <button type="submit" class="btn loginbtn btn-default">S'inscrire</button> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';
?>

