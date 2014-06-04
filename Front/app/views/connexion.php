<?php
include 'header.php';
include CONTROLLER_DIRECTORY . '/login.php';
?>

<div class="container maincontent">
    <div class="row">
        <div class="col-md-12 smallvid">
            <div class="smallvid-title">
                <h3>Connexion</h3>
            </div>
            <div class="smallvid-player" style="height: auto;">

                <?php
                if (!empty($Login)) {
                    if ($userlogged) {
                        echo'<div class="form-group col-sm-12">';
                        echo'<div class="alert alert-success" id="alertbox">Authentification réussie. Vous allez être redirigé...</div>';
                        echo'</div>';
                        header("Refresh: 3; URL=index.php");
                        exit();
                    } else {
                        ?>
                        <div class="form-group col-sm-12">
                            <div class="alert alert-danger" id="alertbox">Une erreur s\'est produite lors de l\'authentification. Veuillez réessayer.</div>
                        </div>
                        <form method="POST" action="connexion.php" role="form">
                            <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto">
                                <h3 class="form-title">Connexion</h3>
                                <div class="form-bloc">
                                    <!-- Nom -->
                                    <div class="form-group col-sm-12">
                                        <div class="form-group">
                                            <label class="sr-only" for="InputLogin">Login</label>
                                            <input type="text" name="Login" class="form-control" id="InputLogin" placeholder="Entrez votre login">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="InputPwd">Login</label>
                                            <input type="password" name="Pwd" class="form-control" id="InputPwd" placeholder="Entrez votre mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="form-group">
                                            <p id="loginbox">
                                                <button type="submit" class="btn loginbtn btn-default">Se connecter</button> 
                                                <a class="btn loginbtn btn-default" href="inscription.php"> S'inscrire</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                } else {
                    ?>

                    <form method="POST" action="connexion.php" role="form">
                        <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto">
                            <h3 class="form-title">Connexion</h3>
                            <div class="form-bloc">
                                <!-- Nom -->
                                <div class="form-group col-sm-12">
                                    <div class="form-group">
                                        <label class="sr-only" for="InputLogin">Login</label>
                                        <input type="text" name="Login" class="form-control" id="InputLogin" placeholder="Entrez votre login">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="InputPwd">Login</label>
                                        <input type="password" name="Pwd" class="form-control" id="InputPwd" placeholder="Entrez votre mot de passe">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="form-group">
                                        <p id="loginbox">
                                            <button type="submit" class="btn loginbtn btn-default">Se connecter</button> 
                                            <a class="btn loginbtn btn-default" href="inscription.php"> S'inscrire</a>
                                        </p>
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
<?php include 'footer.php'; ?>
