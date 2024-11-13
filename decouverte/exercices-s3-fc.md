# Exercices S3 - FC

## **Sujet de Projet : Combat des Créatures**

**Objectif** : Implémenter un mini-jeu où des créatures s’affrontent en utilisant les concepts de programmation orientée objet (POO) en PHP.

### **Contexte**

Dans ce jeu, chaque créature a des caractéristiques (force, santé, défense) et des compétences spécifiques.

Votre mission est d’écrire les classes nécessaires pour permettre :

1. La création de différents types de créatures.
2. L’attaque entre les créatures.

Un fichier de test (jeu1.php) vous est fourni pour valider votre implémentation.

## Première partie

### **Étape 1 : Classe `Creature`**

Créez une classe `Creature` représentant une créature générique. Cette classe doit :

* Être **abstraite**.
* Avoir les attributs :
  * `nom` (chaîne de caractères) : Le nom de la créature.
  * `sante` (entier) : Les points de santé de la créature.
  * `force` (entier) : La puissance des attaques de la créature.
  * `defense` (entier) : La capacité de la créature à réduire les dégâts reçus.
* Avoir les méthodes :
  * `attaquer(Creature $adversaire)` : Inflige des dégâts à l'adversaire. Les dégâts sont calculés comme `force - défense` (minimum 0).
  * `recevoirDegats(int $degats)` : Réduit les points de santé en fonction des dégâts reçus.
  * `estEnVie()` : Retourne `true` si les points de santé sont supérieurs à 0, sinon `false`.
  * `crier()` (abstraite) : Retourne une phrase propre à chaque créature.

***

### **Étape 2 : Créatures Spécifiques**

Créez les classes suivantes qui héritent de `Creature` :

1. **Guerrier**
   * Santé : 150.
   * Force : 20.
   * Défense : 10.
   * Cri : "Pour la gloire !"
2. **Mage**
   * Santé : 100.
   * Force : 30.
   * Défense : 5.
   * Modifiez la méthode `attaquer` pour infliger des dégâts supplémentaires (+10).
   * Cri : "Abracadabra !"
3. **Archer**
   * Santé : 120.
   * Force : 15.
   * Défense : 8.
   * Ajoutez une capacité d’**esquive** (30 % de chances de ne pas recevoir de dégâts).
   * Cri : "Prêt à viser !"

### Etape 3 : Création de l'Arène

L'Arène est une classe qui contient une méthode lancerCombat, qui va prendre deux créatures (quelque soit leur type) et déclencher un combat

* lancerCombat(Creature $c1, Creature $c2)

La créature c1, si elle est en vie, commence le combat, puis c2, si elle est en vie continue le combat. Le combat s'arrête lorsque l'une des deux créatures n'est plus en vie.

### Le fichier de test

{% code title="jeu1.php" %}
```php
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

echo "<h2>=== Création des Créatures ===</h2>";
$guerrier = new Guerrier("Thor");
$mage = new Mage("Merlin");
$archer = new Archer("Robin");

echo $guerrier->crier() . "\n";
echo $mage->crier() . "\n";
echo $archer->crier() . "\n";

echo "<h2>=== Premier Combat ===</h2>";
$arene = new Arene();
$arene->lancerCombat($guerrier, $mage);

echo "<h2>=== Deuxième combat ===</h2>";
$guerrier2 = new Guerrier("Gimli");
$arene2 = new Arene();
$arene2->lancerCombat($guerrier2, $archer);

?>
</body>
</html>
```
{% endcode %}

### Quelques explications sur l'Autoloader

Vous constaterez que nous n'avons pas de "require" pour chacune des classes dans le fichier `seanceIJ.php`, pour autant vos classes seront accessibles. On utilise le mécanisme d'autoload de PHP qui permet d'éviter d'avoir des requires quand on utilise la POO. Cela s'avère très pratique quand nous avons beaucoup de classes à gérer.

```php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});
```

Le code ci-dessus assure le lien avec tous les fichiers nécessaires. En fait, à chaque fois que vous aller utiliser une classe (new Classe ou Classe::...), PHP, va essayer de trouver un fichier qui se nomme Classe.php et automatiquement en faire un require pour l'intégrer.

Contrainte de cette solution, vous devez avoir un fichier par classe, et votre fichier doit se nommer exactement comme votre classe. Mais nous avons vu en cours, que cette contrainte est en fait une bonne pratique.&#x20;

## Deuxième partie

Dans cette deuxième partie nous allons gérer un plateau permettant de positionner les Créatures et de déterminer lesquelles doivent s'affronter.

### **Étape 1 : Classe `Coordonnee`**

Créez une classe `Coordonnee` pour représenter les positions des créatures sur le plateau.

* Attributs :
  * `x` (entier) : La position horizontale (colonne).
  * `y` (entier) : La position verticale (ligne).
* Méthodes :
  * `getX()` et `getY()` : Retourne la valeur de `x` ou `y`.
  * `setX(int $x)` et `setY(int $y)` : Définit une nouvelle valeur pour `x` ou `y`.
  * `estAdjacente(Coordonnee $autre)` : Vérifie si la position actuelle est adjacente à une autre coordonnée (cases voisines).
  * `__toString()` : Retourne les coordonnées sous forme de chaîne, par exemple `(2, 3)`.

### **Étape 2 : Classe `Plateau`**

Créez une classe `Plateau` pour gérer la disposition des créatures sur une grille.

* Attributs :
  * `largeur` (entier) : Le nombre de colonnes.
  * `hauteur` (entier) : Le nombre de lignes.
  * `cases` (tableau bidimensionnel) : Contient les créatures positionnées sur le plateau ou `null` si la case est vide.
* Méthodes :
  * `__construct(int $largeur, int $hauteur)` : Initialise le plateau vide.
  * `placerCreature(Creature $creature, Coordonnee $position)` : Place une créature à une position donnée
  * `deplacerCreature(Creature $creature, Coordonnee $nouvellePosition)` : Déplace une créature d'une position à une autre.
  * `estCaseLibre(Coordonnee $position)` : Retourne `true` si la case est libre, sinon `false`.

### **Étape 3 : Intégration dans la Classe `Creature`**

Ajoutez un attribut `position` (instance de `Coordonnee`) dans la classe `Creature`.

* Méthodes :
  * `setPosition(Coordonnee $position)` : Définit la position de la créature.
  * `getPosition()` : Retourne la position actuelle de la créature.

### **Étape 4 : Classe `Affichage` (Fourni)**

Une classe `Affichage` vous est donnée pour représenter visuellement le plateau.

{% code title="Affichage.php" %}
```php
<?php

abstract class Affichage {
    public static function afficherPlateau(Plateau $plateau): void {
        echo "<style>
                table { border-collapse: collapse; }
                td { width: 50px; height: 50px; text-align: center; border: 1px solid #000; }
              </style>";
        echo "<table>";
        for ($y = 0; $y < $plateau->getHauteur(); $y++) {
            echo "<tr>";
            for ($x = 0; $x < $plateau->getLargeur(); $x++) {
                $creature = $plateau->getCase(new Coordonnee($x, $y));
                echo "<td>";
                if ($creature) {
                    echo $creature->getNom();
                } else {
                    echo "&nbsp;";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
```
{% endcode %}

### Le fichier de test

{% code title="jeu2.php" %}
```php
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});


echo "<h2>=== Création des Créatures ===</h2>";
$guerrier = new Guerrier("Thor");
$mage = new Mage("Merlin");
$archer = new Archer("Robin");

echo $guerrier->crier() . "\n";
echo $mage->crier() . "\n";
echo $archer->crier() . "\n";

echo "<h2>=== Placement sur le plateau ===</h2>";
$plateau = new Plateau(5, 5);
$plateau->placerCreature($guerrier, new Coordonnee(1, 1));
$plateau->placerCreature($mage, new Coordonnee(3, 1));
Affichage::afficherPlateau($plateau);

echo "<h2>=== Déplacement du guérrier sur le plateau ===</h2>";
$plateau->deplacerCreature($guerrier, new Coordonnee(2, 1));
Affichage::afficherPlateau($plateau);

echo "<h2>=== Premier Combat ===</h2>";
$arene = new Arene();
$arene->lancerCombat($guerrier, $mage);

//echo "<h2>=== Deuxième combat ===</h2>";
//$guerrier2 = new Guerrier("Gimli");
//$arene2 = new Arene();
//$arene2->lancerCombat($guerrier2, $archer);

?>
</body>
</html>

```
{% endcode %}
