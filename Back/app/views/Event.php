<?php
include 'header.php';
\app\core\User::isAdmin($_SESSION['id'], $_SESSION['login']);
if (!empty($_POST['type'])) {
    if ($_POST['type'] == "add") {
        include CONTROLLER_DIRECTORY . '/addEvent.php';
    } else if ($_POST['type'] == "update") {
        include CONTROLLER_DIRECTORY . '/updateEvent.php';
    } else if ($_POST['type'] == "delete") {
        include CONTROLLER_DIRECTORY . '/deleteEvent.php';
    } else if ($_POST['type'] == "bind") {
        include CONTROLLER_DIRECTORY . '/addProductToEvent.php';
    }else if ($_POST['type'] == "deletebind") {
        include CONTROLLER_DIRECTORY . '/deleteProductToEvent.php';
    }
}
include CONTROLLER_DIRECTORY . '/displayTypeProduit.php';
include CONTROLLER_DIRECTORY . '/displayEvent.php';
$typeevent = new app\core\TypeEvent();
$typeevents = $typeevent->getTypeEvent();

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

/* FORM SAMPLE :
  <form method="POST" action="#" role="form">
  <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
  <div class="form-bloc">
  <div class="form-group">
  <label class="sr-only" for="InputLogin">Login</label>
  <input type="text" name="Login" class="form-control" id="InputLogin" placeholder="Entrez votre login">
  </div>
  </div>
  </div>
  </form>
 */
?>

<div class="container maincontent">

    <div class="row">
        <div class="col-md-5 smallvid">
            <div class="smallvid-title">
                <h3>    Ajouter un Evenement    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="Event.php" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <input type="text" name="nom" class="form-control" id="InputNom" placeholder="Nom">
                            <textarea name="description" class="form-control" id="InputDescription" placeholder="Description" style="max-width: 100%"></textarea>
                            <input type="text" name="date" class="form-control" id="InputDate" placeholder="Date">
                            <input type="text" name="heure" class="form-control" id="InputHeure" placeholder="Heure">
                            <input type="text" name="lieu" class="form-control" id="InputLieu" placeholder="Lieu">
                            <input name="type" value="add" class="hidden"/>
                            <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5 smallvid col-md-offset-2">
            <div class="smallvid-title">
                <h3>    Modifier un Evenement    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="Event.php" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <select class="form-control" name="id">
                                <?php foreach ($events as $value) { ?> 
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nom'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="text" name="nom" class="form-control" id="InputNom" placeholder="Nom">
                            <textarea name="description" class="form-control" id="InputDescription" placeholder="Description" style="max-width: 100%"></textarea>
                            <input type="text" name="date" class="form-control" id="InputDate" placeholder="Date">
                            <input type="text" name="heure" class="form-control" id="InputHeure" placeholder="Heure">
                            <input type="text" name="lieu" class="form-control" id="InputLieu" placeholder="Lieu">
                            <input name="type" value="update" class="hidden"/>
                            <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-3 smallvid">
            <div class="smallvid-title">
                <h3>    Lier Evenement / Type de produit    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="Event.php" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <select class="form-control" name="TEvent_id">
                                <?php foreach ($events as $value) { ?> 
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nom'] ?></option>
                                <?php } ?>
                            </select>
                            <select class="form-control" name="TTypeProduit_id">
                                <?php foreach ($typeproduct as $value) { ?> 
                                    <option value="<?php echo $value['id'] ?> "><?php echo $value['nom'] ?> </option>
                                <?php } ?> 
                            </select>
                            <input name="type" value="bind" class="hidden"/>
                            <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3 smallvid col-md-offset-1">
            <div class="smallvid-title">
                <h3>    Supprimer un Evenement    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="Event.php" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <select class="form-control" name="id">
                                <?php foreach ($events as $value) { ?> 
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nom'] ?></option>
                                <?php } ?>
                            </select>
                            <input name="type" value="delete" class="hidden"/>
                            <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3 smallvid col-md-offset-1">
            <div class="smallvid-title">
                <h3>    Supprimer une Liaison (Type/Event)    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="Event.php" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <select class="form-control" name="id">
                                <?php
                                foreach ($typeevents as $value) {
                                    $arr1 = search($events, "id", $value['TEvent_id']);
                                    $arr2 = search($typeproduct, "id", $value['TTypeProduit_id']);
                                    if (!empty($arr1) && !empty($arr2)) {
                                        foreach ($arr2 as $value2) {
                                            ?> 
                                            <option value="<?php echo $arr1[0]['id'] . '/' . $value2['id'] ?>">
                                                <?php echo $arr1[0]['nom'] . '/' . $value2['nom']; ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <input name="type" value="deletebind" class="hidden"/>
                            <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'script.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {

    });


</script>
<?php include 'footer.php'; ?>
