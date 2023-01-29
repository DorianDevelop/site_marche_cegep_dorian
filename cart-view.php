<?php
$page_title = "Panier";

require_once(realpath(__DIR__ . '/dal/DAL.php'));

$products = null;

$dal = new DAL();

if(!isset($_COOKIE["token"])){
    $products = [];
}else{
    $products = $dal->ProductFact()->getCart($_COOKIE["token"]);
}

$total_price = 0;

ob_start(); // Active la mise en mémoire tampon de sortie
?>

<h1>Votre panier d'achat</h1>
<div class="items">
    <?php 
    if(sizeOf($products) < 1){?>
        <p class="empty">Aucun produit dans le panier.</p>
    <?php 
    }
    else{
        foreach($products as $product):
    ?>
        <div class="item">
            <img src="img/<?= $product->image;?>" alt="Image du produit">
            <p><?= $product->cart_quantity;?> x <?= $product->name;?></p>
            <p><?= $product->cart_quantity * $product->quantity;?> <?= $product->unite;?></p>
            <p><?= $product->prix;?> $</p>
            <form action="cart-process.php?action=remove" method="post">
                <input type="number" name="item_id" style="display:none" value="<?= $product->id?>">
                <button type="submit" value="P" class="delete_btn"><i class="fa fa-trash"></i></button>
            </form>
            <?php $total_price = $total_price + ($product->cart_quantity * $product->prix)?>
        </div>
    <?php endforeach;}?>
    <p class="cout">Coût total : <?= $total_price?> $</p>
</div>
<a href="index.php" class="button">Continuer votre magasinage</a>

<?php
$content = ob_get_clean(); // Récupère et efface le contenu actuel du tampon de sortie.

require('includes/template.php');
?>
