<?php

namespace App\Models\Product;

use Core\Model;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'product';

    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $categoryid;

    /**
     * @var
     */
    private $code;

    /**
     * @var
     */
    private $price;

    /**
     * @var
     */
    private $availability;

    /**
     * @var
     */
    private $brand;

    /**
     * @var
     */
    private $description;

    /**
     * @var
     */
    private $isnew;

    /**
     * @var
     */
    private $isrecommended;

    /**
     * @var
     */
    private $status;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getCategoryId():int
    {
        return $this->categoryid;
    }

    /**
     * @param mixed $categoryid
     */
    public function setCategoryId($categoryid): void
    {
        $this->categoryid = $categoryid;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param mixed $availability
     */
    public function setAvailability($availability): void
    {
        $this->availability = $availability;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getisNew()
    {
        return $this->isnew;
    }

    /**
     * @param mixed $isnew
     */
    public function setIsNew($isnew): void
    {
        $this->isnew = $isnew;
    }

    /**
     * @return mixed
     */
    public function getisRecommended()
    {
        return $this->isrecommended;
    }

    /**
     * @param mixed $isrecommended
     */
    public function setIsRecommended($isrecommended): void
    {
        $this->isrecommended = $isrecommended;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return array|mixed
     */
    protected function toArray()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'status' => $this->getStatus(),
            'categoryid' => $this->getCategoryId(),
            'brand' => $this->getBrand(),
            'code' => $this->getCode(),
            'price' => $this->getPrice(),
            'availability' => $this->getAvailability(),
            'description' => $this->getDescription(),
            'isnew' => $this->getisNew(),
            'isrecommended' => $this->getisRecommended(),
        ];
    }
}