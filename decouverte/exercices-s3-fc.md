# Exercices S3 - FC

## **Sujet de Projet : Combat des Créatures**

**Objectif** : Implémenter un mini-jeu où des créatures s’affrontent en utilisant les concepts de programmation orientée objet (POO) en PHP.

## **Contexte**

Dans ce jeu, chaque créature a des caractéristiques (force, santé, défense) et des compétences spécifiques.

Votre mission est d’écrire les classes nécessaires pour permettre :

1. La création de différents types de créatures.
2. L’attaque entre les créatures.

Un fichier de test (jeu1.php) vous est fourni pour valider votre implémentation.

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

## Quelques explications sur l'Autoloader

Vous constaterez que nous n'avons pas de "require" pour chacune des classes dans le fichier `seanceIJ.php`, pour autant vos classes seront accessibles. On utilise le mécanisme d'autoload de PHP qui permet d'éviter d'avoir des requires quand on utilise la POO. Cela s'avère très pratique quand nous avons beaucoup de classes à gérer.

```php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});
```

Le code ci-dessus assure le lien avec tous les fichiers nécessaires. En fait, à chaque fois que vous aller utiliser une classe (new Classe ou Classe::...), PHP, va essayer de trouver un fichier qui se nomme Classe.php et automatiquement en faire un require pour l'intégrer.

Contrainte de cette solution, vous devez avoir un fichier par classe, et votre fichier doit se nommer exactement comme votre classe. Mais nous avons vu en cours, que cette contrainte est en fait une bonne pratique.&#x20;
