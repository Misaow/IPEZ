
  
<?php
include 'header.php';
include '../Controller/login.php';
if(!empty($Login))
{
    if($userlogged)
    {
        echo'<div class="form-group col-sm-12">';
            echo'<div class="alert alert-success" id="alertbox">Authentification réussie. Vous allez être redirigé...</div>';
        echo'</div>';
        //header('Refresh: 10; URL='.WEBROOT.'http://yoursite.com/page.php');
        //header("Refresh: 3; URL=".WEBROOT."/index.php");
        exit();
    }
    else
    {
?>
<form method="POST" action="loginview.php" role="form">
    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto">
    <h3 class="form-title">Connexion</h3>
    <div class="form-bloc">
        <!-- Nom -->
        <div class="form-group col-sm-9">
            <div class="form-group">
                <label class="sr-only" for="InputLogin">Login</label>
                <input type="text" name="Login" class="form-control" id="InputLogin" placeholder="Entrez votre login">
            </div>
            <div class="form-group">
                <label class="sr-only" for="InputPwd">Login</label>
                <input type="password" name="Pwd" class="form-control" id="InputPwd" placeholder="Entrez votre mot de passe">
            </div>
        </div>
        <div class="form-group col-sm-3">
            <div class="form-group">
                <p id="loginbox"><button type="submit" class="btn loginbtn btn-default">Envoyer</button></p>
            </div>
        </div>
        <?php
            echo'<div class="form-group col-sm-12">';
                echo'<div class="alert alert-danger" id="alertbox">Une erreur s\'est produite lors de l\'authentification. Veuillez réessayer.</div>';
            echo'</div>';
        ?>
    </div>
</form>
<?php
    }
}
else{
?>

<form method="POST" action="loginview.php" role="form">
<div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto">
    <h3 class="form-title">Connexion</h3>
    <div class="form-bloc">
        <!-- Nom -->
        <div class="form-group col-sm-9">
            <div class="form-group">
                <label class="sr-only" for="InputLogin">Login</label>
                <input type="text" name="Login" class="form-control" id="InputLogin" placeholder="Entrez votre login">
            </div>
            <div class="form-group">
                <label class="sr-only" for="InputPwd">Login</label>
                <input type="password" name="Pwd" class="form-control" id="InputPwd" placeholder="Entrez votre mot de passe">
            </div>
        </div>
        <div class="form-group col-sm-3">
            <div class="form-group">
                <p id="loginbox"><button type="submit" class="btn loginbtn btn-default">Envoyer</button></p>
            </div>
        </div>
    </div>
</form>

<?php
    }
?>
<?php include 'footer.php'; ?>