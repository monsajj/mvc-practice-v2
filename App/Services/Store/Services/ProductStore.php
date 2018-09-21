<?php
/**
 * Created by PhpStorm.
 * User: monsajj
 * Date: 21.09.2018
 * Time: 14:14
 */

namespace App\Services\Store\Services;

use App\Models\Product\Product;
use App\Services\Store\StoreService;
use Core\Model;

/**
 * Class ProductStore
 * @package App\Services\Store\Services
 */
final class ProductStore extends StoreService
{

    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return mixed
     */
    protected function fillFields(Model $model, array $data)
    {
        /**
         * @var Product $model
         */
        $model->setName($data['name']);
        $model->setCategoryId($data['categoryid']);
        $model->setCode($data['code']);
        $model->setPrice($data['price']);
        $model->setAvailability($data['availability']);
        $model->setBrand($data['brand']);
        $model->setDescription($data['description']);
        $model->setIsNew($data['isnew']);
        $model->setIsRecommended($data['isrecommended']);
        $model->setStatus($data['status']);

        return $model;
    }
}