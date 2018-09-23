<?php
/**
 * Created by PhpStorm.
 * User: monsajj
 * Date: 22.09.2018
 * Time: 20:32
 */

namespace App\Services\Validators\Validators;

use App\Services\Validators\ValidatorInterface;

/**
 * Class CartStoreValidator
 * @package App\Services\Validators\Validators
 */
final class CartStoreValidator implements ValidatorInterface
{

    /**
     * @var array
     */
    private $structureStandard = [
        'productid', 'amount'
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

        return $this->checkStructure(array_keys($this->removeIgnoredField($params)));
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
}