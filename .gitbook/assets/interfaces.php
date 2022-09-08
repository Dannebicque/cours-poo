<?php
/**
 * Created by PhpStorm.
 * User: davidannebicque
 * Date: 10/11/2017
 * Time: 08:28
 */

interface iSql{

}

interface iHumain {

    public function sePresente();
    public function travaille($nbHeures);
}


interface iLivre {
    public function __construct($titre, $nbPage);
    public function addAuteur($auteur);
    public function afficheLivre();
}

interface iBD {
    public function afficheAuteursBD($artistes);
}