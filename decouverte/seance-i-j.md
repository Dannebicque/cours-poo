# Séance I-J

##

## Exercice

{% code title="seanceIJ.php" %}
```php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fichier de test de la séance I-J</title>
</head>
<body>
<h1>Fichier de test de la séance I-J</h1>
<?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});
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
<h2>Création d'une BD</h2>
<?php
$bd = new BandeDessinee('Lucky Luke : OK Corral', 48);
$bd->addAuteur($auteurRoman);
$bd->addDessinateur($dessinateur)

echo '#################################';
echo $bd->afficheLivre();
$bd->supprimerAuteur($auteurRoman);
echo '#################################';
echo $bd->afficheLivre();
$auteurBd = new Auteur('', 'Morris', '01/12/1923', 'morris.jpg');
$bd->addAuteur($auteurBd);
echo $bd->afficheLivre();
?>
</body>
</html>

```
{% endcode %}

## Quelques explications sur l'Autoloader

Vous constaterez que nous n'avons pas de "require" pour chacune des classes dans le fichier `seanceIJ.php`, pour autant vos classes seront accessibles. On utilise le mécanisme d'autoload de PHP qui permet d'éviter d'avoir des requires quand on utilise la POO. Cela s'avère très pratique quand nous avons beaucoup de classes à gérer.

```php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});
```

Le code ci-dessus assure le lien avec tous les fichiers nécessaires. En fait, à chaque fois que vous aller utiliser une classe (new Classe ou Classe::...), PHP, va essayer de trouver un fichier qui se nomme Classe.php et automatiquement en faire un require pour l'intégrer.

Contrainte de cette solution, vous devez avoir un fichier par classe, et votre fichier doit se nommer exactement comme votre classe. Mais nous avons vu en cours, que cette contrainte est en fait une bonne pratique.&#x20;

## Les classes

### Classe Abstraite Humain

Un Humain est un objet possédant un nom, un prénom et une date de naissance. Un Humain est capable de se présenter.

### Classe Artiste.

Un `Artiste` est un `Humain` qui possède une spécialité. Une spécialité est un champ texte. Un artiste possède également une image (vous pouvez récupérer ces images directement sur Wikipedia par exemple).

Nous considérerons dans un premier temps deux classes héritant d'`Artiste`: Un `Auteur` (spécialité écrire) et un `Dessinateur` (spécialité dessiner).

**Implémentez cette classe ainsi que les classes filles nécessaires.**

### Livre

### Classe Abstraire Livre

On va définir une classe abstraite `Livre` qui contiendra les propriétés _**protected**_ suivantes :

* `titre` : chaîne de caractères, on s'assurera que le titre est formaté avec une majuscule sur chaque mot.
* `nbPage` : entier.
* `auteurs` : tableau d'Auteurs. Un auteur est un Artiste dont la spécialité est d'écrire.

**Implémentez cette classe et les méthodes nécessaires**

### Classe enfant :  Roman et BandeDessinée

On définira deux classes enfants de cette classe Livre.

* Une classe `Roman` ne possède pas de spécificité.
* Une classe `BandeDessinee` qui possède en plus des auteurs une liste de dessinateurs

**Implémentez ces deux classes et les méthodes associés**

**Testez et implémentez les méthodes utilisées dans le fichier seanceIJ.php**
