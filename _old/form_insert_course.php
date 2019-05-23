<!DOCTYPE html>
<html lang="fr" dir="ltr">

<!-- header -->
<?php
    include("header_form_parcours.php");
?>

<body>
    <?php
        include("nav.php");
        include('./include/connect.php');
        $idc = connect();
        $sql='SELECT id_course FROM course ORDER BY id_course DESC';
        $rs=pg_exec($idc,$sql);
        $ligne=pg_fetch_assoc($rs);
        $idcourse = $ligne['id_course'] + 1;
    ?>
    <h3> Enregistrer un parcours</h3>
    <form name="frm" action="requetes/insert_bdd_course.php" method="POST">
        <div class="container">
            <div class="row" style="margin-top: 2%;">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <label for="inputId">Identifiant de la Course</label>
                    <input type="text" class="form-control" id="inputId" name='inputId' value='<?php echo $idcourse ?>' style="text-align:center" readonly>
                </div>
            </div>
        </div>
        <hr>

        <div class="container">
            <div class="row">
                <div class="form-group row" style="margin-top: 1%;">
                    <div class="col-md-4">
                        <label for="inputLieu">Nom de la course</label>
                        <input type="text" class="form-control" id="inputNomC" name='inputNomC' placeholder="La Solidaria Bram">
                    </div>
                    <div class="col-md-4">
                        <label for="inputLieu">Date de la course</label>
                        <input type="date" class="form-control" id="inputDate" name='inputDate' placeholder="2019-08-02">
                    </div>
                    <div class="col-md-4">
                        <label for="inputId">Association concernée</label>
                        <select class="form-control" id="inputIdAsso" name='inputIdAsso' >
                            <?php
                                $sql='SELECT id_asso, nom_asso FROM association ORDER BY nom_asso';
                                $rs=pg_exec($idc,$sql);

                                while($ligne=pg_fetch_assoc($rs)){
                                        print('<option value="'.$ligne['id_asso'].'">'.$ligne['nom_asso'].'</option>');
                                }
                            ?>
                        </select>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group row" style="margin-top: 1%;">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    <label for="comment">Informations complémentaires:</label>
                    <textarea class="form-control" rows="5" id="inputInfos" name='inputInfos'></textarea>
                  </div>
                </div>
            </div>
          </div>


            <div class="row">
                <div>
                    <input type="submit" class="btn btn-success"></button>
                </div>
            </div>

        </div>
    </form>
</body>
</html>
