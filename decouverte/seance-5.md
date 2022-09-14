# Séance E : Héritage & Encapsulation

## Cours

Nous avons vu dans la séance 3, le principe de l’encapsulation et dans la séance 4 le principe de l’héritage. Voyons maintenant comment combiner les deux.

Principe : L’encapsulation consiste à déclarer **PRIVATE** les propriétés de la classe. Cela reste vrai qu’il y ait héritage au non. Mais dans le cas de l’héritage, les propriétés déclarées **PRIVATE** ne sont accessibles que dans la classe déclarant ces propriétés. Une classe Fille ne peut accéder aux propriétés héritées que si elles ont été déclarées en **PROTECTED**. Donc dans le cas de l'héritage on choisira de déclarer les propriétés en **PROTECTED** pour faciliter la manipulation des propriétés par les classes filles.

## Pour résumer la visibilité des propriétés

Les visibilités suivantes existent en PHP et peuvent s'appliquer aux propriétés et aux méthodes.

* **public** pourra être appelé partout, on évitera d'utiliser cette solution sur les propriétés
* **private** ne pourra être appelé que dans la classe.
* **protected** ne pourra être appelé que dans la classe et les classes qui en hérite.

## Exercice

La classe **Vehicule** possède les propriétés suivantes :

* marque
* puissance
* kilometrage

Les méthodes sont

* Le constructeur
* La méthode `parcourir($distance)` qui cumule les kilomètres parcourus par le véhicule
* La méthode `lire_caracteristiques()` qui retourne les valeurs des propriétés du véhicule.

**Nous avons déjà écrit cette classe dans la** [**séance 2**](https://app.gitbook.com/s/-LjKrFSyq65TEN9dTgPU/seance2/sujet.md)**. Vous pouvez/devez la reprendre et modifier la visibilité des propriétés**

La classe Voiture hérite de Vehicule.

* Elle possède en plus la propriété privée type qui permet de distinguer les berlines, des SUV, des 4x4 et des breaks (‘berline’,’suv’,’4x4’,’break’).&#x20;

    Attention, seules ces valeurs sont possibles. Tout autre valeur est invalide et affichera une erreur.
* La méthode `lire_type()` permet de connaître le type de véhicule.

### A FAIRE

* Créez les deux classes dans un fichier nommé vehicule.php
* Créez une application td5.php :
  * Une instance de Vehicule. Exemple de votre choix
  * Deux instances de Voiture, Exemples à votre convenance.
* Testez votre application en utilisant les différentes méthodes des différentes instances.
* Que se passe-t-il lorsque l'on appelle la méthode lire\_caractéristique() sur une Voiture ?&#x20;

    Modifiez votre code pour que lire\_caractéristique() puisse afficher toutes les informations de la voiture.
* Créez une nouvelle classe, Bus, qui héritera de Véhicule et qui contiendra comme propriétés le nombre de place assise et le nombre d'essieux.
