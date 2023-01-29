<?php

require_once(realpath(__DIR__ . '/base/FactoryBase.php'));
require_once(realpath(__DIR__ . '/../models/Product.php'));
require_once(realpath(__DIR__ . '/../models/CartProduct.php'));

class ProductFactory extends FactoryBase
{
    public function getAllProducts(){
        
        $products = array();

        $db = $this->dbConnect();
        $stmt = $db->query('SELECT * FROM tp1_produits ORDER BY 2');
        if (!$stmt) {
            echo 'Could not run query: ' . mysql_error();
            exit;
        }

        while($row = $stmt->fetch_row()){
            $products[] = new Product($row);
        }

        $stmt->close();

        return $products;
    }

    public function buyProduct($product_id, $quantity, $token){
        $db = $this->dbConnect();

        $stmt = $db->prepare('SELECT 1 FROM tp1_panier WHERE tp1_panier.Token = ? AND tp1_panier.ProduitId = ?');
        $stmt->bind_param("si", $token, $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows < 1){
            $stmt->close();
            $stmt = $db->prepare('INSERT INTO tp1_panier(ProduitId, Quantite, Token) VALUES(?,?,?)');
            $stmt->bind_param("iis", $product_id, $quantity, $token);
            $stmt->execute();

            echo "insert";
        }else{
            $stmt->close();
            $stmt = $db->prepare('UPDATE tp1_panier SET tp1_panier.Quantite = tp1_panier.Quantite + ? WHERE tp1_panier.Token = ? AND tp1_panier.ProduitId = ?');
            $stmt->bind_param("isi", $quantity, $token, $product_id);
            $stmt->execute();
            echo "update";
        }
        $stmt->close();
    }

    public function getCart($token){
        
        $products = array();

        $db = $this->dbConnect();
        $stmt = $db->prepare('SELECT Produit.Id, Produit.Nom, Produit.Quantite, Produit.Unite, Produit.Prix, Produit.Image, Panier.Quantite as Quantite_Panier
                            from tp1_panier as Panier 
                            inner join tp1_produits as Produit on Panier.ProduitId = Produit.Id
                            where Panier.Token = ?');

        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_row()){
            $products[] = new CartProduct($row);
        }

        $stmt->close();

        return $products;
    }

    public function deleteItem($item_id, $token){
        $db = $this->dbConnect();
        $stmt = $db->prepare('DELETE FROM tp1_panier WHERE tp1_panier.ProduitId = ? AND tp1_panier.Token = ?'); 
        $stmt->bind_param("is", $item_id, $token);
        $stmt->execute();
        $stmt->close();
    }
}