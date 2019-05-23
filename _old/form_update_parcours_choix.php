<!DOCTYPE html>
<html lang="fr" dir="ltr">
<?php
    session_start();
?>
<!-- header -->
<?php include("header_form_parcours.php"); ?>
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="css/navbar.css">
<body>
    <?php //include('include/nav.inc');
    include('nav.php'); ?>

    <h3> Modifier un parcours</h3>

    <form name="frm" action="form_update_Parcours_mod.php" method="post">
        <div class="container">
            <div class="row" style="margin-top: 2%;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <label for="inputId">Identifiant de la course</label>
                    <select class="form-control" id="inputId" name='inputId'>
                        <?php
                            include('./include/connect.php');
                            $idc = connect();
                            $sql='SELECT id_p FROM parcours ORDER BY id_p';
                            $rs=pg_exec($idc,$sql);

                            while($ligne=pg_fetch_assoc($rs)){
                                print('<option value="'.$ligne['id_p'].'">'.$ligne['id_p'].'</option>');
                            }
                        ?>
                    </select>
                    <input type="submit" value="Modifier" class="btn btn-info btn-sm" style="margin-top: 1%;">
                </div>
            </div>
        </div>
    </form>

    <hr>

    <form name="frm" action="requetes/update_bdd_parcours.php" method="POST">

        <div class="container">
            <div class="row">
                <div class="form-group row" style="margin-top: 1%;">
                    <div class="col-md-4">
                        <label for="inputLieu">Lieu</label>
                        <input type="text" class="form-control" id="inputLieu" name='inputLieu' onchange="idCourse()" placeholder="Bram" disabled>
                    </div>

                    <div class="col-md-4">
                        <label for="inputDate">Date du parcours</label>
                        <input type="date" class="form-control" id="inputDate" name='inputDate' onchange="idCourse()" disabled>
                    </div>

                    <div class="col-md-4">
                        <label for="inputHeure">Heure de d&eacutepart</label>
                        <input type="time" class="form-control" id="inputHeure" name='inputHeure' placeholder="09:15" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                    <div class="form-group row" style="margin-top: 1%;">
                        <div class="col-md-4">
                            <label for="inputLg">Longueur du parcours (km)</label>
                            <input type="number" class="form-control"  min="0" max="1000" placeholder="5" id="inputLg" name='inputLg' onchange="idCourse()" disabled>
                        </div>

                        <div class="col-md-4">
                            <label for="inputDeniv">D&eacutenivel&eacute (m)</label>
                            <input type="number" class="form-control" id="inputDeniv" name='inputDeniv' placeholder="500" disabled>
                        </div>

                        <div class="col-md-4">
                            <label for="inputType">Type de parcours</label>
                            <select id="inputType" name='inputType' class="form-control" disabled>
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
                            <select id="inputDiff" name='inputDiff' class="form-control" disabled>
                                <option selected>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="inputTarif">Tarif (€)</label>
                            <input type="number" class="form-control" id="inputTarif" name='inputTarif' placeholder="5€" min="0" disabled>
                        </div>

                        <div class="col-md-4">
                            <label for="file">Fichier .geojson du parcours</label>
                            <input type="file" class="custom-file-input" id="customFile" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div>
                    <input type="submit" class="btn btn-primary">
                </div>
            </div>

        </div>
    </form>
</body>
</html>
