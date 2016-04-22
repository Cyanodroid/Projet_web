# Site Collaboratif

## Présentation

Projet réalisé lors de la troisième année de Licence à la Faculté des sciences d'Aix-Marseille.

## Installation

Assurez-vous d'avoir un serveur __Apache__ et __MySql__ sur les ports 80 et 3306 et que ces derniers pointent sur le dossier du projet (voir les préférences de MAMP).

## Installer la base de données

Afin de pouvoir tester l'application, il vous faut __importer__ la base de données.
Celle-ci se trouve dans le fichier __site.sql__. Une simple importation sur phpMyAdmin devrait suffire.

:warning: Assurez-vous que la base de données soit bien nommée "__site__" :warning:

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

#### Système de Newsletter

Le système de Newsletter implémente le recaptcha de Google.

Vous devez dans un premier temps générer des clés reCAPTCHA pour votre localhost via le site de [Google](https://www.google.com/recaptcha/intro/)

Vous devez ensuite modifier les fichiers suivants :

Le fichier __NewslettersController.php__ (ligne 17), qui se trouve dans le dossier __app/Controller/__, comme ceci :

```php
$captcha = new recaptcha('clé_secrète');
```

Le fichier __newsletter.php__ (ligne 27), qui se trouve dans le dossier __app/View/Elements/__, comme ceci :

```php
echo("<div class=\"g-recaptcha\" data-sitekey=\"clé_du_site\"></div>");
```

### Système de Contact

Comme pour la Newsletter, le système de Contact implémente le recaptcha de Google.

Vous devez modifier le fichier __ContactController.php__ (ligne 14), qui se trouve dans le dossier __app/Controller/__, comme ceci :

```php
$captcha = new recaptcha('clé_secrète');
```

#### Système de paiement : Paypal

Vous devez disposer d'un compte [Paypal Développeur](https://developer.paypal.com/) (acheteur et vendeur) afin de pouvoir tester cette fonctionnalité.

De plus, vous devez vous connecter, grâce à vos comptes de développeur, sur [Paypal Sandbox](https://www.sandbox.paypal.com/signin/) afin de générer un bouton d'abonnement que vous devez placer dans le fichier __subscribe.php__, qui se trouve dans le dossier __app/View/Users/__ et copier le bouton générer par paypal comme ceci :

```php
//application Paypal
echo("<div class=\"centered\">");
    echo("<form action=\"le_site\" method=\"post\" target=\"_top\">");
        echo("<input type=\"hidden\" name=\"cmd\" value=\"la_valeur\">");
        echo("<input type=\"hidden\" name=\"hosted_button_id\" value=\"la_valeur\">");
        echo("<input type=\"image\" src=\"une_image\" border=\"0\" name=\"submit\" alt=\"PayPal, le réflexe sécurité pour payer en ligne\">");
        echo("<img alt=\"\" border=\"0\" src=\"une_image\" width=\"1\" height=\"1\">");
    echo("</form>");
echo("</div>");
```

:warning: Sans cela, vous ne pourrez pas tester cette fonctionnalité :warning:

### License : MIT
