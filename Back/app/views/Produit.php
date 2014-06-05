<?php
include 'header.php';
$idA = isset($_SESSION['id']) ? $_SESSION['id'] : "";
$logA = isset($_SESSION['login']) ? $_SESSION['login'] : "";
\app\core\User::isAdmin($idA, $logA);
if (!empty($_POST['type'])) {
    if ($_POST['type'] == "add") {
        include CONTROLLER_DIRECTORY . '/addProduct.php';
    } else if ($_POST['type'] == "update") {
        include CONTROLLER_DIRECTORY . '/updateProduct.php';
    } else if ($_POST['type'] == "delete") {
        include CONTROLLER_DIRECTORY . '/deleteProduct.php';
    } else if ($_POST['type'] == "bind") {
        include CONTROLLER_DIRECTORY . '/addTypeProduit.php';
    } else if ($_POST['type'] == "deletebind") {
        include CONTROLLER_DIRECTORY . '/deleteTypeProduit.php';
    }
}
include CONTROLLER_DIRECTORY . '/displayTypeProduit.php';
include CONTROLLER_DIRECTORY . '/displayProduct.php';
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
    <div class="row">
        <div class="col-md-5 smallvid">
            <div class="smallvid-title">
                <h3>    Ajouter un Produit    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="#" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <input type="text" name="nom" class="form-control" id="InputNom" placeholder="Nom">
                            <textarea name="description" class="form-control" id="InputDescription" placeholder="Description" style="max-width: 100%"></textarea>
                            <input type="text" name="nb_vente" class="form-control" id="InputDate" placeholder="Nombre de vente">
                            <input type="text" name="nb_stock" class="form-control" id="InputHeure" placeholder="Nombre de stock">
                            <input type="file" name="image" class="form-control" id="InputLieu" placeholder="Image">
                            <select class="form-control" name="TTypeProduit_id">
                                <?php foreach ($typeproduct as $value) { ?> 
                                    <option value="<?php echo $value['id'] ?> "><?php echo $value['nom'] ?> </option>
                                <?php } ?> 
                            </select>
                            <input name="type" value="add" class="hidden"/>
                            <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5 smallvid col-md-offset-2">
            <div class="smallvid-title">
                <h3>    Modifier un Produit    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="Produit.php" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <select class="form-control" name="id">
                                <?php foreach ($products as $value) { ?> 
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nom'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="text" name="nom" class="form-control" id="InputNom" placeholder="Nom">
                            <textarea name="description" class="form-control" id="InputDescription" placeholder="Description" style="max-width: 100%"></textarea>
                            <input type="text" name="nb_vente" class="form-control" id="InputDate" placeholder="Nombre de vente">
                            <input type="text" name="nb_stock" class="form-control" id="InputHeure" placeholder="Nombre de stock">
                            <input type="file" name="image" class="form-control" id="InputLieu" placeholder="Image">
                            <select class="form-control" name="TTypeProduit_id">
                                <?php foreach ($typeproduct as $value) { ?> 
                                    <option value="<?php echo $value['id'] ?> "><?php echo $value['nom'] ?> </option>
                                <?php } ?> 
                            </select>
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
                <h3>    Ajouter Type de produit    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="Produit.php" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">

                            <input type="text" name="nom" class="form-control" id="InputNom" placeholder="Nom">
                            <textarea name="description" class="form-control" id="InputDescription" placeholder="Description" style="max-width: 100%"></textarea>
                            <input name="type" value="bind" class="hidden"/>
                            <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-3 smallvid col-md-offset-1">
                <div class="smallvid-title">
                    <h3>    Supprimer un Produit    </h3>
                </div>
                <div class="smallvid-player" style="height: auto;">
                    <form method="POST" action="Produit.php" role="form">
                        <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                            <div class="form-bloc">
                                <select class="form-control" name="id">
                                    <?php foreach ($products as $value) { ?> 
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['nom'] ?></option>
                                    <?php } ?>
                                </select>
                                <input name="type" value="delete" class="hidden"/>
                                <button type="submit" class="btn loginbtn btn-default center-block">Supprimer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3 smallvid col-md-offset-1">
                <div class="smallvid-title">
                    <h3>    Supprimer un Type Produit    </h3>
                </div>
                <div class="smallvid-player" style="height: auto;">
                    <form method="POST" action="Produit.php" role="form">
                        <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                            <div class="form-bloc">
                                <select class="form-control" name="TTypeProduit_id">
                                    <?php foreach ($typeproduct as $value) { ?> 
                                        <option value="<?php echo $value['id'] ?> "><?php echo $value['nom'] ?> </option>
                                    <?php } ?> 
                                </select>


                                <input name="type" value="deletebind" class="hidden"/>
                                <button type="submit" class="btn loginbtn btn-default center-block">Supprimer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 smallvid">
                <div class="smallvid-title">
                    <h3>    Edition des ventes lors des soirées    </h3>
                </div>
                <div class="smallvid-player" style="height: auto;">
                    <form method="POST" action="Produit.php" role="form">
                        <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                            <div class="form-bloc">
                                <select class="form-control" name="idevent">
                                    <?php foreach ($products as $value) { ?> 
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['nom'] ?></option>
                                    <?php } ?>
                                </select>
                                <select class="form-control" name="idproduit">
                                    <?php foreach ($products as $value) { ?> 
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['nom'] ?></option>
                                    <?php } ?>
                                </select>
                                <input name="type" value="editvente" class="hidden"/>
                                <button type="submit" class="btn loginbtn btn-default center-block">Supprimer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<?php include 'script.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("button[type]").on('click', function() {
            $.ajax({
                type: "POST",
                url: $(this).closest("form").attr("action"),
                data: {name: "John", location: "Boston"}
            })
                    .done(function(msg) {
                        alert("Data Saved: " + msg);
                    });
        });
    });


</script>
<?php include 'footer.php'; ?>