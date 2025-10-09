# Séance H : Des objets dans des classes

## Quelques explications sur l'Autoloader

Vous constaterez que nous n'avons pas de "require" pour chacune des classes dans le fichier `seanceIJ.php`, pour autant vos classes seront accessibles. On utilise le mécanisme d'autoload de PHP qui permet d'éviter d'avoir des requires quand on utilise la POO. Cela s'avère très pratique quand nous avons beaucoup de classes à gérer.

```php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});
```

Le code ci-dessus assure le lien avec tous les fichiers nécessaires. En fait, à chaque fois que vous aller utiliser une classe (new Classe ou Classe::...), PHP, va essayer de trouver un fichier qui se nomme Classe.php et automatiquement en faire un require pour l'intégrer.

Contrainte de cette solution, vous devez avoir un fichier par classe, et votre fichier doit se nommer exactement comme votre classe. Mais nous avons vu en cours, que cette contrainte est en fait une bonne pratique.&#x20;

## Sujet : Mini jeu RPG

On modélise une mini-équipe de RPG.\
Une **Party** (équipe) contient des **Character** (personnages).\
Il existe **Warrior** et **Mage** qui héritent de **Character**.\
Les **Warrior** peuvent porter un **Weapon** (arme).

### Classe abstraite `Character`

* **Propriétés (privées)**
  * `name` : string (non vide)
  * `level` : int (>= 1)
  * `hp` : int (>= 1) — points de vie
* **\_\_construct(string $name, int $level, int $hp)**
* **Setters**
  * `protected function setHp(int $hp)` : coupe à minimum 0 (pas négatif).
* **Méthodes**
  * `public function isAlive(): bool`
  * `public function takeDamage(int $amount): void` (hp diminue, min 0, amount >= 0)
  * `public function getType(): string` → `"character"` par défaut (surchargé en enfant)
  * `public function getDescription(): string`

### Classe `Warrior` (hérite de `Character`)

* **Propriétés (privées)**
  * `strength` : int (>= 1)
  * `weapon` : `?Weapon` (optionnelle), l'arme attribué au warrior (de type Weapon)
* **\_\_construct(string $name, int $level, int $hp, int $strength, ?Weapon $weapon = null)**
* **Méthodes**
  * `public function equip(Weapon $weapon): void`
  * `public function getWeapon(): ?Weapon`
  * `public function getType(): string` → `"warrior"`
  * `public function getDescription(): string`
    * exemple : `"Warrior Thor Lvl 3 (HP: 25) [Str 7, Weapon: Axe+4]"`

### Classe `Mage` (hérite de `Character`)

* **Propriétés (privées)**
  * `intelligence` : int (>= 1)
  * `mana` : int (>= 0)
* **\_\_construct(string $name, int $level, int $hp, int $intelligence, int $mana)**
* **Méthodes**
  * `public function getType(): string` → `"mage"`
  * `public function getDescription(): string`
    * exemple : `"Mage Lyra Lvl 2 (HP: 18) [Int 6, Mana 12]"`

### Classe `Weapon`

* **Propriétés (privées)**
  * `name` : string
  * `damage` : int (>= 0)
* **\_\_construct(string $name, int $damage)**
* **getDescription(): string** `→ ex.` "Sword+3"\`

### Classe `Party`

* **Propriétés (privées)**
  * `name` : string
  * `capacity` : int (>= 1)
  * `members` : `Character[]`
* **\_\_construct(string $name, int $capacity)**
* **Méthodes**
  * `public function getName(): string`
  * `public function getCapacity(): int`
  * `public function getCount(): int`
  * `public function getMembers(): array`
  * `public function add(Character $c): bool` → ajoute si pas plein.
  * `public function recruitWarrior(string $name, int $level, int $hp, int $strength, ?Weapon $weapon = null): bool`\
    → **instancie un `Warrior` à l’intérieur** et l’ajoute (**composition demandée**).
  * `public function totalLevels(): int`

### Le fichier de test

{% code title="arene.php" lineNumbers="true" %}
```php
<?php
// Autoload des classes
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

// 1) Création d’armes
$sword = new Weapon('Epée', 3);
$axe   = new Weapon('Arc', 4);

// 2) Création d’une équipe (capacity 3)
$party = new Party('La Guerre de Troyes', 3);

// 3) Recrutement via composition (instanciation interne dans Party)
$party->recruitWarrior('Thor', 3, 25, 7, $axe); // Warrior instancié dans Party
// Ajout manuel d’un Mage
$mage = new Mage('Lyra', 2, 18, 6, 12);
$party->add($mage);

// 4) Ajout d’un autre Warrior puis équipement après coup
$war2 = new Warrior('Bjorn', 2, 22, 5);
$war2->equip($sword);
$party->add($war2);

// 5) Affichage équipe
echo '=== Partie : '.$party->getName().' ('.$party->getCount().'/'.$party->getCapacity().') ===<br>';
foreach ($party->getMembers() as $m) {
    echo '- '.$m->getDescription().'<br>';
}
echo 'Total niveaux: '.$party->totalLevels().'<br>';

?>
```
{% endcode %}
