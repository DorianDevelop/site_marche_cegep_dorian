<?php

require_once(realpath(__DIR__ . '/factories/ProductFactory.php'));

class DAL
{
    private $productFact = null;

    public function ProductFact()
    {
        if ($this->productFact == null) {
            $this->productFact = new ProductFactory();
        }

        return $this->productFact;
    }
}
