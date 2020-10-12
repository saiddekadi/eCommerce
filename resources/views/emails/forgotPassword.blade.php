<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <p>
        Bonjour <h2>{{ $array['user']->nom }} {{ $array['user']->prenom }}</h2><br><br>
        Votre code de reunitialisation est : <b>{{ $array['code'] }}</b>
    </p>
  </body>
</html>