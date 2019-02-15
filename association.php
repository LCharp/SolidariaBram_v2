<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Association</title>
<?php
	include("include/bootstrap.inc")
?>
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="css/navbar.css">

<style>
	hr{
		border:         none;
		border-left:    1px solid hsla(200, 10%, 50%,50);
		height:         100vh;
		width:          1px;
	}
</style>


<script type="text/javascript">
	// Prevent dropdown menu from closing when click inside the form
	$(document).on("click", ".navbar-right .dropdown-menu", function(e){
		e.stopPropagation();
	});
</script>
</head>
<body>
    <?php
		session_start();
        include('include/nav.inc');
        $nomassoc = "";
        $adrassoc = "";
        $cpassoc = "";
        $villeassoc = "";
        $descrassoc = "";
        $telassoc = "";
        $dirassoc = "";
        include('./include/connect.php');
        $idc = connect();

        $sql = 'select nom_asso, adresse_asso, cp_asso, ville_asso, description_asso,tel_asso, nom_directeur_asso from association where asso_check = true';
        $resultat = pg_exec($idc, $sql);
        while($ligne = pg_fetch_assoc($resultat)) {
            $nomassoc = $ligne['nom_asso'];
            $adrassoc = $ligne['adresse_asso'];
            $cpassoc = $ligne['cp_asso'];
            $villeassoc = $ligne['ville_asso'];
            $descrassoc = $ligne['description_asso'];
            $telassoc = $ligne['tel_asso'];
            $dirassoc = $ligne['nom_directeur_asso'];
        }
    ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<p> Cette année, c'est l'association <?php echo $nomassoc;?> présidé par <?php echo $dirassoc ?> qui est la bénéficiaire de notre course</p>
			    <p> Voici quelques mots laissés par l'association : </p>
			    <?php echo $descrassoc;?>
			</div>
			<div class="col-md-1">
				<hr>
			</div>
			<div class="col-md-2">
				<p> Coordonnées :</p>
			    <?php
			        echo $adrassoc. "<br>";
					echo "<br>";
			        echo $cpassoc. " ". $villeassoc."<br>";
					echo "<br>";
			        echo $telassoc;
			    ?>
			</div>
		</div>
		<div class="row photo">
			<div class="col-md-offset-4 col-md-4">
				<img src="photo.jpg"/>
			</div>
		</div>
	</div>





</body>
</html>
