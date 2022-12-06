# TD Révision



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
require 'Livre.php';
require 'Roman.php';
?>

<h2>Création de quelques auteurs</h2>
<?php
$artiste = new Artiste('Mozart', 'Wolfgang Amadeus', '27/01/1756', 'Compositeur', 'mozart.jpg');
echo $artiste->sePresente();
$auteur = new Auteur('Corbeyran', 'Eric', '14/12/1964', 'corbeyran.jpg');
$auteurRoman = new Auteur('Conan Doyle', 'Arthur', '22/05/1859', 'doyle.jpg');
echo '#################################';
echo $auteur->sePresente();
echo '#################################';
echo $auteurRoman->sePresente()
?>
<h2>Création de livres</h2>
<?php
$livre = new Roman('L\'étude en Rouge', 136);
$livre->addAuteur($auteurRoman);

echo '#################################';
echo $livre->afficheLivre();
$livre->supprimerAuteur($auteurRoman);
echo '#################################';
echo $livre->afficheLivre();

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

#### Classe enfant :  Roman

On définira deux classes enfants de cette classe Livre.

* Une classe `Roman` ne possède pas de spécificité.

**Implémentez ces deux classes et les méthodes associés**

**Testez et implémentez les méthodes utilisées dans le fichier seance9.php**
