# Zend Framework 1

## Prérequis

* Installer Apache
* Installer PHP (par exemple avec XAMPP/WAMP/MAMP/EasyPHP ou autre)
* Ajouter le dossier qui contient `php.exe` à la variable d'envr PATH (Window : clic droit sur Ordinateur / Paramètres Systèmes Avancés / Variables d'environnement / soit User soit Système, exemple Path = `c:\xampp\php`, sous Unix éditer par exemple `~/.bashrc` ou `~/.bash_profile` avec une ligne du genre `export PATH=~/.composer/vendor/bin:$PATH` )
  * Tester la commande `php -v`
* Installer composer (sous window composer-setup.exe sur http://getcomposer.org)
  * Tester la commande `composer --version`

## Installation (moderne) de ZF1 sous Windows

* Installer Zend Framework 1 : `composer global require zendframework/zendframework1`
  * Si Windows parle d'un chemin trop long, créer la variable d'envr `COMPOSER_HOME` vers un chemin court par exemple `c:\composer`

* Ajouter `c:\composer\vendor\zendframework\zendframework1\bin` au PATH (ex : `c:\xampp\php;c:\composer\vendor\bin;c:\composer\vendor\zendframework\zendframework1\bin`)
  * Tester la commande `zf show version`
  
## Création du projet


* Editer le fichier `C:\Users\YOUR_ACCOUNT\.zf.ini` ou Unix `~/.zf.ini` et ajouter la config pour Netbeans (si nécessaire) et PHPUnit (exemple sous Windows avec Netbeans + XAMPP) :

	php.include_path = "C:\Users\romain\dev\ZendFramework-1.12.17\library;C:\Program Files\NetBeans 8.1\php\zend;C:\xampp\php\pear"
	basicloader.classes.0 = "NetBeansCommandsProvider"
	basicloader.classes.1 = "PHPUnit_Framework_SelfDescribing"
	basicloader.classes.2 = "PHPUnit_Framework_Test"
	basicloader.classes.3 = "PHPUnit_Framework_Assert"
	basicloader.classes.4 = "PHPUnit_Framework_TestCase"

* Sous DOS se placer dans le dossier dans lequel on souhaite créer un projet
* Créer le projet avec `zf create project NOM_DU_PROJET`
* Se placer dans le projet et lancer la commande `composer require zendframework/zendframework1`
  * Si Windows parle d'un chemin trop long, déplacer le projet en l'approchant de la racine ou copier le dossier Zend dans `library/`
* Si l'install avec composer fonctionne éditer le fichier `public/index.php` :

Remplacer les lignes :

	set_include_path(implode(PATH_SEPARATOR, array(
	    realpath(APPLICATION_PATH . '/../library'),
	    get_include_path(),
	)));

	/** Zend_Application */
	require_once 'Zend/Application.php';

Par celle-ci :

    require_once '../vendor/autoload.php';
	

## Configuration d'un virtual host

* Editer le fichier `c:\Windows\System32\drivers\etc\hosts` en étant admin (si besoin clic droit sur bloc-notes / ouvrir en tant qu'admin) ajouter la ligne :

    127.0.0.1    addressbook.zf1
	
* Récupérer la config dans `docs/README.txt` et l'écrire dans le fichier `conf/extra/httpd-vhosts.conf` d'Apache (en vérifiant au préalable qu'il soit bien inclus dans `conf/httpd.conf`, le `#` étant un commentaire)

* Ajouter cette config sous la forme :

	<VirtualHost *:80>
	    DocumentRoot "c:\xampp\htdocs"
	    ServerName localhost
	</VirtualHost>

	<VirtualHost *:80>
	   DocumentRoot "c:\web\ZF1AddressBook\public"
	   ServerName addressbook.zf1

	   # This should be omitted in the production environment
	   SetEnv APPLICATION_ENV development

	   <Directory "c:\web\ZF1AddressBook\public">
	       Options Indexes MultiViews FollowSymLinks
	       AllowOverride All
	       Require all granted
	   </Directory>

	</VirtualHost>
	
* Redémarrer Apache
	
## Configurer Xdebug

* Editer le fichier `php.ini`

	[xdebug]
	zend_extension = "CHEMIN_VERS_FICHIER_php_xdebug.dll_ou_.so"
	xdebug.remote_enable = 1
* Redémarrer Apache
* Dans Netbeans clic droit sur le projet / Properties / Run configuration / Advanced / Ask Every Time


