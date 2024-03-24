<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Saisissez vos coordonnées</title>
</head>
<body>
<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post"
enctype="application/x-www-form-urlencoded">
<fieldset>
<legend><b>Vos coordonnées</b></legend>
<table>
<tr><td>Nom : </td><td><input type="text" name="nom" size="40" maxlength="30"/>
</td></tr>
<tr><td>Prénom : </td><td><input type="text" name="prenom" size="40" maxlength="30"
/></td></tr>
<tr><td>Adresse : </td><td><input type="text" name="adresse" size="40"
maxlength="60"/></td></tr>
<tr><td>E-mail : </td><td><input type="text" name="mail" size="40" maxlength="50"
/></td></tr>
<tr>
<td><input type="reset" value="Effacer"></td>
<td><input type="submit" value="Envoyer"></td>
</tr>
</table>
</fieldset>
</form>
<?php
include("16-2.php");
$idcom=connexpdo('magasin','myparam');
if(!empty($_POST['nom'])&& !empty($_POST['adresse'])) 
{
$id_client=NULL; 
$nom=$idcom->quote($_POST['nom']); 
$prenom=$idcom->quote($_POST['prenom']); 
$adresse=$idcom->quote($_POST['adresse']); 
$mail=$idcom->quote($_POST['mail']); 
// Requête SQL
$requete="INSERT INTO client(id_client, nom, prenom, adresse, mail) 
VALUES(NULL,$nom,$prenom,$adresse,$mail)"; 
$nblignes=$idcom->exec($requete); 
if($nblignes!=1) 
{
$mess_erreur=$idcom->errorInfo();
echo "Insertion impossible, code", $idcom->errorCode(),$mess_erreur[2];
echo "<script type=\"text/javascript\">
alert('Erreur : ".$idcom->errorCode()."')</script>";
}
else
{
echo "<script type=\"text/javascript\">
alert('Vous êtes enregistré. Votre numéro de client est :
". $idcom->lastInsertId()."')</script>"; 
$idcom=null;
}
}
else {echo "<h3>Formulaire à compléter !</h3>";}
?>
</body>
</html>
