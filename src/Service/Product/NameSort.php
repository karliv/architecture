<?php

declare(strict_types = 1);

namespace Service\Product;

use \Model\Entity\Product;

class NameSort implements ISorting
{
    /**
     * @param array $productList
     * @return array
     */
    public function sort(array $productList)
    {
        usort($productList, function (Product $item1, Product $item2){
            if ($item1->getName() === $item2->getName()) {
                return 0;
            }

            return true;
        });

        return $productList;
    }
}