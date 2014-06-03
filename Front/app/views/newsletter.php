<?php include 'header.php'; 
/* include controller */
?>
<div class="container maincontent">
    <div class="row">
        <div class="col-md-12 smallvid">
            <div class="smallvid-title">
                <h3>Alerte  et Newsletter</h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <!-- form -->
                <form method="POST" action="connexion.php" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto">
                        <h3 class="form-title">Inscription</h3>
                        <div class="form-bloc">
                            <!-- Nom -->
                            <div class="form-group col-sm-12">
                                <div class="form-group">
                                    <label class="sr-only" for="InputLogin">Nom</label>
                                    <input type="text" name="Login" class="form-control" id="InputLogin" placeholder="Entrez votre login">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="InputPwd">Prenom</label>
                                    <input type="password" name="Pwd" class="form-control" id="InputPwd" placeholder="Entrez votre mot de passe">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="InputPwd">Mail</label>
                                    <input type="password" name="Pwd" class="form-control" id="InputPwd" placeholder="Entrez votre mot de passe">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="InputPwd">Date de Naissance</label>
                                    <input type="password" name="Pwd" class="form-control" id="InputPwd" placeholder="Entrez votre mot de passe">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="InputPwd">...</label>
                                    <input type="password" name="Pwd" class="form-control" id="InputPwd" placeholder="Entrez votre mot de passe">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <div class="form-group">
                                    <p id="loginbox"><button type="submit" class="btn loginbtn btn-default">Envoyer</button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


</div>

<?php include 'footer.php'; ?>