# Site Collaboratif

## Présentation

Projet réalisé lors de la troisième année de Licence à la Faculté des sciences d'Aix-Marseille.

## Installation

Assurez-vous d'avoir un serveur __Apache__ et __MySql__ sur les ports 80 et 3306 et que ces derniers pointent sur le dossier du projet (voir les préférences de MAMP).

## Installer la base de données

Afin de pouvoir tester l'application, il vous faut __importer__ la base de données.
Celle-ci se trouve dans le fichier __site.sql__. Une simple importation sur phpMyAdmin devrait suffire.

## Configuration

Afin que les fonctionnalités puissent marcher correctement, vous devez modifier quelques lignes du code source.

#### Envoi de mail

Pour pouvoir envoyer des mails vous devez disposer d'une adresse gmail et modifier le fichier __email.php__, qui se trouve dans le dossier __app/Config/__, comme ceci :

```php
public $gmail = array(
    'host' => 'ssl://smtp.gmail.com',
    'port' => 465,
    'username' => 'votre_adresse@gmail.com', // rentrez votre adr gmail
    'password' => 'votre_mot_de_passe', // ainsi que votre mdp
    'transport' => 'Smtp'
);
```

à la suite de quoi, il vous faut modifier les paramètres de sécurité de votre compte google permettant aux applications moins sécurisées de vous envoyer des mails.

Ensuite, vous devez modifier le fichier __bootstrap.php__, qui se trouve dans le dossier __app/Config/__, comme ceci :

```php
Configure::write('Site_Contact', array(
	'mail' => 'votre_adresse@gmail.com'
));
```

#### Gestion du tchat

Pour pouvoir correctement gérer le tchat, vous devez modifier la valeur de la variable __$directory__ du fichier __ChatsController.php__ (ligne 156, fonction envoyer_mail), qui se trouve dans le dossier __app/Controller/__, comme ceci :

```php
$directory = '_chemin_absolu_vers_projet_/Projet_web/sitecollaboratif/app/tmp/logs/' . $id . '.log';
```

### Système de Newsletter

Le système de Newsletter implémente le recaptcha de Google.

Vous devez donc modifier les fichiers suivants :

Le fichier __NewslettersController.php__ (ligne 17), qui se trouve dans le dossier __app/Controller/__, comme ceci :

```php
$captcha = new recaptcha('votre_cle_secrète');
```

Le fichier __newsletter.php__ (ligne 27), qui se trouve dans le dossier __app/View/Elements/__, comme ceci :

```php
echo("<div class=\"g-recaptcha\" data-sitekey=\"votre_cle_publique\"></div>");
```

### License : MIT