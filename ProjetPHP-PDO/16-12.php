<?php
include('16-2.php');
$idcom=connexpdo('magasin','myparam');
$idcom->beginTransaction(); 
if($idcom->inTransaction()){echo "Début transaction";} 
echo "<hr />";
$requete1="INSERT INTO client(id_client,nom,prenom,age,adresse,mail) VALUES
(NULL , 'Spencer', 'Marc', 'rue du blues',
'marc@spencer.be');"; 
echo $requete1,"<hr />";
$requete2="INSERT INTO client(id_client,nom,prenom,age,adresse,ville,mail) VALUES
(NULL ,
'Spancer', 'Diss','Metad Street', 'diss@metad.fr');"; 
echo $requete2,"<hr />";
// Insertions des données
$verif= $idcom->exec($requete1); 
$verif+= $idcom->exec($requete2); 
if($verif==2 ) 
{
$idcom->commit(); 
echo "Insertions réussies de $verif lignes<br />";
}
else
{
$idcom->rollBack();
$tab_erreur=$idcom->errorInfo();
echo "Insertions annulées. Erreur n° :",$tab_erreur[0],"<br />";
echo "Info : ",$tab_erreur[2];
}
?>