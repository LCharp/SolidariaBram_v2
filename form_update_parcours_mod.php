<!DOCTYPE html>
<html lang="fr" dir="ltr">

<!-- header -->
<?php
    include("header_form_parcours.php");
?>

<body>
    <?php
        include("nav.php");
        $selectid = $_POST['inputId'];
    ?>

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
                                if($ligne['id_p'] != $selectid){
                                    print('<option value="'.$ligne['id_p'].'">'.$ligne['id_p'].'</option>');
                                }else{
                                    print('<option value="'.$ligne['id_p'].'" selected>'.$ligne['id_p'].'</option>');
                                };
                            }
                        ?>
                    </select>
                    <input type="submit" value="Modifier" class="btn btn-info btn-sm" style="margin-top: 1%;">
                </div>
            </div>
        </div>
    </form>

    <hr>

    <?php
        $sql="SELECT heure_p, longueur_p, denivelee_p, tarif, date_p, niveau, type_p from parcours where id_p = $selectid;";
        $rs=pg_exec($idc,$sql);

        while($ligne=pg_fetch_assoc($rs)){
            $heure = $ligne['heure_p'];
            $longueur = $ligne['longueur_p'];
            $tarif = $ligne['tarif'];
            $denivele = $ligne['denivelee_p'];
            $date = $ligne['date_p'];
            $difficulte = $ligne['niveau'];
            $type = $ligne['type_p'];
        }
    ?>

    <form name="frm" action="requetes/update_bdd_parcours.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="form-group row" style="margin-top: 1%;">
                    <div class="col-md-4">
                        <label for="inputLieu">Lieu</label>
                        <input type="text" class="form-control" id="inputLieu" name='inputLieu' disabled>
                    </div>

                    <div class="col-md-4">
                        <label for="inputDate">Date du parcours</label>
                        <?php
                        print('<input type="date" class="form-control" id="inputDate" name="inputDate" value='.$date.'>');
                        ?>
                    </div>

                    <div class="col-md-4">
                        <label for="inputHeure">Heure de d&eacutepart</label>
                        <?php
                        print('<input type="time" class="form-control" id="inputHeure" name="inputHeure" value='.$heure.'>');
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                    <div class="form-group row" style="margin-top: 1%;">
                        <div class="col-md-4">
                            <label for="inputLg">Longueur du parcours (km)</label>
                            <?php
                                print('<input type="number" class="form-control" id="inputLg" name="inputLg" value='.$longueur.'>');
                            ?>
                        </div>
                        <div class="col-md-4">
                            <label for="inputDeniv">D&eacutenivel&eacute (m)</label>
                            <?php
                                print('<input type="number" class="form-control" id="inputDeniv" name="inputDeniv" value='.$denivele.'>');
                            ?>
                        </div>
                        <div class="col-md-4">
                            <label for="inputType">Type de parcours</label>
                            <select id="inputType" name='inputType' class="form-control">
                                <?php
                                    if ($type != 'Route') {
                                        print('<option>Route</option>');
                                    }else {
                                        print('<option selected>Route</option>');
                                    }
                                    if ($type != 'Route et Chemins') {
                                        print('<option>Route et Chemins</option>');
                                    }else {
                                        print('<option selected>Route et Chemins</option>');
                                    }
                                    if ($type != 'Trail') {
                                        print('<option>Trail</option>');
                                    }else {
                                        print('<option selected>Trail</option>');
                                    }
                                    if ($type != 'Chemins') {
                                        print('<option>Chemins</option>');
                                    }else {
                                        print('<option selected>Chemins</option>');
                                    }
                                    if ($type != 'Cross Country') {
                                        print('<option >Cross Country</option>');
                                    }else {
                                        print('<option selected>Cross Country</option>');
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <?php
                                print('<input type="hidden" class="form-control" id="inputId" name="inputId" value='.$selectid.'>');
                            ?>
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
                                <?php
                                    if ($type != 1) {
                                        print('<option>1</option>');
                                    }else {
                                        print('<option selected>1</option>');
                                    }
                                    if ($type != 2) {
                                        print('<option>2</option>');
                                    }else {
                                        print('<option selected>2</option>');
                                    }
                                    if ($type != 3) {
                                        print('<option>3</option>');
                                    }else {
                                        print('<option selected>3</option>');
                                    }
                                    if ($type != 4) {
                                        print('<option>4</option>');
                                    }else {
                                        print('<option selected>4</option>');
                                    }
                                    if ($type != 5) {
                                        print('<option> 5</option>');
                                    }else {
                                        print('<option selected>5</option>');
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="inputTarif">Tarif (€)</label>
                            <?php
                                print('<input type="number" class="form-control" id="inputTarif" name="inputTarif" value='.$tarif.'>');
                            ?>
                        </div>

                        <div class="col-md-4">
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
        </form>
    </body>
    </html>
