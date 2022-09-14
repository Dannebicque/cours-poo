# Séance B : Concepts de la POO

## Objectifs

* Mettre en œuvre les concepts de propriété et de méthode.
* Mettre en œuvre les concepts de classe et d’objet
* Construire une application PHP Orienté Objet

{% hint style="info" %}
Pour les TD et TP de POO nous allons travailler en local pour gagner en efficacité et éviter de devoir uploader le code sur un serveur pour tester. Le plus simple est [d'utiliser une image docker avec un serveur LAMP configuré](../faq.md), ou une version logiciel tel que _WampServer_ ou _Xamp_ pour Windows, ou _MAMP_ pour MacOs.
{% endhint %}

## Enoncé et travail à faire

### Exercice 1

#### **Les propriétés**

Un Véhicule est un **OBJET** du monde réel. Il se caractérise par :

* Sa marque (du texte)
* Sa puissance en CV (un nombre entier)
* Son kilométrage (un nombre décimal)

#### **Les méthodes**

Utiliser un véhicule a pour effet d’augmenter la valeur du kilométrage. On souhaite pouvoir lire les caractéristiques du véhicule

#### **Programmation**

* Le code de la classe _Vehicule_ (avec une majuscule) doit être enregistré dans le fichier **vehicule.php** (sans majuscule)
* Le code de l’application doit être enregistré dans le fichier **tp1\_vehicule.php**.&#x20;
* Utilisez la commande _require_ pour appeler la classe _Vehicule_ dans l’application.
* Ecrire la classe pour définir les propriétés et les méthodes de l’objet _Vehicule_
* Ecrire une application :
* qui instanciera les deux véhicules suivants

| Nom du véhicule | marque  | puissance | kilometrage |
| --------------- | ------- | --------- | ----------- |
| vehicule1       | RENAULT | 90        | 15000       |
| vehicule2       | PEUGEOT | 110       | 20000       |

* qui affiche les caractéristiques des deux véhicules
* qui modifie la puissance de la vehicule1 : nouvelle valeur 110
* qui affiche le kilométrage des véhicules après un déplacement : le vehicule1 parcoure 3500 km et la vehicule2 parcoure 1500 km.

### Exercice 2

Considérant qu'un chien est caractérisé par sa race, son âge et son poids, définissez une classe permettant de le représenter. Un chien est par ailleurs un animal qui vieillit, et qui peut prendre du poids. On peut afficher toutes les caractéristiques des chiens.

1. Définir la classe Chien
2. Créer le fichier tp1\_chien.php pour tester la classe.
3. Créer les deux chiens suivants :

| Nom du chien | Race            | Age | Poids |
| ------------ | --------------- | --- | ----- |
| Chien1       | Labrador        | 4   | 25    |
| Chien2       | Berger Allemand | 6   | 20    |

Ecrire le code permettant de réaliser les étapes suivantes :

* Afficher les données des chien1 et chien2
* Le chien1 prend un an de plus (c'est son anniversaire :))
* Le chien2 mange et grossit de 1,5Kg
* Le chien1 perd 2kg
* A chaque étape afficher les informations du chien.
