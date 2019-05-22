<?php

	$id = $_POST['selectTrace'];

include('../include/connect.php');
        $idc = connect();
        $sql="UPDATE parcours set id_parcours_carte = $id where id_p = 7;";
        $rs=pg_exec($idc,$sql);

?>
<script type="text/javascript">
	//alert("Parcours modifié");
	document.location.href='../gestion_parcours.php'
</script>
