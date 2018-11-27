<?php

namespace Service\Order;


use Service\Billing\IBilling;
use Service\Communication\ICommunication;
use Service\Discount\IDiscount;
use Service\Product\Product;
use Service\User\ISecurity;

class BasketBuilder
{
    /**
     * @var IBilling
     */
    private $billing;

    /**
     * @var IDiscount
     */
    private $discount;

    /**
     * @var ICommunication
     */
    private $communication;

    /**
     * @var ISecurity
     */
    private $security;

    /**
     * @var Product[]
     */
    private $products;

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     */
    public function setProducts(array $products):  BasketBuilder
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecurity()
    {
        return $this->security;
    }

    /**
     * @return mixed $security
     */
    public function setSecurity(ISecurity $security): BasketBuilder
    {
        $this->security = $security;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBilling()
    {
        return $this->billing;
    }

    /**
     * @return mixed $billing
     */
    public function setBilling(IBilling $billing): BasketBuilder
    {
        $this->billing = $billing;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @return mixed $discount
     */
    public function setDiscount(IDiscount $discount): BasketBuilder
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommunication()
    {
        return $this->communication;
    }

    /**
     * @return mixed $communication
     */
    public function setCommunication(ICommunication $communication): BasketBuilder
    {
        $this->communication = $communication;
        return $this;
    }

    public function build(): Checkout
    {
        return new Checkout($this);
    }
}