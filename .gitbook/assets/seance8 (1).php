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
	$individu4=new Etudiant_mmi('Hontoi','Franck','homme','6789012345C','SRC',18,'Web avancé');
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