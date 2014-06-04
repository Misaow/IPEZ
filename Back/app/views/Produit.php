<?php
include 'header.php';
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
                <form method="POST" action="#" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <select class="form-control" name="">
                                <?php /* Foreach */ ?> 
                                <option value=""></option>
                            </select>
                            <input type="text" name="nom" class="form-control" id="InputNom" placeholder="Nom">
                            <textarea name="description" class="form-control" id="InputDescription" placeholder="Description" style="max-width: 100%"></textarea>
                            <input type="text" name="nb_vente" class="form-control" id="InputDate" placeholder="Nombre de vente">
                            <input type="text" name="nb_stock" class="form-control" id="InputHeure" placeholder="Nombre de stock">
                            <input type="file" name="image" class="form-control" id="InputLieu" placeholder="Image">
                            <button type="submit" class="btn loginbtn btn-default center-block">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-4 smallvid col-md-offset-4">
            <div class="smallvid-title">
                <h3>    Supprimer un Produit    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="#" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <select class="form-control" name="">
                                <?php /* Foreach */ ?> 
                                <option value="">Selectionner un Produit</option>
                            </select>
                            <button type="submit" class="btn loginbtn btn-default center-block">Supprimer</button>
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