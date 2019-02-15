<!DOCTYPE html>
<html lang="fr" dir="ltr">
<?php
    session_start();
?>

<?php
    include("header_form_parcours.php");
?>
<link rel="stylesheet" href="css/navbar.css">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">


<body>
    <?php
    //include('include/nav.inc');
    include('nav.php');
        include('./include/connect.php');
        $idc = connect();
        $sql='SELECT id_p FROM parcours ORDER BY id_p DESC';
        $rs=pg_exec($idc,$sql);
        $ligne=pg_fetch_assoc($rs);
        $idcourse = $ligne['id_p'] + 1;
    ?>
    <h3> Enregistrer un parcours</h3>
    <form name="frm" action="requetes/insert_bdd_parcours.php" method="POST">
        <div class="container">
            <div class="row" style="margin-top: 2%;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <label for="inputId">Identifiant du Parcours</label>
                    <input type="text" class="form-control" id="inputId" name='inputId' value='<?php echo $idcourse ?>' style="text-align:center" readonly>
                </div>
            </div>
        </div>
        <hr>

        <div class="container">
            <div class="row">
                <div class="form-group row" style="margin-top: 1%;">
                    <div class="col-md-4">
                        <label for="inputLieu">Lieu</label>
                        <input type="text" class="form-control" id="inputLieu" name='inputLieu' placeholder="Ville de la course">
                    </div>

                    <div class="col-md-4">
                        <label for="inputDate">Date du parcours</label>
                        <input type="date" class="form-control" id="inputDate" name='inputDate' >
                    </div>

                    <div class="col-md-4">
                        <label for="inputHeure">Heure de d&eacutepart</label>
                        <input type="time" class="form-control" id="inputHeure" name='inputHeure' placeholder="09:15">
                    </div>
                </div>
            </div>

            <div class="row">
                <div>
                    <div class="form-group row" style="margin-top: 1%;">
                        <div class="col-md-4">
                            <label for="inputLg">Longueur du parcours (km)</label>
                            <input type="number" class="form-control"  min="0" max="1000" id="inputLg" name='inputLg' >
                        </div>

                        <div class="col-md-4">
                            <label for="inputDeniv">D&eacutenivel&eacute (m)</label>
                            <input type="number" class="form-control" id="inputDeniv" name='inputDeniv' placeholder="500">
                        </div>

                        <div class="col-md-4">
                            <label for="inputType">Type de parcours</label>
                            <select id="inputType" name='inputType' class="form-control">
                                <option selected>Route</option>
                                <option>Route et Chemins</option>
                                <option>Chemins</option>
                                <option>Trail</option>
                                <option>Cross Country</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div>
                    <div class="form-group row" style=" margin-top: 1%;">
                        <div class="col-md-4">
                            <label for="inputDiff">Difficulté</label>
                            <select id="inputDiff" name='inputDiff' class="form-control">
                                <option selected>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="inputTarif">Tarif (€)</label>
                            <input type="number" class="form-control" id="inputTarif" name='inputTarif' placeholder="5€" min="0">
                        </div>

                        <div class="col-md-4" style="align:center">
                            <label for="file">Fichier .geojson du parcours</label>
                            <input type="file" class="custom-file-input" id="customFile">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div>
                    <input type="submit" class="btn btn-primary"></button>
                </div>
            </div>

        </div>
    </form>
</body>
</html>
