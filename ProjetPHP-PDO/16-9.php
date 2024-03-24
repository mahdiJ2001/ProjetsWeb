<?php
if(empty($_POST['code'])){header("Location:16-8.php");} 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Modifiez vos coordonnées</title>
</head>
<body>
<?php
include('16-2.php');
$idcom=connexpdo('magasin','myparam');
if(!isset($_POST['modif'])) 
{
$code=(integer)$_POST['code']; 
// Requête SQL
$requete="SELECT * FROM client WHERE id_client='$code' "; 
$result=$idcom->query($requete);
$coord=$result->fetch(PDO::FETCH_NUM); 
// Création du formulaire complété avec les données existantes ←
echo "<form action= \"". $_SERVER['PHP_SELF']."\" method=\"post\"enctype=
\"application/x-www-form-urlencoded\">";
echo "<fieldset>";
echo "<legend><b>Modifiez vos coordonnées</b></legend>";
echo "<table>";
echo "<tr><td>Nom : </td><td><input type=\"text\" name=\"nom\" size=\"40\"
maxlength=\"30\" value=\"$coord[1]\"/> </td></tr>";
echo "<tr><td>Prénom : </td><td><input type=\"text\" name=\"prenom\" size=\"40\"
maxlength=\"30\" value=\"$coord[2]\"/></td></tr>";
echo "<tr><td>Adresse : </td><td><input type=\"text\" name=\"adresse\" size=\"40\"
maxlength=\"60\" value=\"$coord[3]\"/></td></tr>";
echo "<tr><td>E-mail : </td><td><input type=\"text\" name=\"mail\" size=\"40\"
maxlength=\"50\" value=\"$coord[4]\"/></td></tr>";
echo "<tr><td><input type=\"reset\" value=\"Effacer\"></td> <td><input type=
\"submit\" name=\"modif\" value=\"Enregistrer\"></td></tr></table>";
echo "</fieldset>";
echo "<input type=\"hidden\" name=\"code\" value=\"$code\"/>"; 
echo "</form>";
$result->closeCursor();
$idcom=null;
}
elseif(isset($_POST['nom'])&& isset($_POST['adresse'])) 
{
// ENREGISTREMENT
$nom=$idcom->quote($_POST['nom']);
$prenom=$idcom->quote($_POST['prenom']);
$adresse=$idcom->quote($_POST['adresse']);
$mail=$idcom->quote($_POST['mail']);
$code=(integer)$_POST['code'];
// Requête SQL
$requete="UPDATE client SET nom=$nom,prenom=$prenom,adresse=$adresse,mail=
$mail WHERE id_client=$code"; 
$result=$idcom->exec($requete);
if($result!=1) 
{
echo "<script type=\"text/javascript\">
alert('Erreur : ".$idcom->errorCode()."')</script>"; 
}
else
{
echo "<script type=\"text/javascript\"> alert('Vos modifications sont
enregistrées');window.location='16-8.php';</script>"; 
}
$idcom=null;
}
else
{
echo "Modifiez vos coordonnées !";
}
?>
</body>
</html>