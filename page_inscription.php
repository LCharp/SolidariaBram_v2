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
		?>
		<form class="form-horizontal" action="requetes/insert_bdd_individu.php" method="post">
			<fieldset>

				<legend style="text-align:center;">Inscription</legend>

				<div class="form-group">
					<label class="col-md-4 control-label">Civilite</label>
					<div class="col-md-4">
						<select id="zl_civ" name="zl_civ" class="form-control">
							<option value="M">M</option>
							<option value="Mme">Mme</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Nom</label>
					<div class="col-md-4">
						<input id="zs_nom" name="zs_nom" type="text" placeholder="Nom" class="form-control input-md" required="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Prenom</label>
					<div class="col-md-4">
						<input id="zs_prenom" name="zs_prenom" type="text" placeholder="Prenom" class="form-control input-md" required="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Date de naissance</label>
					<div class="col-md-4">
						<input id="zs_ddn" name="zs_ddn" type="date" placeholder="01/01/1970" class="form-control input-md" required="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Adresse</label>
					<div class="col-md-4">
						<input id="zs_adresse" name="zs_adresse" type="text" placeholder="Adresse" class="form-control input-md" required="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Code Postal</label>
					<div class="col-md-4">
						<input id="zs_cp" name="zs_cp" type="text" placeholder="11000" class="form-control input-md" required="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Ville</label>
					<div class="col-md-4">
						<input id="zs_ville" name="zs_ville" type="text" placeholder="Carcassonne" class="form-control input-md">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Adresse mail</label>
					<div class="col-md-4">
						<input id="zs_mail" name="zs_mail" type="email" placeholder="solidaria@bram.fr" class="form-control input-md">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Mot de Passe</label>
					<div class="col-md-4">
						<input id="zs_pass" name="zs_pass" type="password" placeholder="" class="form-control input-md">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Téléphone</label>
					<div class="col-md-4">
						<input id="zs_tel" name="zs_tel" type="tel" placeholder="0605040302" class="form-control input-md">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Attestation médicale</label>
					<div class="col-md-4">
						<div class="radio">
							<label for="document-0">
								<input type="radio" name="doc" id="doc-0" value="licence" checked="checked">
								Licence de Club
							</label>
						</div>
						<div class="radio">
							<label for="document-1">
								<input type="radio" name="doc" id="doc-1" value="certificat">
								Certificat Médical
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Envoyer votre Attestation</label>
					<div class="col-md-4">
						<input id="zs_doc" name="zs_doc" class="input-file" type="file">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Parcours choisi</label>
					<div class="col-md-4">
						<select id="zl_parcours" name="zl_parcours" class="form-control">
							<option value="course1">9km</option>
							<option value="course2">5km</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="envoyer">Confirmer l'inscription</label>
					<div class="col-md-8">
						<input type="submit" name="envoyer" class="btn btn-success"></button>
					</div>
				</div>

			</fieldset>
		</form>

	</body>
</html>
