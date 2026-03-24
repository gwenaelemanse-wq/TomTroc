# TomTroc — Installation

TomTroc est une application web d’échange de livres (PHP + MySQL) avec messagerie.

## Prérequis

- XAMPP (Apache + MySQL + phpMyAdmin)
- Navigateur web

## Structure importante

- Point d’entrée : "public/index.php"
- Configuration DB : "app/config/config.php"
- Fichier SQL : "database/tomtroc.sql"

## Installation (local avec XAMPP)

### 1) Mettre le projet dans "htdocs"

1. Copier le dossier du projet dans :
   - C:\xampp\htdocs\Tomtroc
2. Démarrer Apache et MySQL dans le panneau XAMPP.

### 2) Importer la base de données

1. Ouvrir phpMyAdmin : "http://localhost/phpmyadmin"
2. Créer la base "tomtroc" 
3. Onglet "Importer"
4. Importer le fichier : "database/tomtroc.sql"

> Le fichier SQL contient la création des tables et des données de démonstration.

### 3) Vérifier la configuration MySQL

Ouvrir : "app/config/config.php"

Par défaut :
- `DB_HOST` = `localhost`
- `DB_NAME` = `tomtroc`
- `DB_USER` = `root`
- `DB_PASS` = `` (vide)

Si ton MySQL a un mot de passe, modifier `DB_USER` / `DB_PASS`.

### 4) Lancer l’application

Ouvrir :
- "http://localhost/Tomtroc"

## Dépannage

- Page blanche / erreurs : vérifier que Apache + MySQL sont démarrés dans XAMPP.
- Erreur DB : vérifier les identifiants dans "app/config/config.php" et que la base a bien été importée.
- Upload d’images (si utilisé) : vérifier les droits d’écriture du dossier d’upload côté serveur.

## Comptes / données de démo

Le fichier "database/tomtroc.sql" installe des données de démonstration pour tester rapidement (utilisateurs, livres, messages).