# Séance C : Encapsulation

#### Rappels de Cours

L’encapsulation consiste à déclarer les propriétés (attributs) en **private** (ou protected) au lieu de public. **Pourquoi ?** Pour l’intégrité des données, c’est-à-dire pour que les propriétés ne prennent pas n’importe quelles valeurs. Le programmeur d’une classe va ainsi construire un code fiable. Le programmeur utilisant de cette classe n’aura pas à se préoccuper de l’intégrité du code qu’il utilise.

L’unique façon d’assurer d’y arriver est donc de rendre inaccessible les attributs sauf en créant des méthodes publiques qui permettront de s’assurer que les valeurs prises restes dans celles admises. Ces méthodes filtrent donc l’usage des attributs. On appelle une méthode publique qui permet d'accéder à une propriété un _getter_ (car commence en général par getXxxx) ou un _accesseur_, et on nomme une méthode publique qui permet de définir ou de modifier une propriété un _setter_ (car commence en général par setXxxx) ou un _mutateur_.

Remarque : il est possible de déclarer des méthodes privées (qui ne seront utilisée que dans la classe elle même). Cela permet de renforcer la stabilité du code et ces évolutions.

#### Objectifs de la séance

* Comprendre le concept d’encapsulation.
* Mettre en œuvre l’encapsulation

#### EXERCICE N°1

Voici le code la classe Personne.

{% code title="personne.php" %}
```php
<?php
    //----------------------------------------------------
    // fichier : personne.php
    // ---------------------------------------------------
    // Notion d'encapsulation : protection des propriétés
    // de l'objet.    
    // IUT de Troyes - MMI 2ème année
    //----------------------------------------------------

    class Personne {
        // Définition des attributs de la classe
        private $prenom;
        private $nom;
        private $age;

          // Définition de la fonction constructeur 
         public function __construct($n,$p,$a) { 
            $this->nom=$n;
            $this->prenom=$p;
            $this->age=$a;
        }  

        // Définition du comportement sePresente() 
        public function sePresente() {  
            return 'Je m\'appelle '.$this->prenom.' '.$this->nom.' et j\'ai '.$this->age.' ans '; 
        }
    }
?>
```
{% endcode %}

Les propriétés sont déclarées **private**.

Voici le code de l’application seance3\_exo1.php.

{% code title="seance3_exo1.php" %}
```php
<?php
    //----------------------------------------------------
    // fichier : seance3_exo1.php
    // ---------------------------------------------------
    // Notion d'encapsulation : protection des propriétés
    // de l'objet.    
    // IUT de Troyes - MMI 2ème année
    //----------------------------------------------------

    require 'personne.php';
    // Nouvelle instance de class.Personne
    $etudiant=new Personne('Martin','Paul',19);
    echo $etudiant->sePresente().'<br>'; //Je m'appelle Paul Martin et j'ai 19 ans 
    // Modification de l'attribut Nom
    $etudiant->nom='Durand';
    echo $etudiant->sePresente().'<br>'; // Je m'appelle Paul Durand et j'ai 19 ans 
?>
```
{% endcode %}

A FAIRE

* Créez les deux fichiers personne.php et seance3\_exo1.php.
* Testez seance3\_exo1.php et répondez aux questions
* Pourquoi l’exécution du code de seance3\_exo1.php renvoie une erreur ?
* Donnez une solution simple pour permettre l’exécution normale de ce code

#### EXERCICE 2

Nous allons ici modifier le code de la classe Personne pour répondre à un nouveau cahier des charges. Le nom d’une personne sera obligatoirement en majuscules. Le programmeur qui utilisera cette classe pourra créer une instance sans se soucier de cette contrainte. C’est donc à la classe de gérer conversion du nom en majuscules. Voici comment.

Code de la classe Personne2

{% code title="personne2.php" %}
```php
<?php
    //----------------------------------------------------
    // fichier : personne2.php
    // ---------------------------------------------------
    // Notion d'encapsulation : protection des propriétés
    // de l'objet.    
    // IUT de Troyes - MMI 2ème année
    //----------------------------------------------------

    class Personne2 {
        // Définition des attributs de la classe
        private $prenom;
        private $nom;
        private $age;

          // Définition de la fonction constructeur 
         public function __construct($n,$p,$a) { 
            $this->setNom($n);
            $this->prenom=$p;
            $this->age=$a;
        }  

        // Définition du comportement sePresente() 
        public function sePresente() {  
            return 'Je m\'appelle '.$this->prenom.' '.$this->nom.' et j\'ai '.$this->age.' ans '; 
        }

        // initialisation du nom en majsucules
        public function setNom($n){
            $this->nom=strtoupper($n); 
        }
    }
?>
```
{% endcode %}

Voici le code de l’application seance3\_exo2.php

{% code title="seance3_exo2.php" %}
```php
<?php
    //----------------------------------------------------
    // fichier : seance3_exo2.php2
    // ---------------------------------------------------
    // Notion d'encapsulation : protection des propriétés
    // de l'objet.    
    // IUT de Troyes - MMI 2ème année
    //----------------------------------------------------

    require 'personne2.php';

    // Nouvelle instance de class.Personne
    $etudiant=new Personne2('Martin','Paul',19); // le nom est en minuscules

    echo $etudiant->sePresente().'<br>'; //Je m'appelle Paul MARTIN et j'ai 19 ans (nom en majuscules)

    // Modification de l'attribut Nom
    $etudiant->setNom('Durand'); // nom en minuscules 
    echo $etudiant->sePresente().'<br>'; // Je m'appelle Paul DURAND et j'ai 19 ans (nom en majuscules)
?>
```
{% endcode %}

A FAIRE

* Créez une nouvelle version du code de la classe (Personne2) et de l’application (seance3\_exo2)
* Testez seance3\_exo2.php

#### Exercice N°3

Nous allons écrire la classe connexion\_sql qui permet de gérer la connexion à des bases de données MYSQL. Chaque fois que nous aurons besoin de gérer une connexion à une base de données, il suffira de créer une instance de cette classe. L’exercice proposé se limitera à quelques propriétés et quelques méthodes. La classe ne sera donc pas opérationnelle. Mais sa programmation devra nous permettre d’assimiler le concept d’encapsulation.

**Ecrire la classe ConnexionSQL :**

Les propriétés

* adresseip : adresse IP du serveur
* nombase : nom de la base de données
* utilisateur : nom de l’utilisateur
* mdp : mot de passe

Les méthodes

* constructeur
* lire\_connexion qui retourne adresseip, nombase et utilisateur.

**Ecrire l’application seance3\_exo3.php**

{% code title="seance3_exo3.php" %}
```php
<?php
    //----------------------------------------------------
    // fichier : seance3_exo3.php
    // ---------------------------------------------------
    // Notion d'encapsulation : protection des propriétés
    // de l'objet.    
    // IUT de Troyes - MMI 2ème année
    //----------------------------------------------------
    // appel de la classe
    require 'connexion_sql.php';
    // création d'une première instance
    $connexion1=new Connexion_SQL('127.0.1.1','test','root','');
    echo $connexion1->lire_connexion();

    // Création d'une deuxième instance
    $connexion2=new Connexion_SQL('serveur','test','root','');// serveur n'est pas une @ip valide
    echo $connexion2->lire_connexion();

?>
```
{% endcode %}

* Testez le code

**Questions complémentaires**

* modifier la classe Connexion\_SQL pour vous assurer que l'IP donnée par l'utilisateur est dans un format valide. Sinon, afficher un message d'erreur.
