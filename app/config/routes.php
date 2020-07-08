<?php

\Core\Router::add('index', '/', '\App\Controllers\User\CatalogController', 'index');
\Core\Router::add('login', '/login', '\App\Controllers\Auth\LoginController', 'index');
\Core\Router::add('register', '/register', '\App\Controllers\Auth\RegisterController', 'index');
\Core\Router::add('logout', '/logout', '\App\Controllers\Auth\LogoutController', 'index');
\Core\Router::add('feedback', '/feedback', '\App\Controllers\User\FeedbackController', 'index');
\Core\Router::add('user.orders.index', '/orders/index', '\App\Controllers\User\OrdersController', 'index');
\Core\Router::add('admin.orders.view', '/admin/orders/view', '\App\Controllers\Admin\OrdersController', 'edit');
//\Core\Router::add('admin.edit', '/admin/edit', '\App\Controllers\Admin\ProductsController', 'edit');
