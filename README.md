# Currencies calculator

Le rendu doit se faire sous la forme d'un zip qui sera déposé sur l'URL suivante:

Veuillez prendre soin de zipper le dossier racine après avoir retiré les dossiers volumineux tels que **vendor** afin
que votre test puisse ensuite être corrigé dans de bonnes conditions.

Si vous utilisez docker, nous vous conseillons de lancer la commande `make install` pendant la lecture du sujet.

Il est plus que recommandé de suivre les principes SOLID afin de maximiser vos chances de réussite.

## Le projet

Nous souhaitons mettre en place un outil de conversion permettant d'effectuer des calculs comprenant plusieurs devises
vers une devise cible

## Vos objectifs

Pour cela vous avez en entrée:
- Une liste des devices utilisables
- Un dictionnaire comprenant les taux de changes

Veuillez compléter le code présent dans **src/index.php** afin de donner la possibilité d'évaluer une expression telle
que `10USD + 20BBD` = `20USD` si le taux de change entre `USD` et `BBD` est de `0.5` et que la device cible est `USD`

En fonction des paramètres passé dans la ligne de commande, exemple:

`php src/index.php "10USD + 20BBD" USD` doit répondre `20USD`

`argv[2]` correspond à l'expression et `argv[3]` à la devise cible

## Notes

Nous vous mettons à disposition un Makefile contenant les commandes utiles à l'initalisation et au run du projet. Nous
vous invitons à lancer `make help` afin de prendre connaissance de ces commandes.

Nous avons également mis à votre disposition le framework d'injection de dépendance [php-di](https://php-di.org/) que
vous n'êtes pas obligé d'utiliser ainsi que le framework de test PhpUnit pour lequel vous trouverez un exemple d'
utilisation avec php-di dans **test/Example/DependencyInjectionTest.php**

Veuillez noter que les namespaces dans **src** doivent être préfixés par **Tigersun\\Interview** et ceux dans **test**
par **Tigersun\\Interview\\Test** comme vous pouvez le voir dans les différents exemples.

A l'appel de index.php, l'algorithme doit s'exécuter

## Remarques

Vous pouvez écrire dans cette partie toute remarque qui pourrait nous être utile lors de la correction

# Happy coding !
