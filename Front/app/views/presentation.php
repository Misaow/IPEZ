<?php
include 'header.php';
include CONTROLLER_DIRECTORY . '/listEvent.php';
if (!empty($_GET['inscription'])) {
    include CONTROLLER_DIRECTORY . '/inscriptionEvent.php';
} else if (!empty($_GET['desinscription'])) {
    include CONTROLLER_DIRECTORY . '/desincriptionEvent.php';
}
?>
<div class="container maincontent">
    <div class="row">
        <div class="col-md-12 smallvid">
            <div class="smallvid-title">
                <h3>Liste des évènements</h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <div class="form-group col-sm-12 center-block" style='margin-top: 25px;text-align: center;'>
                    <?php if (!empty($_GET['inscription'])) { ?> 
                        <h3>Votre participation a été enregistrée</h3>
                    <?php } else if (!empty($_GET['desinscription'])) { ?>
                        <h3>Nous vous avons désincrit de cet évenement</h3>
                    <?php } ?>
                </div>
                <div class="table-responsive" style="margin: 30px">
                    <table class="table table-hover">
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Lieu</th>
                                <th>Heure</th>
                                <th>Dates</th>
                                <th>Participer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($result as $value) {

                                echo "<tr data-id=\"" . $result[$i]['id'] . "\">
                                        <td>" . $i . "</td>
                                        <td>" . $result[$i]['nom'] . "</td>
                                        <td>" . $result[$i]['lieu'] . "</td>
                                        <td>" . $result[$i]['heure'] . "</td>
                                        <td>" . $result[$i]['date'] . "</td>";
                                if (!empty($_SESSION['id'])) {
                                    echo "<td>
                                            <a href='presentation.php?inscription=" . $result[$i]['id'] . "' class='btn loginbtn btn-default'>Participer</a>
                                            <a href='presentation.php?desinscription=" . $result[$i]['id'] . "' class='btn loginbtn btn-default'>Renoncer</a>
                                        </td>";
                                }
                                echo "</tr>";
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>