<?php

	$id = $_POST['fname'];
	$nomCourse = $_POST['lname'];
	$date = $_POST['date'];
	$idAsso = $_POST['asso'];
	$infos = $_POST['age'];

	echo $id;
	echo $nomCourse;
	echo $infos;
	echo $date;


	include('../include/connect.php');
	$idc = connect();
	$sql="UPDATE course set nom_course = '$nomCourse', infos_course = '$infos' where id_course = $id;";
	$rs=pg_exec($idc,$sql);
	$sql2="UPDATE profite set id_asso = $idAsso, date_jour = '$date' where id_course = $id;";
	$rs=pg_exec($idc,$sql2);

?>
<script type="text/javascript">
	document.location.href='../affichage_course.php'
</script>
