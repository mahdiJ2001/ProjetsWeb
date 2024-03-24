<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Lecture de la table article</title>
<style type="text/css" >
table {border-style: double;border-width: 3px; border-color: red;
background-color: yellow;}
</style>
</head>
<body>
<?php
include("16-2.php");
$idcom=connexpdo("magazin","myparam");
//************************************
$requete="SELECT id_article AS 'Code article',designation AS 'Désignation',prix
AS 'Prix unitaire',categorie AS 'Catégorie' FROM article WHERE designation
LIKE '%Sony%' ORDER BY categorie"; 
$result=$idcom->query($requete); 
if(!$result)
{
$mes_erreur=$idcom->errorInfo();
echo "Lecture impossible, code : ", $idcom->errorCode(),"<br />",$mes_erreur[2];
}
else
{
$nbart=$result->rowCount(); 
$tabresult=$result->fetchAll(PDO::FETCH_ASSOC); 
// Récupération des noms des colonnes ou des alias
$titres=array_keys($tabresult[0]); 
// Affichage des titres de la page
echo "<h3> Tous nos articles de la marque Sony</h3>";
echo "<h4> Il y a $nbart articles en magasin </h4>";
echo "<table border=\"1\"> <tr>";
// Affichage des titres du tableau
foreach($titres as $nomcol) 
{
echo "<th>", htmlentities($nomcol) ,"</th>";
}
echo "</tr>";
// Affichage des lignes de données
for($i=0;$i<$nbart;$i++) 
{
echo "<tr>";
foreach($tabresult[$i] as $valeur) 
{
echo "<td> $valeur </td>";
}
echo "</tr>";
}
echo "</table>";
}
$result->closeCursor();
$idcom=null;
?>
</body>s
</html>
