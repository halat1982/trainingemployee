<?php

use Framework\Routing\Router;
use Framework\Routing\Route;

Router::addRoute(new Route('employees', 'UserController@index', Route::METHOD_GET)); // main page
Router::addRoute(new Route('employees/add', 'UserController@add', Route::METHOD_GET));
Router::addRoute(new Route('employees/add', 'UserController@put', Route::METHOD_POST));