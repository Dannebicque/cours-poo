# Séance D : Héritage

### Objectifs

* Comprendre le concept d’héritage.
* Mettre en oeuvre le concept d’héritage : aidez-vous des TD précédents pour écrire le code demandé.

### Principe :

l'héritage est un grand principe de la programmation orientée objet. Une classe qui hérite d’une **classe Mère** hérite de toutes ses propriétés et de toutes ses méthodes. L’intérêt pour le programmeur est de pouvoir spécialiser la classe Mère (dont le code est éprouvé) en ajoutant à la **classe fille** de nouvelles propriétés et de nouvelles méthodes.

`extends` mot clé qui permet de déclarer l’héritage.

**Héritage multiple** : une classe peut héritée d’une classe qui hérite elle-même d’une autre classe. **Opérateur de résolution de portée** : l’opérateur `::` (deux points) fournit un moyen d’accéder aux propriétés et aux méthodes de la classe Mère. Lorsque vous référencez ces éléments en dehors de la définition de la classe, utilisez le nom de la classe.

#### Exemple de code pour une classe

```php
<?php
    // Comprendre l'héritage
    // Classe Mère
    class A {
        // Propriétés
        public $prop1;
        public $prop2;
        // Constructeur
        public function __construct($arg1,$arg2){
            $this->prop1=$arg1;
            $this->prop2=$arg2;
        }
        public function lire_information(){
            return $this->prop1.' '.$this->prop2;
        }
    }
    // Class Fille
    class B extends A{
        // Propriété de la classe Fille
        public $prop3;
        //Constructeur
        public function __construct($arg1,$arg2,$arg3){
            // Appel du constructeur de la classe parent
            parent::__construct($arg1,$arg2);
            $this->prop3=$arg3;
        }
        // Méthode qui permet de modifier la propriété 3
        public function change($nouvellevaleur){
            $this->prop3=$nouvellevaleur;
        }
        // Surcharge de la méthode lire_information
        public function lire_information(){
            return parent::lire_information().' '.$this->prop3;
        }
    }
?>
```

#### Exemple d'utilisation de ces classes :

```php
<?php
    // MMI - M3203 POO
    // Cours héritage
    // Notion d'héritage
    // Appel de la classe
    require ('heritage.php');
    // Un objet de la classe A
    $objet1=new A('Classe A','Mère');
    // Affichage des valeurs des 
    // propriétés de la classe A
    echo $objet1->lire_information();
    echo '<br>';
    // Un objet de la classe B, 
    // spécialisation de la classe A
    $objet2=new B('Classe B','Fille','');
    echo $objet2->lire_information();
    echo '<br>';
    $objet2->change('spécialisation');
    echo $objet2->lire_information();
    echo '<br>';
?>
```

### EXERCICE N°1

#### Créer la classe Animal (animal.php) – [Voir séance 2](https://dannebicque.github.io/m3203/seance2/sujet.md)

La classe Animal possède 5 propriétés :

1. Le nom de l’animal
2. L’âge (actuel)
3. L’âge théorique maximum
4. Le régime alimentaire : tableau d’aliments
5. état: ‘mort’ ou ‘vivant’ (par défaut, état =’vivant’)

La classe possède les méthodes suivantes :

* Son constructeur initialise seulement les propriétés nom, age, age maximum.
* lire\_informations(), qui affiche le nom, l’âge de l’animal et son état : ’mort’ ou ‘vivant’
* mange($aliment) qui ajoute l’aliment donné en argument au tableau d’aliments (propriété régime alimentaire). Attention, un animal mort ne mange plus !
* vieillir($nbannees) qui fait vieillir d’un nombre d’années ($nbannees) l’animal => incrémentation de son âge. Lorsqu’on son âge dépasse l’âge maximum, l’animal meurt : état= ‘mort’.
* lire\_regime() qui affiche la liste des aliments mangés.

#### Créer l’application (td4\_heritage.php)

*   créer l’instance $bestiole de la classe animal :

    Nom : ‘Une drôle de bête’, Age : 1, Age théorique maximum : 10, état : ‘vivant’
* Appeler la méthode : mange(‘fruits’)
* Appeler la méthode : mange(‘légumes’)
* Appeler la méthode : lire\_regime()
* Appeler la méthode : lire\_informations()
* Appeler la méthode : vieillir(4)
* Appeler la méthode : lire\_informations()
* Appeler la méthode : vieillir(6)
* Appeler la méthode : lire\_informations()

{% code title="td4_heritage.php" %}
```php
include('animal.php');

//créer l’instance $bestiole de la classe animal : 
//Nom : ‘Une drôle de bête’, Age : 1, Age théorique maximum : 10, état : ‘vivant’

$bestiole = new Animal('Une drôle de bête', 1, 10);

// Appeler la méthode : mange(‘fruits’)
$bestiole->mange('fruits');
// Appeler la méthode : mange(‘légumes’)
$bestiole->mange('légumes');
// Appeler la méthode : lire_regime()
echo $bestiole->lire_regime();
// Appeler la méthode : lire_informations()
echo $bestiole->lire_informations();
// Appeler la méthode : vieillir(4)
$bestiole->vieillir(4);
// Appeler la méthode : lire_informations()
echo $bestiole->lire_informations();
// Appeler la méthode : vieillir(6)
$bestiole->vieillir(6);
// Appeler la méthode : lire_informations()
echo $bestiole->lire_informations();
```
{% endcode %}

### EXERCICE N°2

#### Compléter le fichier animal.php

Ajouter la classe Chien qui hérite de la classe Animal.

La classe Chien possède une propriété : nom familier

Méthodes :

* Constructeur
* Méthode : seNomme() qui retourne le nom familier
* Méthode : lire\_informations() surcharge la méthode de la classe Animal. Retourne le nom de l’animal, son age, son état (mort ou vivant) et le nom familier.

#### Compléter l’application td4\_heritage

* Créer l’instance $chien1 de la classe Chien :
  * Nom : 'Chien',
  * Age : 2,
  * Age théorique maximum : 20,
  * etat : ‘vivant’,
  * Nom familier : ‘Médor’
* Appeler la méthode : seNomme() ;
* Appeler la méthode : mange(‘viande)
* Appeler la méthode : mange(‘croquettes)
* Appeler la méthode : lire\_regime()
* Appeler la méthode : lire\_informations() ;

#### Question Bonus

On pourrait considérer qu'un Chien est un animal dont l'age théorique est toujours le même, et qu'il est fixé à 18 ans. Modifiez la classe Animal avec cette spécificité, et modifiez les appels et le constructeur de la classe Chien en conséquence.
