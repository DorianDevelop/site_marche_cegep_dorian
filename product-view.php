<?php
$id = $_GET['id'];

require_once(realpath(__DIR__ . '/dal/DAL.php'));

$product = null;

$dal = new DAL();
$product = $dal->ProductFact()->getAllProducts()[$id - 1];


$page_title = $product->name;

ob_start(); // Active la mise en mémoire tampon de sortie
?>

<h1><?= $product->name ?></h1>
<div class="product">
    <img src="img/<?= $product->image;?>" alt="Image du produit">
    <form action="cart-process.php?action=add&productid=<?= $product->id?>" method="post" class="details">
        <h3>Details du produit</h3>
        <p><?= $product->quantity;?> <?= $product->unite;?></p>
        <p><?= $product->prix;?> $</p>
        <div class="quantity">
            <p>Quantité : </p>
            <input type="number" id="quantity" name="quantity" min="1" value="1" max="10">
        </div>
        <button class="button" type="submit">Ajouter au panier</button>
    </form>
</div>

<?php
$content = ob_get_clean(); // Récupère et efface le contenu actuel du tampon de sortie.

require('includes/template.php');
?>