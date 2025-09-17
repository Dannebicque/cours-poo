# Corrections séance D

Extraits de la correction de la séance D

{% code title="Animal.php" %}
```php
<?php

class Animal
{
    public string $nom;
    public int $age;
    public int $ageTheorique;
    public string $etat = 'vivant';
    public array $regimeAlimentaire = [];

    public function __construct(string $nom, int $age, int $ageTheorique)
    {
        $this->nom = $nom;
        $this->age = $age;
        $this->ageTheorique = $ageTheorique;
        $this->regimeAlimentaire = []; //ici ou dans la propriété
        $this->etat = 'vivant'; //ici ou dans la propriété
    }

    public function mange(string $aliment): void
    {
        if ($this->etat === 'mort') { // === => 3 * =
            echo 'L\'animal '.$this->nom.' est mort et ne peut plus manger !<br>';
        } else {
            $this->regimeAlimentaire[] = $aliment;
        }
    }

    public function lire_regime(): string
    {
//        $message = '';
//        foreach ($this->regimeAlimentaire as $aliment) {
//            $message .= $aliment.', '; // => $message = $message . $aliment . ', ';
//        }
//
//        return 'Regime alimentaire : '.$message.'<br>';

        // ou
        return 'Regime alimentaire : '.implode(', ', $this->regimeAlimentaire).'<br>';
    }

    public function lire_informations() : string
    {
        return 'Animal : '.$this->nom.' : '.$this->age.' ans, '.$this->etat.'<br>';
    }

    public function vieillir(int $nbAnnee): void
    {
        $this->age += $nbAnnee;
        if ($this->age > $this->ageTheorique) {
            $this->etat = 'mort';
        }
    }

}

```
{% endcode %}

{% code title="Chien.php" %}
```php
<?php

class Chien extends Animal
{
    public string $nomFamilier;

    public function __construct(int $age,  string $nomFamilier)
    {
        parent::__construct('Chien', $age, 18);
        //$this->ageTheorique = 18;
        $this->nomFamilier = $nomFamilier;
    }

    public function lire_informations(): string
    {
//        return parent::lire_informations(). 'Nom familier : '.$this->nomFamilier.'<br>';
        return parent::lire_informations(). $this->seNomme();
    }

    public function seNomme(): string
    {
        return 'Je m\'appelle '.$this->nomFamilier.'<br>';
    }
}

```
{% endcode %}

{% code title="td4_heritage.php" %}
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
<h1>Animaux et chiens</h1>
<?php
include('Animal.php');
include('Chien.php');

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

$bestiole->mange('viande');
echo '<hr>';
$chien = new Chien(4, "Médor");
echo $chien->lire_informations();
echo '<hr>';
echo $chien->seNomme();
$chien->mange('Croquettes');
$chien->mange('Viande');
echo $chien->lire_regime();
?>
</body>
</html>

```
{% endcode %}
