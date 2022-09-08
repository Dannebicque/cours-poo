<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TD5 - Génération de formulaires</title>
</head>
<body>
<?php
include('interfacetd5.php');
include('Formulaire.php');

echo '<h1>Un premier formulaire</h1>';
$form1 = new Formulaire('traitement.php', 'post', 'form1');
$form1->ajoutChampSimple('Nom', 'text', 'nom');
$form1->ajoutChampSimple('Prénom', 'text', 'prenom');
$form1->ajoutChampChoix('Sexe', 'radio', 'sexe', array('H' => 'Homme', 'F' => 'Femme'));
$form1->ajoutChampSelect('Ville', 'ville', array(1 => 'Troyes', 2 => 'Dijon', 3 => 'Lille'));
$form1->ajoutBoutonSubmit('Valider');
echo $form1->genereFormulaireHTML();
echo '<h1>Un deuxième formulaire</h1>';

$form2 = new Formulaire('ajout.php', 'get', 'form2');
$form2->ajoutChampSimple('Login', 'email', 'login', 'login', 'form-control');
$form2->ajoutChampSimple('Mot de passe', 'password', 'password');
$form2->ajoutBoutonSubmit('Se connecter');
echo $form2->genereFormulaireHTML();

echo '<h1>Un troisième formulaire</h1>';
$form3 = new Formulaire('traitement-3.php', 'post', 'form3');
$form3->ajoutChampSimple('Nom', 'text', 'nom');
$form3->ajoutChampSimple('Prénom', 'text', 'prenom');
$form3->ajoutChampDate('Date de naissance', 'datenaissance');

$form3->ajoutBoutonSubmit('Enregistrer');
echo $form3->genereFormulaireHTML();
?>
</body>
</html>
