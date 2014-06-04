<?php include 'header.php';
?>

<div class="container maincontent">
    <div class="row">
        <div class="col-md-12 smallvid">
            <div class="smallvid-title">
                <h3>    Listing des participants    </h3>
            </div>
            <div class="smallvid-player" style="height: auto;">
                <form method="POST" action="#" role="form">
                    <div class="row" id="form-bloc" style="max-width:400px; margin: 0px auto;margin-top: 5px;">
                        <div class="form-bloc">
                            <select class="form-control" name="" style="display: inline-block;width: 50%">
                                <option>liste des soirées</option>
                            </select>
                            <button type="submit" class="btn loginbtn btn-default">Chercher la liste</button>
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

                                        echo "<tr data-id=\"" . $result[$i]['id'] . "\">
                                        <td>" . $i . "</td>
                                        <td>" . $result[$i][''] . "</td>
                                        <td>" . $result[$i][''] . "</td>
                                        <td>" . $result[$i][''] . "</td>
                                        <td>" . $result[$i][''] . "</td>
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
