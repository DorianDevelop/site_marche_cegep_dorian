<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $page_title ?></title>
    <link rel="icon" type="image/x-icon" href="img/favicon/favicon-96x96.png">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/template.css">
</head>
<body>
    <header>
        <h1>Mon épicerie en ligne</h1>
        <div>
            <a href="index.php"><i class="fa fa-home"></i>  Accueil</a> |
            <a href="cart-view.php"><i class="fa fa-shopping-cart"></i>  Mon panier</a>
        </div>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer>
        <h4>Dorian Faure</h4>
        <p>Tout droits réservés @ cchic.ca</p>
    </footer>
</body>
</html>