# Séance G : Synthèse des concepts

## OBJECTIFS :

* Construire des classes mettant en œuvre les concepts d’interface, d’héritage et d’encapsulation.
* Être capable d’écrire seul(e) du code PHP en POO&#x20;

## TRAVAIL DEMANDE

Codez en PHP les classes suivantes en les regroupant dans un fichier nommé **individu.php.**

** Ci-dessous le fichier seance8.php **

{% code title="seance8.php" %}
```php
<?php
	/*---------------------------------------------------------
	 	Application : tp1.php
		Module M3203 - MMI 2ème année
		IUT de Troyes
	---------------------------------------------------------*/
	// Classe Individu
	require('individu.php');
	
	/*  Les lignes de code de chaque instance ont été placées en
	commentaires afin de tester progressivement votre code
	Travail à faire : supprimez les commentaires et testez chaque 
	instanciation.
	*/
	
			/*==========================================
			   Une  instance de la classe Etudiant
			  ========================================== */
	echo '-------------Début etape 1--------------------------------<br>';
			// Nombre d'individus
	echo Etudiant::getNombreIndividus();
			// Instanciation
	$individu1=new Etudiant('Durand','Paul','homme','1234567890A','GEA',16);
			// Paul Durand se présente
	echo $individu1->sePresente().'<br>';
			// Paul Durand travaille 35 heures
	echo $individu1->travailler(35);
			// Paul Durand prend 2 jours de congés
	echo $individu1->reposer(2);
			// Paul Durand a travaille 30 heures
	echo $individu1->travailler(30);
			// Paul Durand prend 2 jours de congés
	echo $individu1->reposer(1);
			// Déclaration du salaire de Paul Durand
	echo $individu1->declareSalaire();
			// Remise à zéro du salaire de Paul Durand
	$individu1->RAZrevenu();
			// Vérification du salaire de Paul Durand après Remise à zéro
	echo $individu1->declareSalaire();
			// Affichage de l'âge de Paul Durand
	echo $individu1->getAge();
			// Modification de l'âge de Paul Durand
	$individu1->setAge(17);
			// Affichage de l'âge de Paul Durand
	echo $individu1->getAge();
		// Paul Durand a travaille 10 heures
	echo $individu1->travailler(10);
		// fin de cette partie
	echo '---------------fin etape 1--------------------------------<br>';
			
			
	
			/*==========================================
			   Une autre instance de la classe Etudiant
			  ========================================== */
	echo '-------------Début etape 2--------------------------------<br>';
			// Instanciation
	$individu2=new Etudiant('Fraichi','Sarah','femme','9012345678B','TC',18);
			// Sarah Fraichi se présente
	echo $individu2->sePresente().'<br>';
			// Sarah Fraichi travaille 20 heures
	echo $individu2->travailler(20);
			//  Déclaration du salaire de Sarah Fraichi 
	echo $individu2->declareSalaire();
	
			// Nombre d'individus
	echo Etudiant::getNombreIndividus();
	
		// Fin de cette partie
	echo '---------------fin etape 2--------------------------------<br>';
	
			/*==========================================
			   Une  instance de la classe Individu
			  ========================================== */
	echo '-------------Début etape 3--------------------------------<br>';
	//$individu3=new individu('Palenor','Hubert','homme');
			// Hubert Palenor se présente
	//$individu3->sePresente().'<br>';
				// Fin de cette partie
	echo '---------------fin etape 3--------------------------------<br>';
	
			/*==========================================
			   Une  instance de la classe Etudiant_src
			  ========================================== */
	echo '-------------Début etape 4--------------------------------<br>';
			// Instanciation
	$individu4=new Etudiant_mmi('Hontoi','Franck','homme','6789012345C',18,'Web avancé');
			// Franck Hontoi se présente
	echo $individu4->sePresente().'<br>';
			// Franck Hontoi travaille 35 heures
	echo $individu4->travailler(35);
			// Franck Hontoi déclare ses revenus
	echo $individu4->declareSalaire();
			// Franck Hontoi obtient sa note d'examen
	echo $individu4->evaluer(11);
			// Quelle est l'option de Franck Hontoi
	echo $individu4->quelleOption();
			// Franck Hontoi change d'option
	echo $individu4->ChangerOption('Conception graphique');
			// Quelle est l'option de Franck Hontoi
	echo $individu4->quelleOption();
	
	// Nombre d'individus
	echo Etudiant::getNombreIndividus();
	unset($individu4);
	echo Etudiant::getNombreIndividus();
	echo '---------------fin etape 4--------------------------------<br>';
	
	
	
?>
```
{% endcode %}

Vous pouvez bien sûr commenter des éléments dans le fichier seance8.php pour effectuer vos tests. A la fin de la séance, l'ensemble des appels du fichier doivent fonctionner.

### Classe Individu et interface iHumain

La classe Individu est une classe abstraite qui implémente l’interface iHumain qui définit les méthodes

* `travailler($nombreheures)`
* `reposer($nombrejours)`
* `sePresente()`

#### Les attributs

Les 5 propriétés **protected** de la classe Individu sont :

* `$nom` : valeur alphanumérique
* `$prenom` : valeur alphanumérique
* `$sexe` : valeur alphanumérique (homme ou femme)
* `$revenu` : revenu en euros, valeur numérique calculée valant 0 par défaut
* `$conges` : nombre de congés, valeur numérique calculée valant 0 par défaut

#### Les méthodes

* La méthode `travailler($nombreheures)` permet de calculer le revenu cumulé d’un individu sur la base horaire de 9.5 euros. A chaque appel de cette méthode, on cumulera le salaire calculé au salaire précédent.
* La méthode `reposer($nombrejours)` permet de cumuler le nombre de jours de congés pris. (A chaque appel de la méthode, on cumule les congés)
* La méthode `sePresente()` retourne un texte avec le nom et le prénom de l’individu
* La méthode `RAZrevenu()` permettra de remettre à zéro le revenu.
* La méthode `RAZconges()` permettra de remettre à zéro le nombre de jours de congés
* La méthode `declareSalaire()` retournera un texte indiquant le nom, le prénom et le revenu de l’individus

Codez cette classe

### Classe Etudiant

La classe Etudiant est une classe qui hérite de la classe Individu

#### Les attributs

Les propriétés **protected** de la classe Etudiant sont :

* `$numetudiant` : 10 chiffres et une lettre
* `$age` : valeur numérique
* `$formation` : valeur alphanumérique
* `$resultat` : valeur alphanumérique calculée lors de l’évaluation (méthode évaluer) qui prendra deux valeurs possibles ‘reçu(e)’ ou ‘ajourné(e)’

Cette classe possède également un attribut propre à la classe `$nbetudiants` qui permettra de connaître le nombre d’instances créées.

#### Les méthodes

* La méthode `travailler($nombreheures)` permet de calculer le revenu cumulé d’un(e) étudiant(e) sur la base horaire de 9.5 euros. Mais ce tarif horaire sera minoré de 20% si l’étudiant(e) est âgé(e) de moins de 18 ans. A chaque appel de cette méthode, on cumulera le salaire calculé au salaire précédent.
* La méthode `evaluer($noteExamen)` retournera un texte précisant le nom, le prénom et l’indication reçu(e) ou ajourné(e) à l’examen selon la note. Pour être reçu, il faut avoir la moyenne.
* D’autres méthodes sont à créer : observez le code du fichier seance8.php (ci-dessus) pour les repérer.

Codez cette classe

### Classe Etudiant\_mmi

La classe Etudiant\_mmi hérite de la classe Etudiant. Il n’est pas possible d’hériter de la classe Etudiant\_mmi.

#### Les attributs

Une propriété **privé** : `$option`. Valeur alphanumérique indiquant le titre de l’option choisie par un(e) étudiant(e) au semestre 4

#### Les méthodes

* La méthode `quelleOption()` retourne un texte indiquant le nom, le prénom et l’option choisie
* La méthode `ChangerOption($option)` permet de modifier l’option de l’étudiant
* La méthode `sePresente` reprend la méthode initiale et complète le texte par ‘ et je suis en MMI’.

Codez cette classe
