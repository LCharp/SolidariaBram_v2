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
	<table cellspacing="0" cellpadding="0" border="0" width="1000px" height="800px" align="center">
				<tr align="center" valign="center" >
					<td valign="center"  rowspan="2" width="800px" height="400px" ><img alt="pas le bon chemin" src="images/affiche_course.jpg" align="center" width="600px" height="780px" >
					</td>
					<td  align="justify" valign="center" width="200px" height="200px"> <p>Nous avons récolté 5000 euros depuis la 1ère édition!!</br> Merci à tous!! </p>
					</td>
				</tr>
				<tr>
					<td valign="center" width="20%"  >
					</td>
				</tr>
			</table>
			<table border="1" width="80%" align="center">
				<tr align="center" valign="center">
					<td style="width:100%"> <p>Bienvenue dans cette nouvelle édition de Solidària Bram! </br> Nous sommes heureux de vous compter parmis nous.</br> Votre participation permet de financer différentes aides apportées aux enfants démunis. L'association bram solidaire s'occupe de redistribuer l'argent à bon escient. Toutes les actions de l'association sont consultables sur sa page visible en suivant ce lien:</p>
					</td>
				</tr>
			</table>
</body>
</html>
