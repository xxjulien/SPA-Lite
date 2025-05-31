A package that made simple to turn your Laravel or PHP website into a real S.P.A. without any framework.

# SPA-lite for Laravel

> A package that makes it simple to turn your Laravel or PHP website into a real Single Page Application (SPA) — **without using any JavaScript or PHP frontend framework**.

![Laravel SPA-lite](https://img.shields.io/badge/SPA-lite-minimalist-blue)

## 🧩 What is it?

**SPA-lite** is a minimalist package for Laravel that uses Blade templates and a tiny vanilla JavaScript router to:
- Dynamically load views without full page reloads
- Keep browser history and navigation
- Display a clean top progress bar
- Maintain SEO and server-side rendering

It's like Livewire's `wire:navigate`, but stripped down to its essentials.

---

## ✨ Features

- ✅ Client-side navigation with history support  
- ✅ Dynamic view injection (`div#spa-content`)  
- ✅ Top progress bar  
- ✅ Fully compatible with Laravel Blade  
- ✅ No dependency on Vue, React, or Livewire  
- ✅ Progressive enhancement: works without JS too

---

## 📦 Installation

### Step 1 — Add the package

Place the contents of this repository in:

```
packages/YourVendor/SPA-lite
```

### Step 2 — Register the repository in your main `composer.json`

```json
"repositories": [
  {
    "type": "path",
    "url": "./packages/YourVendor/SPA-lite"
  }
]
```

Then install:

```bash
composer require your-vendor/spa-lite:dev-main
```

### Step 3 — Publish the assets

```bash
php artisan vendor:publish --tag=spa-lite-assets
```

This will publish:
- A JavaScript router to `/public/js/spa-lite.js`
- A Blade layout to `resources/views/layouts/spa.blade.php`

---

## 🛠 Usage

### Add your views

Create pages like:

```blade
<!-- resources/views/pages/home.blade.php -->
<h1>Bienvenue sur la page d’accueil</h1>
<p>Contenu dynamique chargé via SPA-lite.</p>
```

```blade
<!-- resources/views/pages/about.blade.php -->
<h1>À propos</h1>
<p>Cette page est aussi chargée dynamiquement.</p>
```

### Define your routes

Edit `routes/spa.php`:

```php
use Illuminate\Support\Facades\Route;

Route::get('/', fn () =>
    request()->header('X-SPA')
        ? view('pages.home')->render()
        : view('spa-lite::layout', ['view' => 'pages.home'])
);

Route::get('/about', fn () =>
    request()->header('X-SPA')
        ? view('pages.about')->render()
        : view('spa-lite::layout', ['view' => 'pages.about'])
);
```

### Use the layout

Ensure `spa-lite::layout` is used for full rendering:

```blade
<!-- layout includes -->
<div id="spa-content">
    @include($view)
</div>
```

### Link between pages

Use `spa-link` attribute:

```blade
<a href="/" spa-link>Accueil</a>
<a href="/about" spa-link>À propos</a>
```

---

## ⚡️ JavaScript Router

Located in `public/js/spa-lite.js`, it:

- Intercepts clicks on `a[spa-link]`
- Fetches the new view content with `X-SPA` header
- Replaces `#spa-content` inner HTML
- Pushes history state
- Triggers a smooth progress bar

No dependencies, only native JS.

---

## ✅ Progressive Enhancement

If JavaScript is disabled:
- Routes still work
- Full pages are rendered via layout

---

## 📜 License

MIT

---

## 🧙‍♂️ Created for simplicity

Because not every Laravel project needs Vue, Livewire, or Inertia — sometimes, all you want is speed and clarity.




# SPA-lite pour Laravel

> Un package qui permet de transformer facilement un site Laravel ou PHP en **véritable SPA (Single Page Application)** — **sans aucun framework JavaScript ou PHP côté client**.

![Laravel SPA-lite](https://img.shields.io/badge/SPA-lite-minimaliste-blue)

## 🧩 C'est quoi ?

**SPA-lite** est un package ultra-léger pour Laravel qui utilise uniquement Blade + un petit routeur JavaScript natif pour :
- Charger dynamiquement les vues sans recharger toute la page
- Gérer l’historique du navigateur
- Afficher une barre de progression en haut de la page
- Conserver le rendu côté serveur et le SEO

C’est l’équivalent ultra-minimaliste du `wire:navigate` de Livewire.

---

## ✨ Fonctionnalités

- ✅ Navigation côté client avec historique  
- ✅ Injection dynamique du contenu dans `div#spa-content`  
- ✅ Barre de progression fluide  
- ✅ 100 % compatible avec les vues Blade  
- ✅ Zéro dépendance à Vue, React, Livewire ou Inertia  
- ✅ Fonctionne même sans JavaScript (rendu côté serveur)

---

## 📦 Installation

### Étape 1 — Ajouter le package

Place ce package dans :

```
packages/VotreVendor/SPA-lite
```

### Étape 2 — Enregistrer le dépôt dans le `composer.json` principal

```json
"repositories": [
  {
    "type": "path",
    "url": "./packages/VotreVendor/SPA-lite"
  }
]
```

Puis installer :

```bash
composer require votre-vendor/spa-lite:dev-main
```

### Étape 3 — Publier les assets

```bash
php artisan vendor:publish --tag=spa-lite-assets
```

Cela publiera :
- Le routeur JavaScript dans `/public/js/spa-lite.js`
- Le layout Blade dans `resources/views/layouts/spa.blade.php`

---

## 🛠 Utilisation

### Créer vos vues

Ajoute des pages comme :

```blade
<!-- resources/views/pages/home.blade.php -->
<h1>Bienvenue sur la page d’accueil</h1>
<p>Contenu chargé dynamiquement grâce à SPA-lite.</p>
```

```blade
<!-- resources/views/pages/about.blade.php -->
<h1>À propos</h1>
<p>Cette page est aussi chargée dynamiquement.</p>
```

### Définir vos routes

Dans `routes/spa.php` :

```php
use Illuminate\Support\Facades\Route;

Route::get('/', fn () =>
    request()->header('X-SPA')
        ? view('pages.home')->render()
        : view('spa-lite::layout', ['view' => 'pages.home'])
);

Route::get('/about', fn () =>
    request()->header('X-SPA')
        ? view('pages.about')->render()
        : view('spa-lite::layout', ['view' => 'pages.about'])
);
```

### Utiliser le layout

Assurez-vous d'utiliser `spa-lite::layout` dans vos pages complètes :

```blade
<!-- spa-lite::layout -->
<div id="spa-content">
    @include($view)
</div>
```

### Lier les pages entre elles

Utilisez l’attribut `spa-link` :

```blade
<a href="/" spa-link>Accueil</a>
<a href="/about" spa-link>À propos</a>
```

---

## ⚡️ Routeur JavaScript

Situé dans `public/js/spa-lite.js`, il :
- Intercepte les clics sur les liens avec `spa-link`
- Envoie une requête AJAX avec l’en-tête `X-SPA`
- Remplace le contenu de `#spa-content`
- Met à jour l’URL via `history.pushState`
- Affiche une barre de progression animée

Aucune dépendance, seulement du JavaScript natif.

---

## ✅ Rendu progressif

Si JavaScript est désactivé :
- Les routes fonctionnent normalement
- Les pages sont rendues avec Blade côté serveur

---

## 📜 Licence

MIT

---

## 🧙‍♂️ Pensé pour la simplicité

Parce qu’un projet Laravel n’a pas toujours besoin de Vue, React, Livewire ou Inertia.  
Parfois, tout ce qu’il faut, c’est de la vites

