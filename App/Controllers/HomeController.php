<?php

namespace App\Controllers;
use App\Models\Product\Category;
use App\Models\Product\Product;
use \Core\Request;
use \Core\View;
use \Core\Session;

/**
 * Home controller
 *
 * PHP version 7.2
 */
class HomeController extends \Core\Controller
{
    /**
     * @var Product
     */
    private $product;

    /**
     * @var Category
     */
    private $category;

    /**
     * HomeController constructor.
     * @param Request $request
     * @param Product $product
     */
    public function __construct(Request $request, Product $product, Category $category)
    {
        $this->category = $category;
        $this->product = $product;
        parent::__construct($request);
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        //$session = Session::getInstance();
        var_dump(parent::$own_session);
        $products = $this->product->findBy(['status' => 1]);

        View::renderTemplate('home/index.html', ['products' => $products]);
    }

    public function addToCartAction($id)
    {
        $session = parent::$own_session;
        //$session = Session::getInstance();
        //$product = $session->getParam($id);
        //$product = $_SESSION[$id];
        if (isset($session[$id]))
        {
            echo "null\n";
            $session[$id] = $session + 1;
                //$session->setParam($id, 1);
        } else
            {
                echo "not null\n";
                $session[$id] = 1;
                //$session->setParam($id, $product + 1);
            }

        parent::$own_session = $session;
        var_dump($id, $session);
        die();
        return $this->redirect('/');
    }

    public function categoriesAction()
    {

        $categories = $this->category->findBy(['status' => 1]);

        View::renderTemplate('home/categories.html', ['categories' => $categories]);
    }

    public function categoryAction($id)
    {

        $categories = $this->category->findBy(['id' => $id]);
        $products = $this->product->findBy(['categoryid' => $id]);
        View::renderTemplate('home/categoryid.html', ['categories' => $categories, 'products' => $products]);
    }
}
