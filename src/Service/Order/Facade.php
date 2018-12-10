<?php

namespace Service\Order;

use Model;
use Service\Billing\Card;
use Service\Communication\Email;
use Service\Discount\NullObject;
use Service\User\Security;

class Facade
{
    public function checkout($session, $productInfo): void
    {
        /**
         * @var $basketBuilder BasketBuilder
         */
        $basketBuilder = (new BasketBuilder())
            ->setBilling(new Card())
            ->setDiscount(new NullObject())
            ->setCommunication(new Email())
            ->setSecrurity(new Security($session))
            ->setProducts($productInfo);

        $builder = $basketBuilder->build();
        $builder->checkoutProcess();
    }
}