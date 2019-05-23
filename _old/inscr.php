<!DOCTYPE html>
<?php
	session_start();
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Solidaria Bram</title>
<?php
	include("include/bootstrap.inc")
?>
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="css/navbar.css">
<script type="text/javascript">
	// Prevent dropdown menu from closing when click inside the form
	$(document).on("click", ".navbar-right .dropdown-menu", function(e){
		e.stopPropagation();
	});
</script>
</head>
<body>
    <!-- Appel Navbar -->
    <?php
        include('include/nav.inc');
				//include('nav.php');
    ?>
		<form name="frm" action="insc.php" method="post" enctype="multipart/form-data">

			<p>
			Civilité <select name="zl_civ"><br/><br/>
				<option value="Mme">Madame</option>
				<option value="M">Monsieur</option></select>

			Nom <input type="text" name="zs_nom"/>

			Prénom <input type="text" name="zs_prenom"/><br/><br/>

			Date de naissance <input type="date" name="zs_dtn"/>

			</p>
			<br/>
			<p>
			Adresse <input type="text" name="zs_adresse"/>

			Code Postal <input type="text" name="zs_cp"/>

			Ville <input type="text" name="zs_ville"/><br/><br/>

			Téléphone <input type="tel" name="zs_tel"/>

			Mail <input type="email" name="zs_mail"/><br/><br/>
			Mot de passe <input type="password" name="zs_pass" id="pass" />
			</p>
			<br/>
			<p>
			Type de document:
				<input type="radio" name="doc" value="Licence">Licence
				<input type="radio" name="doc" value="Certificat médical">Certificat médical<br/><br/>

			Déposez votre document <input type="file" name="zs_doc">
			</p>
			<br/>
			<p>
			Choisissez votre parcours <select name="zl_parcours">
				<option value="1">a</option>
				<option value="2">b</option>
				<option value="3">c</option></select>
			<br/>	<br/>
			J'atteste m'engager à payer la cotisation le jour de la course:
				<input type="radio" name="cot" value="True" >Oui
				<input type="radio" name="cot" value="False">Non<br/>
			</p>
			<p>
			<br/><input type="submit" value="Envoyer"/>
			</p>
		</form>
	</body>
</html>
