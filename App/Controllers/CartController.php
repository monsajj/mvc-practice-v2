<?php
/**
 * Created by PhpStorm.
 * User: monsajj
 * Date: 22.09.2018
 * Time: 10:04
 */

namespace App\Controllers;

use App\Models\Product\Category;
use App\Models\Product\Product;
use Core\Request;
use \Core\View;
use \Core\Session;
use App\Services\Cart;

class CartController extends \Core\Controller
{

    /**
     * @var Product
     */
    private $cart;

    /**
     * @var Session
     */
    private $session = ['id' => 34];

    /**
     * CartController constructor.
     * @param Request $request
     * @param Product $product
     */
    public function __construct(Request $request, Cart $cart)
    {
        $this->cart = $cart;
        parent::__construct($request);
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        $products = $this->cart->getAll();


        View::renderTemplate('cart/index.html', [
            'products' => $products
        ]);
    }
}