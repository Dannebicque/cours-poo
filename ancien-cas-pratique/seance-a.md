# Séance A : Structure de base

Les séances qui vont suivre ont un lien entre elles. L'objectif est d'aboutir à une petite application permettant de gérer une collection de livre, et d'obtenir une sauvegarde dans une base de données (description complète ici : [Description générale](description-generale.md)).

{% hint style="info" %}
### Notation

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations
{% endhint %}

## Sujet

Ce premier TP consiste à construire les classes qui vont manipuler les livres et les auteurs de ces livres.

On souhaite disposer d'une structure suffisamment générique afin d'intégrer tous les types de livre et de gérer les auteurs et leur implication dans un ouvrage.

**On va écrire chaque classe dans un fichier séparé. Ce fichier portera le nom de la classe.**

### A disposition

Pour ce premier TP, vous avez à votre disposition :

* Un fichier contenant les interfaces que vous devez respecter. Ce fichier sera à inclure dans vos différentes classes.

{% hint style="danger" %}
**Vous devez faire valider le bon fonctionnement de seance9.php en fin de séance**
{% endhint %}

### Classe Abstraite Humain et Classe Artiste

{% code title="interfaces.php" %}
```php
<?php

interface iSql{
}
interface iHumain {
    public function sePresente();
}
interface iLivre {
    public function __construct($titre, $nbPage);
    public function addAuteur($auteur);
    public function afficheLivre();
}
interface iBD {
    public function addDessinateur($artistes);
}

```
{% endcode %}

* Un fichier seance9.php qui vous permettra de tester le fonctionnement de vos classes.

{% code title="seance9.php" %}
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fichier de test de la séance 9</title>
</head>
<body>
<h1>Fichier de test du TP5</h1>
<?php
require 'interfaces.php';
require 'Humain.php';
require 'Artiste.php';
require 'Auteur.php';
require 'Dessinateur.php';
require 'Livre.php';
require 'BandeDessinees.php';
require 'Roman.php';
?>

<h2>Création de quelques auteurs</h2>
<?php
$artiste = new Artiste('Mozart', 'Wolfgang Amadeus', '27/01/1756', 'Compositeur', 'mozart.jpg');
echo $artiste->sePresente();
$auteur = new Auteur('Corbeyran', 'Eric', '14/12/1964', 'corbeyran.jpg');
$dessinateur = new Dessinateur('Guérineau', 'Richard', '18/11/1969', 'guerineau.jpg');
$auteurRoman = new Auteur('Conan Doyle', 'Arthur', '22/05/1859', 'doyle.jpg');
echo '#################################';
echo $auteur->sePresente();
echo '#################################';
echo $dessinateur->sePresente();
echo '#################################';
echo $auteurRoman->sePresente()
?>
<h2>Création de livres</h2>
<?php
$bd = new BandeDessinees('Le chant des Stryges', 48);
$bd->addAuteur($auteur);
$bd->addAuteur($auteurRoman);
$bd->addDessinateur($dessinateur);
echo '#################################';
echo $bd->afficheLivre();
$bd->supprimerAuteur($auteurRoman);
echo '#################################';
echo $bd->afficheLivre();
$roman = new Roman('L\'étude en rouge', 136);
$roman->addAuteur($auteurRoman);
echo '#################################';
echo $roman->afficheLivre();
?>
</body>
</html>

```
{% endcode %}

#### Classe Abstraite Humain

Un Humain est un objet possédant un nom, un prénom et une date de naissance. Un Humain est capable de se présenter.

**Implémentez cette classe en respectant l'interface donnée.**

#### Classe Artiste.

Un `Artiste` est un `Humain` qui possède une spécialité. Une spécialité est un champ texte. Un artiste possède également une image (vous pouvez récupérer ces images directement sur Wikipedia par exemple).

Nous considérerons dans un premier temps deux classes héritant d'`Artiste`: Un `Auteur` (spécialité écrire) et un `Dessinateur` (spécialité dessiner).

**Implémentez cette classe ainsi que les classes filles nécessaires.**

### Livre

#### Classe Abstraire Livre

On va définir une classe abstraite `Livre` qui contiendra les propriétés _**protected**_ suivantes :

* `titre` : chaîne de caractères, on s'assurera que le titre est formaté avec une majuscule sur chaque mot.
* `nbPage` : entier.
* `auteurs` : tableau d'Auteurs. Un auteur est un Artiste dont la spécialité est d'écrire.

**Implémentez cette classe et les méthodes nécessaires et décrites dans l'interface**

#### Classes enfants : BandeDessinnees et Roman

On définira deux classes enfants de cette classe Livre.

* Une classe `BandeDessinnees`, qui contiendra un tableau de Dessinateurs.
* Une classe `Roman` ne possède pas de spécificité.

**Implémentez ces deux classes et les méthodes associés**

**Testez et implémentez les méthodes utilisées dans le fichier seance9.php**
