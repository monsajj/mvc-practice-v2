<?php
/**
 * Created by PhpStorm.
 * User: monsajj
 * Date: 22.09.2018
 * Time: 17:33
 */

namespace App\Services\Store\Services;

use App\Services\Cart;
use App\Services\Store\StoreService;
use Core\Model;

/**
 * Class CartStore
 * @package App\Services\Store\Services
 */
final class CartStore extends StoreService
{

    /**
     * @var Cart
     */
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
        parent::__construct($cart);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return mixed
     */
    protected function fillFields(Model $model, array $data)
    {
        /**
         * @var Cart $model
         */

        $model->setProductId($data['productid']);
        $model->setAmount($data['amount']);

        return $model;
    }

    public function getDataToAdd($productId){
        $idInCart = $this->cart->getIdByProductId($productId);
        if($idInCart){
            $product = $this->cart->findById($idInCart);
            $amount = $product->getAmount();
            $data = ['id' => $idInCart, 'productid' => $productId, 'amount' => $amount + 1];
        } else {

            $data = ['productid' => $productId, 'amount' => 1];
        }

        return $data;
    }

    public function getDataToDelete($id)
    {

        $product = $this->cart->findById($id);
        $productId = $product->getProductId();
        $amount = $product->getAmount();
        $data = ['id' => $id, 'productid' => $productId, 'amount' => $amount - 1];

        return $data;
    }
}