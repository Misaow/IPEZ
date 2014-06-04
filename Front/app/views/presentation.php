<?php
include 'header.php';
include CONTROLLER_DIRECTORY.'/listEvent.php';
var_dump($result);
?>
<div class="container maincontent">
    <div class="row">
        <div class="col-md-12 smallvid">
            <div class="smallvid-title">
                <h3>Liste des évènements</h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <div class="table-responsive" style="margin: 30px">
                    <table class="table table-hover">
                        <thead>
                            
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Lieu</th>
                                <th>Heure</th>
                                <th>Dates</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($result as $value) {
                                
                                echo "<tr data-id=\"".$result[$i]['id']."\">
                                        <td>".$i."</td>
                                        <td>".$result[$i]['nom']."</td>
                                        <td>".$result[$i]['lieu']."</td>
                                        <td>".$result[$i]['heure']."</td>
                                        <td>".$result[$i]['date']."</td>
                                     </tr>";
                                $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>