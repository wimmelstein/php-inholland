# php-inholland

This repository serves as the code base for PHP 2 for Inholland University of Applied science.
The branches are not meant to be merged to master, since they are self contained for each lesson and subject.

# Docker

Deze repository maakt gebruik van Docker om een ontwikkel- en een runomgeving te maken. Om hiermee te kunnen werken dient eerst Docker te worden geïnstalleerd. Installeer hiervoor [Docker Desktop](https://www.docker.com/get-started).

In de root van het project staat altijd een php.yml. Dit is een YAML-file waarin de infrastructuur van ontwikkelomgeving staat beschreven.

In die YAML-file staan altijd de images die gebruikt worden, bijvoorbeeld: mysql:latest. Deze moet dan eerst worden
gedownload:

```docker pull mysql:latest```

De aanduiding latest is dan het versienummer. Dit kan ook anders zijn. Voor de php-server is het laatste image:
wimmelsoft/php-server-pdo:1.8.0. Legenda: <major version>.<major php version>.<minor version>

## Opstarten

Als alle images zijn gedownload dan kan de omgeving worden gestart. Dit kan middels het volgende commando uit te voeren
in de directory waar php.yml staat:

```docker stack deploy -c .\php.yml php8```

De output hiervan zal dan hierop lijken:

```
Creating network php8_php
Creating service php8_db
Creating service php8_server
Creating service php8_phpmyadmin
```

Is alles opgestart (geef het even een paar seconden) dan kan kan de webpagina van het project worden opgevraagd in de browser:

```http://localhost```

De adminer applicatie is een light variant op PHPMyAdmin en is te benaderen via de volgende url: ```http://localhost:8080```

Als je klaar bent met ontwikkelen, dan kun je de omgeving weer down brengen middels het volgende commando:

```docker stack rm php8```

De output ziet er dan als volgt uit:

```
Removing service php8_db
Removing service php8_phpmyadmin
Removing service php8_server
Removing network php8_php
```
Is het de bedoeling om de stack opnieuw op te starten, dan is het verstandig om tussen de ```docker rm``` een aantal seconden te wachten alvorens weer een ```stack deploy``` te doen. 

Om te zien welke services er draaien kan het volgende commando:
```docker stack ls```. De output moet er dan ongeveer zo uitzien:
```
NAME                SERVICES            ORCHESTRATOR
php8                3                   Swarm       
```

Wil je vervolgens weten welke services er dan draaien, voer dan het volgende uit:
```docker services ls```
De output moet er dan zo uitzien:

```
ID             NAME              MODE         REPLICAS   IMAGE                             PORTS
tawjbbh9qqy0   php8_db           replicated   1/1        mysql:latest
smfridn6mapp   php8_phpmyadmin   replicated   1/1        phpmyadmin:latest                 *:8080->80/tcp
5d6hy2b1v942   php8_server       replicated   1/1        wimmelsoft/php-server-pdo:1.8.0   *:80->80/tcp       
```

## Issues
Het is mogelijk dat in de eerste halve minuut na het opstarten van de applicatie MYSQL nog niet helemaal is opgestart. Dan is refreshen het antwoord op dit issue
