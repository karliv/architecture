<?php

declare(strict_types = 1);

namespace Service\Product;

use \Model\Entity\Product;

class PriceSort implements ISorting
{
    /**
     * @param array $productList
     * @return array
     */
    public function sort(array $productList)
    {
        usort($productList, function (Product $item1, Product $item2){
            if ($item1->getPrice() === $item2->getPrice()) {
                return 0;
            }

            return ($item1->getPrice() < $item2->getPrice()) ? -1 : 1;
        });

        return $productList;
    }
}