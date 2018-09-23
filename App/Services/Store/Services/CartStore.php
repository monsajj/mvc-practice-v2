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

    public function __construct(Cart $cart)
    {
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
}