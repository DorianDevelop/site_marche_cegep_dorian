<?php
class CartProduct
{
    public $id;
    public $name;
    public $quantity;
    public $unite;
    public $prix;
    public $image;
    public $cart_quantity;

    public function __construct($sql_row)
    {
        if (isset($sql_row)) {
            $this->id = $sql_row[0];
            $this->name = $sql_row[1];
            $this->quantity = $sql_row[2];
            $this->unite = $sql_row[3];
            $this->prix = $sql_row[4];
            $this->image = $sql_row[5];
            $this->cart_quantity = $sql_row[6];
        }
    }
}