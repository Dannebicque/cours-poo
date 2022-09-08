<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="assets/styles.css">
  <title>Séance 8</title>
</head>
<body>
<?php
require 'iPersonnage.php';
require 'Personnage.php';
require 'Elfe.php';
require 'Gobelin.php';
require 'Humain.php';
require 'Attribut.php';
require 'Arme.php';
require 'Magie.php';
require 'Protection.php';
require 'Affichage.php';


$perso1 = new Gobelin();
$perso1->place(2, 3);
Affichage::addPersonnage($perso1);

$perso2 = new Elfe();
$perso2->place(5, 6);
Affichage::addPersonnage($perso2);

$perso3 = new Humain();
$perso3->place(6, 7);
Affichage::addPersonnage($perso3);

$perso4 = new Humain();
$perso4->place(1, 2);
Affichage::addPersonnage($perso4);
Affichage::affichePlateau();

//Ajout des attributs

$att1 = new Arme('Epée', 10);
$att2 = new Arme('Hache', 15);
$att3 = new Arme('Massue', 20);

$att4 = new Protection('Bouclier', 10);
$att5 = new Magie('Invisibilité', 15, 15);
$att6 = new Magie('Feu', 0,30);

$perso1->addAttribut($att2);
$perso1->addAttribut($att3);

$perso3->addAttribut($att1);
$perso3->addAttribut($att4);

$perso2->addAttribut($att5);
$perso2->addAttribut($att6);

echo $perso1->afficherAttributs();
echo $perso2->afficherAttributs();
echo $perso3->afficherAttributs();
?>
</body>
</html>
