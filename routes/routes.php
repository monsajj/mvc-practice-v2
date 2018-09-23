<?php

$routes = [
    /*__________________________________________________________________________________________________________________
     |
     |                                     USER SIDE SECTION
     |__________________________________________________________________________________________________________________
     */
    /*__________________________________________________________________________________________________________________
     *
     *                                          MAIN
     *------------------------------------------------------------------------------------------------------------------
     */
    [
        'route' => '',
        'params' => ['controller' => 'Home', 'action' => 'index']
    ],
    [
        'route' => 'product/{id:\d+}/add',
        'params' => ['controller' => 'Cart', 'action' => 'addToCart']
    ],
   /*__________________________________________________________________________________________________________________
    *
    *                                          CATEGORIES SECTION
    *------------------------------------------------------------------------------------------------------------------
    */
    [
        'route' => 'categories/{id:\d+}',
        'params' => ['controller' => 'Home', 'action' => 'category']
    ],
    [
        'route' => 'categories',
        'params' => ['controller' => 'Home', 'action' => 'categories']
    ],
    /*__________________________________________________________________________________________________________________
     *
     *                                          PRODUCT SECTION
     *------------------------------------------------------------------------------------------------------------------
     */
    [
        'route' => 'cart/delete/{id:\d+}',
        'params' => ['controller' => 'Cart', 'action' => 'delete']
    ],
    /*__________________________________________________________________________________________________________________
     *
     *                                          ORDER SECTION
     *------------------------------------------------------------------------------------------------------------------
     */
    [
        'route' => 'cart',
        'params' => ['controller' => 'Cart', 'action' => 'index']
    ],

    /*__________________________________________________________________________________________________________________
     |
     |                                      ADMIN SECTION
     |__________________________________________________________________________________________________________________
     */
    /*__________________________________________________________________________________________________________________
     *
     *                                          MAIN
     *------------------------------------------------------------------------------------------------------------------
     */
    [
        'route' => 'admin',
        'params' => ['controller' => 'Home', 'action' => 'index', 'namespace' => 'Admin']
    ],

    /*__________________________________________________________________________________________________________________
     *
     *                                          CATEGORIES SECTION
     *------------------------------------------------------------------------------------------------------------------
     */
    [
        'route' => 'admin/categories',
        'params' => ['controller' => 'Category', 'action' => 'index', 'namespace' => 'Admin']
    ],
    [
        'route' => 'admin/categories/create',
        'params' => ['controller' => 'Category', 'action' => 'create', 'namespace' => 'Admin']
    ],
    [
        'route' => 'admin/categories/store',
        'params' => ['controller' => 'Category', 'action' => 'store', 'namespace' => 'Admin']
    ],
    [
        'route' => 'admin/categories/delete/{id:\d+}',
        'params' => ['controller' => 'Category', 'action' => 'delete', 'namespace' => 'Admin']
    ],
    [
        'route' => 'admin/categories/update/{id:\d+}',
        'params' => ['controller' => 'Category', 'action' => 'update', 'namespace' => 'Admin']
    ],
    /*__________________________________________________________________________________________________________________
     *
     *                                          PRODUCT SECTION
     *------------------------------------------------------------------------------------------------------------------
     */
    [
        'route' => 'admin/products',
        'params' => ['controller' => 'Product', 'action' => 'index', 'namespace' => 'Admin']
    ],
    [
        'route' => 'admin/products/create',
        'params' => ['controller' => 'Product', 'action' => 'create', 'namespace' => 'Admin']
    ],
    [
        'route' => 'admin/products/store',
        'params' => ['controller' => 'Product', 'action' => 'store', 'namespace' => 'Admin']
    ],
    [
        'route' => 'admin/products/delete/{id:\d+}',
        'params' => ['controller' => 'Product', 'action' => 'delete', 'namespace' => 'Admin']
    ],
    [
        'route' => 'admin/products/update/{id:\d+}',
        'params' => ['controller' => 'Product', 'action' => 'update', 'namespace' => 'Admin']
    ],
    /*__________________________________________________________________________________________________________________
     *
     *                                          ORDER SECTION
     *------------------------------------------------------------------------------------------------------------------
     */

];