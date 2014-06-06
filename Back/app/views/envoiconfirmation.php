<?php
include 'header.php';
$idA = isset($_SESSION['id']) ? $_SESSION['id'] : "";
$logA = isset($_SESSION['login']) ? $_SESSION['login'] : "";
\app\core\User::isAdmin($idA, $logA);
if (!empty($_POST['type'])) {
    if ($_POST['type'] == "aleatoire") {
        include CONTROLLER_DIRECTORY . '/aleatoire.php';
    } else if ($_POST['type'] == "update") {
        include CONTROLLER_DIRECTORY . '/mail.php';
    }
}
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

include CONTROLLER_DIRECTORY . '/displayEvent.php';

// afficher les evenmment (à liste) et choisir soirée 
?>

<div class="container maincontent">
    <div class="row">
        <div class="col-md-5 smallvid">
            <div class="smallvid-title">
                <h3>    Choisir Aléatoirement Participants <br>et Envoyer de Mail Confirmation   </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="envoiconfirmation.php" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            
                            <select class="form-control" name="TEvent_id">
                                <?php foreach ($events as $value) { ?> 
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nom'] ?></option>
                                <?php } ?>
                            </select>
                            <input name="type" value="aleatoire" class="hidden"/>
                            <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>