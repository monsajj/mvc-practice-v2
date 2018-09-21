<?php
/**
 * Created by PhpStorm.
 * User: monsajj
 * Date: 21.09.2018
 * Time: 13:52
 */

namespace App\Controllers\Admin;

use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Services\Store\Services\ProductStore;
use App\Services\Validators\Validators\ProductStoreValidator;
use Core\Controller;
use Core\Request;
use Core\View;

/**
 * Class ProductController
 * @package App\Controllers\Admin
 */
class ProductController extends Controller
{

    /**
     * @var Product
     */
    private $product;

    /**
     * @var ProductStoreValidator
     */
    private $productValidator;

    /**
     * @var ProductStore
     */
    private $productStore;

    /**
     * ProductController constructor.
     * @param Request $request
     * @param Product $product
     * @param ProductStoreValidator $validator
     * @param ProductStore $productStore
     */
    public function __construct(
        Request $request,
        Product $product,
        ProductStoreValidator $validator,
        ProductStore $productStore
    ) {
        $this->product = $product;
        $this->productValidator = $validator;
        $this->productStore = $productStore;
        parent::__construct($request);
    }

    /**
     *
     */
    public function index()
    {
        $products = $this->product->getAll();


        View::renderTemplate('admin/products/index.html', [
            'products' => $products
        ]);
    }

    /**
     *
     */
    public function create()
    {
        View::renderTemplate('admin/products/create.html');
    }

    /**
     * @return void
     */
    public function store()
    {
        $data = $this->request->getInput();
        $data['categoryid'] = (int)$data['categoryid'];

        if ($this->productValidator->validate($data)) {
            $this->productStore->store($data);
        }

        return $this->redirect('\admin\products');
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->product->delete($id);

        return $this->redirect('\admin\products');
    }

    /**
     * @param $id
     */
    public function update($id)
    {
        $product = $this->product->findById($id);

        View::renderTemplate('admin/products/update.html', [
            'product' => $product
        ]);
    }
}