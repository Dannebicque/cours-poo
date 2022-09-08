# Séance G : Finalisation

Dans cette dernière séance, nous allons exploiter tous les objets créés afin de produire un mini-site permettant la gestion de livres et d'artistes.



{% hint style="info" %}
### Notation

Cet exercice sera à faire valider en fin de séance **obligatoirement**.

* 0, rien n'est fait
* 1, début d'exercice, mais non fonctionnel
* 2, TP réalisé exactement comme demandé
* 3, TP réalisé avec quelques améliorations/optimisations
{% endhint %}

## Sujet

En vous basant sur les précédents TD/TP et sur vos connaissances en base de données, écrire la classe LivreManager qui permet de gérer la sauvegarde des livres dans la base de données.

Ne pas oublier qu'un livre comporte a minima des auteurs.

{% hint style="danger" %}
**Vous devez faire valider le bon fonctionnement en fin de séance**
{% endhint %}

### Sources à disposition :

{% code title="seance15.php" %}
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Séance 15 - Finalisation</title>
</head>
<body>
<h1>Séance 15 - Finalisation</h1>
<h2>Menu</h2>
<h3>Artistes</h3>
<p><a href="ajout-artiste.php">Création d'un livre, d'un roman ou d'une bande dessinées</a></p>
<p><a href="artistes.php">Voir tous les artistes</a></p>
<h3>Livres</h3>
<p><a href="ajout-livre.php">Création d'un livre, d'un roman ou d'une bande dessinées</a></p>
<p><a href="livres.php">Voir tous les livres</a></p>
</body>
</html>

```
{% endcode %}
