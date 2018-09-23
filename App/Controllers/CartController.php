<?php
/**
 * Created by PhpStorm.
 * User: monsajj
 * Date: 22.09.2018
 * Time: 10:04
 */

namespace App\Controllers;

use App\Models\Product\Product;
use App\Services\Store\Services\CartStore;
use App\Services\Validators\Validators\CartStoreValidator;
use Core\Request;
use \Core\View;
use App\Services\Cart;

class CartController extends \Core\Controller
{

    /**
     * @var Cart
     */
    private $cart;

    /**
     * @var CartStore
     */
    private $cartStore;

    /**
     * @var CartStoreValidator
     */
    private $cartValidator;

    /**
     * @var Product
     */
    private $product;

    /**
     * CartController constructor.
     * @param Request $request
     * @param Cart $cart
     * @param Product $product
     * @param CartStore $cartStore
     * @param CartStoreValidator $validator
     */
    public function __construct(Request $request, Cart $cart, Product $product, CartStore $cartStore, CartStoreValidator $validator)
    {
        $this->product = $product;
        $this->cart = $cart;
        $this->cartStore = $cartStore;
        $this->cartValidator = $validator;
        parent::__construct($request);
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        $cart = $this->cart->getAll();
        $products = $this->product->getAll();
        View::renderTemplate('cart/index.html', [
            'cart_products' => $cart,
            'products' => $products
        ]);
    }

    /**
     * Adding product to cart
     * @param $productId
     */
    public function addToCart($productId)
    {

        $idInCart = $this->cart->checkExist($productId);
        if($idInCart){
            $product = $this->cart->findById($idInCart);
            $amount = $product->getAmount();
            $data = ['id' => $idInCart, 'productid' => $productId, 'amount' => $amount + 1];
        } else {

            $data = ['productid' => $productId, 'amount' => 1];
        }

        if ($this->cartValidator->validate($data)) {
            $this->cartStore->store($data);
        }
        return $this->redirect('/');
    }

    /**
     * Delete product from cart
     * @param $id
     */
    public function delete($id)
    {

        $product = $this->cart->findById($id);
        $productId = $product->getProductId();
        $amount = $product->getAmount();
        if ($amount == 1)
        {
            $this->cart->delete($id);
        } else
            {
                $data = ['id' => $id, 'productid' => $productId, 'amount' => $amount - 1];
                $this->cartStore->store($data);
            }

        return $this->redirect('/cart');
    }
}