<?php
include 'header.php';
// type est par ex => add , update etc..
// mettre les data-type ainsi que l'input type caché
if (!empty($_POST['type'])) {
    if ($_POST['type'] == "add") {
        include CONTROLLER_DIRECTORY . '/addEvent.php';
    } else if ($_POST['type'] == "update") {
        include CONTROLLER_DIRECTORY . '/updateEvent.php';
    } else if ($_POST['type'] == "delete") {
        include CONTROLLER_DIRECTORY . '/deleteEvent.php';
    } else if ($_POST['type'] == "bind") {
        include CONTROLLER_DIRECTORY . '/addProductToEvent.php';
    }
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
                <form method="POST" action="#" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <input type="text" name="nom" class="form-control" id="InputNom" placeholder="Nom">
                            <textarea name="description" class="form-control" id="InputDescription" placeholder="Description" style="max-width: 100%"></textarea>
                            <input type="text" name="date" class="form-control" id="InputDate" placeholder="Date">
                            <input type="text" name="heure" class="form-control" id="InputHeure" placeholder="Heure">
                            <input type="text" name="login" class="form-control" id="InputLieu" placeholder="Lieu">
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
                <form method="POST" action="#" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <select class="form-control" name="">
                                <?php /* Foreach */ ?> 
                                <option value=""></option>
                            </select>
                            <input type="text" name="nom" class="form-control" id="InputNom" placeholder="Nom">
                            <textarea name="description" class="form-control" id="InputDescription" placeholder="Description" style="max-width: 100%"></textarea>
                            <input type="text" name="date" class="form-control" id="InputDate" placeholder="Date">
                            <input type="text" name="heure" class="form-control" id="InputHeure" placeholder="Heure">
                            <input type="text" name="login" class="form-control" id="InputLieu" placeholder="Lieu">
                            <input name="type" value="update" class="hidden"/>
                            <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-5 smallvid">
            <div class="smallvid-title">
                <h3>    Lier Evenement / Type de produit    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="#" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <select class="form-control" name="TEvent_id">
                                <?php /* Foreach */ ?> 
                                <option value="">Evenement</option>
                            </select>
                            <select class="form-control" name="TTypeProduit_id">
                                <?php /* Foreach */ ?> 
                                <option value="">Type de produit</option>
                            </select>
                            <input name="type" value="bind" class="hidden"/>
                            <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5 smallvid col-md-offset-2">
            <div class="smallvid-title">
                <h3>    Supprimer un Evenement    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="#" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <select class="form-control" name="id">
                                <?php /* Foreach */ ?> 
                                <option value="">Selectionner un evenement</option>
                            </select>
                            <input name="type" value="delete" class="hidden"/>
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
