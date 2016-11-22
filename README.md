## Installation (moderne) de Zend Framework 1

# Prérequis

* Installer PHP (par exemple avec XAMPP/WAMP/MAMP/EasyPHP ou autre)
* Ajouter le dossier qui contient php.exe à la variable d'envr PATH (Window : clic droit sur Ordinateur / Paramètres Systèmes Avancés / Variables d'environnement / soit User soit Système, exemple Path = c:\xampp\php )
* Installer composer (sous window composer-setup.exe sur http://getcomposer.org)

# Sous Windows

* Créer la variable d'envr COMPOSER_HOME vers un chemin court comme c:\composer
* Installer Zend Framework 1 : composer global require zendframework/zendframework1
* Ajouter c:\composer\vendor\zendframework\zendframework1\bin au PATH (ex : c:\xampp\php;c:\composer\vendor\bin;c:\composer\vendor\zendframework\zendframework1\bin )