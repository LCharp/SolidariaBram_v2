<head>
		<meta charset="UTF-8"/>
		<title>HTML</title>
		<meta name="author" content="anais.grignon" />
		<!-- Date: 2018-10-22 -->
</head>

<body>
<?php
    include('include/connect.php');
 $idc=connect();

 $civ=$_POST['zl_civ'];
 echo $civ;
 $nom=$_POST['zs_nom'];
 echo $nom;
 $prenom=$_POST['zs_prenom'];
 echo $prenom;
 $datnais=$_POST['zs_dtn'];
 echo $datnais;
 $adresse=$_POST['zs_adresse'];
 echo $adresse;
 $cp=$_POST['zs_cp'];
 echo $cp;
 $ville=$_POST['zs_ville'];
 echo $ville;
 $tel=$_POST['zs_tel'];
 echo $tel;
 $mail=$_POST['zs_mail'];
 echo $mail;
 $pass=$_POST['zs_pass'];
 echo $pass;

 $sql='insert into individu (nom_p,prenom_p,adresse_p,ville_p,cp_p,civilité_p,date_naissance_p,mail_p,tel_p,
 organisateur,mdp_p) values (\''.$civ.'\',\''.$nom.'\',\''.$prenom.'\',\''.$datnais.'\',\''.$adresse.'\',\''.$cp.'\',\''.$ville.'\',\''.$tel.'\',\''.$mail.'\',\''.$pass.'\') ';
 $rs=pg_exec($idc, $sql);

 $type_doc=$_POST['value'];
 echo $type_doc;
 $file=$_FILES['zs_doc']['name'];
 echo $file;
 $parcours=$_POST['zl_parcours'];
 echo $parcours;
 $paiement=$_POST['cot'];
 echo $paiement;



 $sql='insert into inscrit (certificat_medical,licence_p,paiement,document_med,id_p) values (\''.$type_doc.'\',\''.$file.'\',\''.$parcours.'\',\''.$paiement.'\') ';
 $rs=pg_exec($idc, $sql);

?>
</body>
