# Crayon & Bois

Mini application Laravel pour ecrire et gerer des pensees.

## Fonctionnalites

- Ajouter une pensee
- Afficher les pensees (ordre recent -> ancien)
- Supprimer une pensee
- Validation serveur (`contenu` requis)

## Stack

- PHP / Laravel
- Blade
- SQLite (par defaut)

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Ouvrir: `http://127.0.0.1:8000`

## Routes principales

- `GET /` -> liste des pensees
- `POST /pensees` -> creation d'une pensee
- `DELETE /pensees/{pensee}` -> suppression d'une pensee

## Structure utile

- `app/Http/Controllers/PenseeController.php`
- `app/Models/Pensee.php`
- `resources/views/index.blade.php`
- `routes/web.php`

## Auteur

ADZ
