# Projet de Plateforme Web pour Gestionnaire de Newsletter

## Contexte du Projet

Notre client, une entreprise en pleine croissance dans le secteur de la communication et du marketing, souhaite centraliser et rationaliser ses opérations en ligne. Pour répondre à ce besoin, nous développons une plateforme web interne intégrant des fonctionnalités avancées pour améliorer la communication, la gestion de l'information et la collaboration au sein de l'équipe.

## Fonctionnalités Clés

### Gestion de Newsletter (Spatie)

La plateforme doit permettre à l'entreprise d'envoyer des newsletters régulières à ses clients et partenaires. L'intégration du package Spatie Newsletter est essentielle pour faciliter la création, l'envoi et le suivi des campagnes de newsletters. Les fonctionnalités de gestion des abonnements et des listes de diffusion doivent être intuitives et conviviales.

### Authentification avec Gestion des Rôles (Policies et Guards)

La sécurité et la confidentialité des données sont primordiales. Nous avons besoin d'un système d'authentification robuste avec gestion des rôles basée sur les politiques et gardes de Laravel. Trois rôles distincts seront définis : Administrateur, Rédacteur et Membre. Chaque rôle aura des autorisations spécifiques pour accéder et modifier certaines parties de la plateforme.

### Fonctionnalités Forgot Password et Remember Me

Afin d'assurer une expérience utilisateur fluide, la plateforme doit inclure les fonctionnalités "forgot password" pour permettre aux utilisateurs de réinitialiser leur mot de passe, ainsi que la fonction "remember me" pour faciliter la connexion automatique.

### Media Library (Spatie)

La gestion de médias est un élément clé de la plateforme. Spatie Media Library sera utilisé pour permettre aux utilisateurs de télécharger, organiser et partager des fichiers multimédias tels que des images, des vidéos et des documents. Chaque média doit être associé à un utilisateur ou à un projet spécifique.

### Soft Delete

Afin d'éviter la perte accidentelle de données, la plateforme doit mettre en œuvre la fonctionnalité "soft delete". Cela signifie que les enregistrements ne seront pas supprimés physiquement de la base de données, mais plutôt marqués comme supprimés, offrant ainsi la possibilité de les restaurer si nécessaire.

### Middleware

Des middleware seront mis en place pour gérer les autorisations spécifiques aux rôles. Cela garantira que chaque utilisateur a accès uniquement aux fonctionnalités qui lui sont autorisées en fonction de son rôle.

### Génération PDF

La plateforme doit pouvoir générer des fichiers PDF à partir de données spécifiques. Par exemple, un rapport mensuel agrégeant les performances des campagnes de newsletters ou un récapitulatif des médias téléchargés sur une période donnée.

### Modélisation avec 3 Rôles

La base de données doit être modélisée de manière à prendre en charge les trois rôles définis (Administrateur, Rédacteur, Membre). Chaque rôle aura des tables et des relations spécifiques, assurant ainsi une séparation claire des données et des responsabilités au sein de la plateforme.

## Guide d'Installation

### Prérequis

- PHP >= 7.4
- Composer - Installez-le à partir de [https://getcomposer.org/](https://getcomposer.org/)
- Node.js et npm - Installez-les à partir de [https://nodejs.org/](https://nodejs.org/)
<!-- Ajoutez tout autre prérequis -->

### Installation

```bash
# Clonez le dépôt
git clone https://github.com/VotreNom/ProjetPlateformeWeb.git

# Accédez au répertoire du projet
cd ProjetPlateformeWeb

# Installez les dépendances PHP avec Composer
composer install

# Installez les dépendances JavaScript avec npm
npm install

# Configurez le fichier d'environnement
cp .env.example .env
php artisan key:generate

# Migratez la base de données
php artisan migrate

# Démarrez le serveur de développement
php artisan serve
