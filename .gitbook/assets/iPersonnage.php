<?php

interface iPersonnage
{
    public function place($x, $y);
    public function deplaceX($x = 1);
    public function deplaceY($y = 1);
    public function affichePersonnage();
    public function addAttribut($attributs);
}
