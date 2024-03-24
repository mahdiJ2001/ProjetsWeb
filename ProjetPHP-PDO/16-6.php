<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Lecture de la table client</title>
<style type="text/css" >
table {border-style: double; border-width: 3px; border-color: red; background-color:
yellow;}
</style>
</head>
<body>
<?php
include("16-2.php");
$idcom=connexpdo("magazin","myparam");
$requete="SELECT id_client AS 'Code_client',nom,prenom,adresse,age,mail FROM client
WHERE ville ='Paris' ORDER BY nom"; 
$result=$idcom->query($requete);
if(!$result)
{
$mes_erreur=$idcom->errorInfo();
echo "Lecture impossible, code", $idcom->errorCode(),$mes_erreur[2];
}
else
{
$nbart=$result->rowCount();
$ligne=$result->fetchObject(); 
echo "<h3>Il y a $nbart clients habitant Paris</h3>";
// Affichage des titres du tableau
echo "<table border=\"1\"> <tr>";
foreach($ligne as $nomcol=>$val) 
{
echo "<th>", $nomcol ,"</th>";
}
echo "</tr>";
// Affichage des valeurs du tableau
echo "<tr>";
// Il faut utiliser do while car sinon on perd la première ligne de données
do
{
echo"<td>", $ligne->Code_client,"</td>", "<td>", $ligne->nom,"</td>","<td>",
$ligne->prenom,"</td>","<td>", $ligne->adresse,"</td>","<td>", $ligne->age,
"</td>","<td>", $ligne->mail,"</td></tr>"; 
}
while ($ligne = $result->fetchObject()) ; 
echo "</table>";
$result->closeCursor();
$idcom=null;
}
?>
</body>
</html>