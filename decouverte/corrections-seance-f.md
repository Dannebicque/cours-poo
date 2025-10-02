# Corrections séance F

{% code title="VehiculeAMoteur.php" %}
```php
<?php

abstract class VehiculeAMoteur
{
    protected string $typeMoteur;
    protected int $nbPassagers;
    protected static int $nbVehicules = 0;

    public function __construct(string $typeMoteur, int $nbPassagers)
    {
        $this->verificationtype($typeMoteur);
        $this->verificationnbpassagers($nbPassagers);
        $this->typeMoteur = $typeMoteur;
        $this->nbPassagers = $nbPassagers;
        self::$nbVehicules++;
    }

    public function setypeMoteur(string $typeMoteur): void
    {
        $this->verificationtype($typeMoteur);
        $this->typeMoteur = $typeMoteur;
    }

    protected function verificationtype(string $type): void
    {
        if ($type !== 'T' && $type !== 'E') {
            throw new \InvalidArgumentException("Type moteur invalide : doit être 'T' ou 'E'.");
        }
    }

    protected function verificationnbpassagers(int $nombre): void
    {
        if ($nombre < 1) {
            throw new \InvalidArgumentException("Le nombre de passagers doit être un entier positif.");
        }
    }

    public static function getNbVehicules(): int
    {
        return self::$nbVehicules;
    }

    public function getTypeMoteur(): string
    {
        return $this->typeMoteur;
    }

    public function getNbPassagers(): int
    {
        return $this->nbPassagers;
    }
}

```
{% endcode %}

{% code title="Voiture.php" %}
```php
<?php

class Voiture extends VehiculeAMoteur
{
    private string $marque;
    private int $puissance;

    public function __construct(string $typeMoteur, int $nbPassagers, string $marque, int $puissance)
    {
        parent::__construct($typeMoteur, $nbPassagers);
        $this->marque = $marque;
        $this->puissance = $puissance;
    }

    public function lireCaracteristiques(): string
    {
        return 'Type de moteur : '.$this->typeMoteur.', Nombre de passagers : '.$this->nbPassagers.', Marque : '.$this->marque.', Puissance : '.$this->puissance;
    }
}

```
{% endcode %}

{% code title="VoitureDeSport.php" %}
```php
<?php

final class VoitureDeSport extends Voiture
{
    private float $zeroACent;

    public function __construct(string $typeMoteur, int $nbPassagers, string $marque, int $puissance, float $zeroACent)
    {
        parent::__construct($typeMoteur, $nbPassagers, $marque, $puissance);
        $this->zeroACent = $zeroACent;
    }

    public function lireCaracteristiques(): string
    {
        return parent::lireCaracteristiques(). ' Zéro à cent :'.$this->zeroACent;
    }
}

```
{% endcode %}
