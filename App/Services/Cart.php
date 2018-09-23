<?php
/**
 * Created by PhpStorm.
 * User: monsajj
 * Date: 22.09.2018
 * Time: 10:54
 */

namespace App\Services;

use Core\Model;

/**
 * Class Cart
 * @package App\Models
 */
class Cart extends Model
{

    protected $table = 'cart';

    /**
    * @var
    */
    private $id;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productid;
    }

    /**
     * @param mixed $productid
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
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param mixed
     * @return int
     */
    public function checkExist($id):int
    {
        $cart = $this->getAll();
        foreach ($cart as $item){
            if ($id == $item->getProductId()){
                return $item->getId();
            }
        }

        return 0;
    }


    /**
     * @return array|mixed
     */
    protected function toArray()
    {
        return [
            'id' => $this->getId(),
            'productid' => $this->getProductId(),
            'amount' => $this->getAmount(),
        ];
    }
}