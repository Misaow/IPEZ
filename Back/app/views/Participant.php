<?php include 'header.php';
$idA = isset($_SESSION['id']) ? $_SESSION['id'] : "";
$logA = isset($_SESSION['login']) ? $_SESSION['login'] : "";
\app\core\User::isAdmin($idA, $logA);
if(isset($_POST["type"]))
{
    if($_POST["type"] == "displayclient")
        include CONTROLLER_DIRECTORY.DS.'displayClientEvent.php';
}
include CONTROLLER_DIRECTORY . '/displayEvent.php';
$csvid = !empty($_POST['id']) ? $_POST['id'] : "" ;
?>

<div class="container maincontent">
    <div class="row">
        <div class="col-md-12 smallvid">
            <div class="smallvid-title">
                <h3>    Listing des participants    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="Participant.php" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <select class="form-control" name="id" style="display: inline-block;width: 50%">
                                <?php foreach ($events as $value) { ?> 
                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nom'] ?></option>
                                <?php } ?>
                            </select>
                            <input name="type" class="hidden" value="displayclient"/>
                            <button type="submit" class="btn loginbtn btn-default">Chercher la liste</button>
                            <a class="btn loginbtn btn-default" href="<?php echo WEBROOT.DS.'app'.DS.'controller'.DS.'csv.php?id='.$csvid?>">Exporter les mails</a>
                        </div>
                    </div>
                    <div class="table-responsive" style="margin: 30px">
                        <table class="table table-hover">
                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Mail</th>
                                    <th>Newsletter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if (isset($result)) {
                                    foreach ($result as $value) {
                                        $newsletter = $value['newsletter'] == 0 ? "Non abonné" : "Abonné";
                                        echo "<tr data-id=\"" . $value['id'] . "\">
                                        <td>" . $i . "</td>
                                        <td>" . $value['nom'] . "</td>
                                        <td>" . $value['prenom'] . "</td>
                                        <td>" . $value['mail'] . "</td>
                                        <td>" . $newsletter . "</td>
                                     </tr>";
                                        $i++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'script.php'; ?>
<!-- selon la soirée select , display les participants -->
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
