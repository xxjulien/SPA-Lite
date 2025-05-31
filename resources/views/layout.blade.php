// Code par NetNPB.com 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Laravel SPA Lite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      #progress { height: 3px; background: dodgerblue; width: 0%; transition: width 0.3s; position: fixed; top: 0; left: 0; z-index: 100; }
    </style>
</head>
<body>

<div id="progress"></div>

<nav>
    <a href="/" spa-link>Accueil</a>
    <a href="/about" spa-link>À propos</a>
</nav>

<hr>

<div id="spa-content">
    @include($view)
</div>

<script src="/js/spa-lite.js"></script>
</body>
</html>