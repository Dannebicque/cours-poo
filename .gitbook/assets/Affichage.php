<?php


abstract class Affichage
{
    protected static $listePersonnage = [];
    const LONGUEUR_PLATEAU = 8;
    const LARGEUR_PLATEAU = 8;
    const MAX_PERSONNAGE = 4;

    public static function addPersonnage($personnage)
    {
        if (Personnage::$nbPersonnages < self::MAX_PERSONNAGE) {
            self::$listePersonnage[] = $personnage;
        } else {
            echo '<p>Trop de personnage ! Impossible d\'ajouter ' .$personnage->getTypePersonnage().'</p>';
        }

    }

    public static function affichePlateau()
    {
        $html = '<table class="plateau">';
        for ($i = 1; $i <= self::LONGUEUR_PLATEAU; $i++) {
            $html .= '<tr>';
            for ($j = 1; $j <= self::LARGEUR_PLATEAU; $j++) {
                $html .=  '<td>';
                foreach (self::$listePersonnage as $perso)
                {
                    if ($perso->getX() == $i && $perso->getY() == $j)
                    {
                        $html .= $perso->affichePersonnage();
                    }
                }
                $html .=  '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';
        echo $html;
    }
}
