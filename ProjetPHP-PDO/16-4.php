<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Lecture de la table article</title>
<style type="text/css" >
table {border-style: double; border-width: 3px; border-color: red; backgroundcolor: yellow;}
</style>
</head>
<body>
<?php
include("16-2.php"); 
if($idcom=connexpdo("magasin","myparam")) 
{
$requete="SELECT * FROM article ORDER BY categorie"; 
$result=$idcom->query($requete); 
if(!$result) 
{
$mes_erreur=$idcom->errorInfo();
echo "Lecture impossible, code", $idcom->errorCode(),$mes_erreur[2]; 
}
else 
{
$nbart=$result->rowCount(); 
echo "<h3>Tous nos articles par catégorie</h3>";
echo "<h4>Il y a $nbart articles en magasin</h4>"; 
echo "<table border=\"1\">";
echo "<tr><th>Code article</th> <th>Description</th> <th>Prix</th>
<th>Cat&#233;gorie</th></tr>";
while($ligne=$result->fetch(PDO::FETCH_NUM)) 
{
echo "<tr>";
foreach($ligne as $valeur) 
{
echo "<td> $valeur </td>";
}
echo "</tr>";
}
echo "</table>";
}
$result->closeCursor(); 
$idcom=null; 
}
?>
</body>
</html>