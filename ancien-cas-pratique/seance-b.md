# Séance B : Génération de formulaire en POO

{% hint style="info" %}
### Notation

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations
{% endhint %}

## Sujet

Dans cette séance, nous allons voir comment utiliser la POO pour générer des formulaires rapidement, sans devoir écrire tout le code HTML.

Dans cette séance, nous allons tout définir dans une seule classeL En général les frmaeworks définissent une classe par type de champs et un formulaire est composé de plusieurs objets de type champs. Vous pouvez par exemple consulter la document de symfony qui gérer les formulaires de cette manière [Documentation Symfony](https://symfony.com/doc/current/reference/forms/types.html). Cette seconde solution est plus souple et permet de construire le formulaire sans se soucier de sa mise en page et de l'ordre des champs.

**Dans notre cas on supposera que les champs sont construits dans l'ordre**

Cette solution présente plusieurs avantages

* réutilisabilité du code dans différents projets
* Rapiditié de modification du style (le HTML est centralisé dans un unique fichier)

### A disposition

Pour cette séance, vous avez à votre disposition :

* Un fichier contenant les interfaces que vous devez respecter. Ce fichier sera à inclure dans vos différentes classes.

{% hint style="danger" %}
**Vous devez faire valider le bon fonctionnement de seance10.php en fin de séance**
{% endhint %}

### Classe formulaire : Description des méthodes

{% code title="iFormulaire.php" %}
```php
<?php
interface iFormulaire {
    public function __construct($action, $method, $nom, $class = '');
    public function ajoutChampSimple($label, $type, $nom, $id = '', $class = '');
    public function ajoutChampSelect($label, $nom, $data, $id = '', $class = '');
    public function ajoutChampChoix($label, $type, $nom, $data, $id = '', $class = '');
    public function ajoutBoutonSubmit($label, $nom='', $id='',$class='');
    public function genereFormulaireHTML();
}
```
{% endcode %}

* Un fichier seance10.php qui vous permettra de tester le fonctionnement de vos classes.

{% code title="seance10.php" %}
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seance 10 - Génération de formulaires</title>
</head>
<body>
<?php
include('iFormulaire.php');
include('Formulaire.php');
echo '<h1>Un premier formulaire</h1>';
$form1 = new Formulaire('traitement1.php', 'post', 'form1');
$form1->ajoutChampSimple('Nom', 'text', 'nom');
$form1->ajoutChampSimple('Prénom', 'text', 'prenom');
$form1->ajoutChampChoix('Sexe', 'radio', 'sexe', array('H' => 'Homme', 'F' => 'Femme'));
$form1->ajoutChampSelect('Ville', 'ville', array(1 => 'Troyes', 2 => 'Dijon', 3 => 'Lille'));
$form1->ajoutBoutonSubmit('Valider');
echo $form1->genereFormulaireHTML();
echo '<h1>Un deuxième formulaire</h1>';
$form2 = new Formulaire('traitement2.php', 'get', 'form2');
$form2->ajoutChampSimple('Login', 'email', 'login', 'login', 'form-control');
$form2->ajoutChampSimple('Mot de passe', 'password', 'password');
$form2->ajoutBoutonSubmit('Se connecter');
echo $form2->genereFormulaireHTML();
echo '<h1>Un troisième formulaire</h1>';
$form3 = new Formulaire('traitement3.php', 'post', 'form3');
$form3->ajoutChampSimple('Nom', 'text', 'nom');
$form3->ajoutChampSimple('Prénom', 'text', 'prenom');
$form3->ajoutChampDate('Date de naissance', 'datenaissance');
$form3->ajoutBoutonSubmit('Enregistrer');
echo $form3->genereFormulaireHTML();
?>
</body>
</html>
```
{% endcode %}

A vous d'identifier les propriétés nécessaires dans cette classe. Seul le fonctionnement des méthodes est présenté ici. Vous disposez de l'interface pour obtenir leur signature à implémenter.

Ci-dessus les trois fichiers de traitement pour tester vos formulaires.

{% code title="traitement1.php" %}
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fichier de traitement de la séance 10</title>
</head>
<body>
<h1>Fichier "traitement1.php" du premier formulaire de la séance 10</h1>
<h2>Affichage des données saisies dans le formulaire</h2>
<ul>
<?php
echo '<li> Nom : '.$_POST['nom'].'</li>';
echo '<li> Prénom : '.$_POST['prenom'].'</li>';

if ($_POST['sexe'] === 'H') { $sexe = 'Homme'; }
else {$sexe = 'Femme';}

echo '<li> Sexe : '.$sexe.'</li>';
$villes = array(1 => 'Troyes', 2 => 'Dijon', 3 => 'Lille');
echo '<li> Ville : '.$villes[$_POST['ville']].'</li>';
?>
</ul>
</body>
</html>
```
{% endcode %}

{% code title="traitement2.php" %}
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fichier de traitement de la séance 10</title>
</head>
<body>
<h1>Fichier "traitement2.php" du deuxième formulaire de la séance 10</h1>
<h2>Affichage des données saisies dans le formulaire</h2>
<ul>
<?php
echo '<li> Login : '.$_GET['login'].'</li>';
echo '<li> Password : '.$_GET['password'].'</li>';
?>
</ul>
</body>
</html>
```
{% endcode %}

{% code title="traitement3.php" %}
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fichier de traitement de la séance 10</title>
</head>
<body>
<h1>Fichier "traitement3.php" du troisième formulaire de la séance 10</h1>
<h2>Affichage des données saisies dans le formulaire</h2>
<ul>
<?php
echo '<li> Nom : '.$_POST['nom'].'</li>';
echo '<li> Prénom : '.$_POST['prenom'].'</li>';
echo '<li> Date de naissance : '.$_POST['datenaissance_jour'].'/'.$_POST['datenaissance_mois'].'/'.$_POST['datenaissance_annee'].'</li>';
?>
</ul>
</body>
</html>
```
{% endcode %}

#### Constructeur

Doit permettre de définir la balise form d'un formulaire en initialisant l'action, la méthode et le nom du formulaire. De manière **optionnelle** on peut définir la classe de style.

#### ajoutChampSimple

Doit permettre de créer les champs _input_ simple (text, password, email, number, ...). Cette méthode doit prendre les paramètres permettant d'écrire un input avec son label associé. Le libellé, le type et le nom du champ sont des champs obligatoires. L'id s'il et vide sera égal au nom. De manière **optionnelle** on peut définir la classe de style.

#### ajoutChampSelect

Doit permettre de créer les champs _select_. Cette méthode doit prendre les paramètres permettant d'écrire un select avec son label associé. Le libellé et le nom du champ sont des champs obligatoires. L'id s'il et vide sera égal au nom. De manière **optionnelle** on peut définir la classe de style. On devra également ajouter un champ obligatoire permettant d'obtenir les valeurs du select pour générer les différentes _option_ de notre select.

#### ajoutChampChoix

Doit permettre de créer les champs _input_ de type _radio_ ou _checkbox_. Cette méthode doit prendre les paramètres permettant d'écrire un input avec son label associé. Le libellé, le type (radio ou checkbox) et le nom du champ sont des champs obligatoires. L'id s'il et vide sera égal au nom. De manière **optionnelle** on peut définir la classe de style. On devra également ajouter un champ obligatoire permettant d'obtenir les valeurs de l'input pour générer les différentes valeurs.

#### genereFormulaireHTML

Cette méthode retournera le code HTML généré pour pouvoir afficher le formulaire dans la page.

#### Toutes les autres méthodes présentent dans l'interface ou dans le fichier de test.

### Bonus

Utiliser un framework CSS (Bootstrap, semanticUI, ...) pour la mise en page de vos formulaire.

{% hint style="info" %}
Vous pouvez également créer toutes les méthodes privées qui pourraient vous faciliter la vie...
{% endhint %}
