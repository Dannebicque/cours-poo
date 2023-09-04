---
lastmod: 2022-09-08T06:28:47.199Z
description: Questions existentielles sur la POO en PHP
---

# FAQ

{% hint style="info" %}
Cette partie évoluera en fonction de vos questions récurrentes, et des problèmes rencontrés
{% endhint %}

## Utiliser l'image Docker MMI

Patrice Gommery a créé une image Docker avec Apache2, Mariadb, PHP8.1 pour les MMI.

Il faut installer docker sur votre système et démarré Docker.

Ensuite :

1. Créer un dossier www pour la persistance des données (c'est à dire qu'elles ne soient pas effacées dès que vous arrêté docker). Vous pouvez créer le dossier ou vous voulez (mais évitez le bureau !)
2. Dans ce dossier www, créez un sous-dossier html et dans celui-ci une page index.php avec le contenu (au final on doit avoir : `???/www/html/index.php`)

**Ces deux étapes ne sont à faire que la première fois que l'on crée le container.**

Le dossier /var/www/html contiendra ensuite toutes les pages et l'arborescence que vous voulez exploiter en cours. Les fichiers ne seront pas effacés lors de l'arrêt du container.

1. On crée le container : (Exemple sous Windows, seul le chemin du dossier sera différent sur un mac ou sous linux) `docker run -dti --name lampbut1 -v C:\Users\VotreUser\BUT1\www:/var/www -v datalampbut1:/var/lib/mysql -p 8080:80 mmi3docker/lampbut1`

Quelques explications :

* Docker run crée le container (et le démarre)
* \-dti (pour que le container soit exécuter en arrière-plan et accessible par un terminal interactif, et aussi pour qu'il ne s'arrête pas tout seul)
* \--name lampbut1 (lampbut1 sera le nom du container, vous pouvez l'appeler comme vous voulez)
* \-v C:\Users\VotreUser\BUT1\www :/var/www ( Création d'un volume pour la persistance des données après l'arrêt du container .
* C:\Users\VotreUser\BUT1\www est votre dossier local, donc à adapter selon votre configuration
* /var/www est le dossier du container dans lequel apache (et d'autres services stockent les données). Pour être plus précis apache stocke par défaut dans /var/www/html, mais j'ai laissé /var/www pour pouvoir créer d'autres dossiers en hébergement, donc ne changer pas, laissez /var/www)
* \-v datalampbut1:/var/lib/mysql (Création d'un volume persistant pour les données de mysql. là pas besoin de chemin en local, Docker va créer lui-même le volume en local et le nommera datalampbut1. Vous pouvez le nommer autrement si vous voulez , mais ne changer pas /var/lib/mysql ça c'est le dossier de stockage des bases sur le container)
* \-p 8080:80 (Redirection du port 80 du container sur le port 8080 en local, vous pouvez bien sur mettre autre chose que 8080 si vous voulez)
* mmi3docker/lampbut1 est le nom du depot Docker sur lequel j'ai stocké l'image (et qui sera donc recopier sur votre poste lors de la première création d container)

1. Comme tous les services sont dans le même container (ce qui n'est pas forcément une bonne pratique, mais pour commencer en S1 c'est très bien et plus facile), il faut lancer les services manuellement sur le container. Rien de compliqué, saisissez simplement la commande : docker exec lampbut1 /root/bootmmi.sh (ou lampbut1 est le nom que vous avez donné au container)

Voilà c'est tout. Votre container est créé et lancé. Pour vérifier, ouvrez un navigateur avec l'URL : localhost:8080 (ou le port que vous avez mis au démarrage) Si vous avez fait correctement les étapes 1 et 2, vous devriez afficher la configuration de php 8.1 active sur le serveur web. Si vous voulez créer d'autres pages et les tester, créez-les dans votre dossier www/html c'est aussi simple que ça. Pour voir si la base de données fonctionne : localhost:8080/adminer (le login est adminer, le mot de passe : 123456) Si vous voulez manipulez les bases en lignes de commande : docker exec -ti lampbut1 mysql\
Si vous voulez accéder au shell: docker exec -ti lampbut1 /bin/bash (Attention si vous créez des dossiers et fichiers ailleurs que dans /var/www, rien ne sera conservé à l'arrêt du container, idem si vous installez de nouveaux paquets) Pour arrêter le container : docker stop lampbut1 Pour le relancer docker start lampbut1 (Si vous avez créé des pages ou une base de données, vous pouvez constater que tout est encore là)
