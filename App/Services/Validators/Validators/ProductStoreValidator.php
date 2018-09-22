<?php
/**
 * Created by PhpStorm.
 * User: monsajj
 * Date: 21.09.2018
 * Time: 14:08
 */

namespace App\Services\Validators\Validators;

use App\Services\Validators\ValidatorInterface;

/**
 * Class ProductStoreValidator
 * @package App\Services\Validators\Validators
 */
final class ProductStoreValidator implements ValidatorInterface
{

    /**
     * @var array
     */
    private $structureStandard = [
        'name', 'categoryid', 'code', 'price', 'availability', 'brand', 'description', 'isnew', 'isrecommended', 'status'
    ];

    /**
     * @var array
     */
    private $ignoredFields = [
        'id'
    ];

    /**
     * @param array $params
     * @return bool
     */
    public function validate(array $params): bool
    {

        return $this->checkStructure(array_keys($this->removeIgnoredField($params)))
            && $this->checkNameLenght($params['name'])
            && $this->checkCodeLenght($params['code'])
            && $this->checkPriceLenght($params['price'])
            && $this->checkBrandLenght($params['brand'])
            && $this->checkDescriptionLenght($params['description']);
    }

    /**
     * @param array $params
     * @return bool
     */
    private function checkStructure(array $params)
    {
        $standard = $this->structureStandard;
        natsort($params);
        natsort($standard);

        return $params === $standard;
    }

    /**
     * @param array $params
     * @return array
     */
    private function removeIgnoredField(array $params)
    {
        foreach ($this->ignoredFields as $ignoredField) {
            unset($params[$ignoredField]);
        }

        return $params;
    }

    /**
     * @param string $name
     * @return bool
     */
    private function checkNameLenght(string $name)
    {
        return strlen($name) > 2;
    }

    private function checkCodeLenght(string $code)
    {
        return strlen($code) > 2;
    }

    private function checkPriceLenght(string $price)
    {
        return strlen($price) > 2;
    }

    private function checkBrandLenght(string $brand)
    {
        return strlen($brand) > 2;
    }

    private function checkDescriptionLenght(string $description)
    {
        return strlen($description) > 2;
    }
}