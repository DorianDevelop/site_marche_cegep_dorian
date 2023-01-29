<?php
$page_title = "Accueil";

require_once(realpath(__DIR__ . '/dal/DAL.php'));

$products = null;

$dal = new DAL();
$products = $dal->ProductFact()->getAllProducts();


ob_start(); // Active la mise en mémoire tampon de sortie
?>

<h1>Nos produits disponibles</h1>
<div class="content">
    <?php $product_id = 1;
    foreach($products as $product):?>
        <div class="card">
            <img src="img/<?= $product->image;?>" alt="Image du produit">
            <p><?= $product->name;?></p>
            <a href="product-view.php?id=<?= $product_id;?>" class="button">Voir l'article</a>
        </div>
    <?php $product_id += 1;
    endforeach;?>
</div>

<?php
$content = ob_get_clean(); // Récupère et efface le contenu actuel du tampon de sortie.

require('includes/template.php');
?>
