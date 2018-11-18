<?php

namespace Service\Product;


class SortedCollection
{
    public function sort(ISorting $typeForSort, array $products)
    {
        return $typeForSort->sort($products);
    }
}