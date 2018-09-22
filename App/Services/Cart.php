<?php
/**
 * Created by PhpStorm.
 * User: monsajj
 * Date: 22.09.2018
 * Time: 10:54
 */

namespace App\Services;


use Core\Model;

class Cart extends Model
{

    /**
     * @var
     */
    private $productid;

    /**
     * @var
     */
    private $amount;

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productid;
    }

    /**
     * @param mixed $id
     */
    public function setProductId($productid): void
    {
        $this->productid = $productid;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $name
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    protected function toArray()
    {
        return [
            'productid' => $this->getProductId(),
            'amount' => $this->getAmount(),
        ];
    }
}