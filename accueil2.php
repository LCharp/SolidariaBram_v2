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

		<div class="jumbotron" style="height: 60%; width: 40%; margin-left: 10%; float: left; background:transparent !important;">
			<td valign="center"><img alt="affiche de la course" src="images/affiche_course.jpg" align="center" width="600px" height="780px" >
		</div>

		      <div class="row marketing">
		        <div class="col-lg-6">
		          <h3>Bienvenue dans cette nouvelle édition de Solidària Bram! </h3>
		          <p></br> Nous sommes heureux de vous compter parmis nous.</br> Votre participation permet de financer différentes aides apportées aux enfants démunis. L'association bram solidaire s'occupe de redistribuer l'argent à bon escient. Toutes les actions de l'association sont consultables sur sa page visible en suivant ce lien:</p></p>
		        </div>

		        <div class="col-lg-6">
		          <h4>Merci à tous!!</h4>
		          <p>Nous avons récolté 5000 euros depuis la 1ère édition!!</p>
		        </div>
		      </div>

</body>
</html>
