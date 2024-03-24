<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Insertion et lecture de la table client</title>
</head>
<body>
<?php
include_once("16-2.php"); 
$idcom=connexpdo("magasin","myparam"); 
// Requête sans résultats
$requete1="UPDATE client SET nom='salah' WHERE id_client=7"; 
$nb=$idcom->exec($requete1); 
echo "<p>$nb ligne(s) modifiée(s)<hr /></p>"; 
// Requête avec résultats
$requete2="SELECT * FROM client ORDER BY nom"; 
$result=$idcom->query($requete2); 
if(!$result) 
{
$mes_erreur=$idcom->errorInfo();
echo "Lecture impossible, code", $idcom->errorCode(),$mes_erreur[2];
}
else 
{
while ($row = $result->fetch(PDO::FETCH_NUM))
{
foreach($row as $donn)
{
echo $donn,"&nbsp;";
}
echo "<hr />";
}
$result->closeCursor(); 
}
$idcom=null;
?>
</body>
</html>
