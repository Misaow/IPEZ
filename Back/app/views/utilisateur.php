<?php
include 'header.php';
$idA = isset($_SESSION['id']) ? $_SESSION['id'] : "";
$logA = isset($_SESSION['login']) ? $_SESSION['login'] : "";
\app\core\User::isAdmin($idA, $logA);
if (!empty($_POST['type'])) {
    if ($_POST['type'] == "add") {
        include CONTROLLER_DIRECTORY . '/createUser.php';
    } else if ($_POST['type'] == "update") {
        include CONTROLLER_DIRECTORY . '/updateUser.php';
    } else if ($_POST['type'] == "delete") {
        include CONTROLLER_DIRECTORY . '/deleteUser.php';
    }
}
include CONTROLLER_DIRECTORY . '/displayUser.php';

function search($array, $key, $value) {
    $results = array();
    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value)
            $results[] = $array;

        foreach ($array as $subarray)
            $results = array_merge($results, search($subarray, $key, $value));
    }

    return $results;
}
?>

<div class="container maincontent">
    <div class="container maincontent">

        <div class="row">
            <div class="col-md-4 smallvid">
                <div class="smallvid-title">
                    <h3>    Ajouter un Utilisateur  </h3>
                </div>
                <div class="smallvid-player" style="height: auto;">
                    <form method="POST" action="utilisateur.php" role="form">
                        <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                            <div class="form-bloc">
                                <input type="text" name="login" class="form-control" id="InputNom" placeholder="Login">
                                <input type="password" name="mdp" class="form-control" id="InputLieu" placeholder="Mdp">
                                <select class="form-control" name="is_admin">
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>


                                </select>
                                <input name="type" value="add" class="hidden"/>
                                <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 smallvid col-md-offset-0">
                <div class="smallvid-title">
                    <h3>    Supprimer un Utilisateur    </h3>
                </div>
                <div class="smallvid-player" style="height: auto;">
                    <form method="POST" action="utilisateur.php" role="form">
                        <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                            <div class="form-bloc">
                                <select class="form-control" name="id">
                                    <?php foreach ($users as $value) { ?> 
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['login'] ?></option>
<?php } ?>
                                </select>
                                <input name="type" value="delete" class="hidden"/>
                                <button type="submit" class="btn loginbtn btn-default center-block">Supprimer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 smallvid col-md-offset-0">
                <div class="smallvid-title">
                    <h3>    Modifier un Utilisateur    </h3>
                </div>
                <div class="smallvid-player" style="height: auto;">
                    <form method="POST" action="utilisateur.php" role="form">
                        <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                            <div class="form-bloc">
                                <select class="form-control" name="id">
                                    <?php var_dump($users);
                                    foreach ($users as $value) { ?> 
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['login'] ?></option>
<?php } ?>
                                </select>
                                <input type="text" name="login" class="form-control" id="InputNom" placeholder="Login">
                                <input type="password" name="mdp" class="form-control" id="InputLieu" placeholder="Mdp">
                                <select class="form-control" name="is_admin">
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>


                                </select>
                                <input name="type" value="update" class="hidden"/>
                                <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
        

    </div>
