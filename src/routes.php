<?php

use Futurelabs\Bootplant\Models\Customer;
use Futurelabs\Bootplant\Models\Order;
use Futurelabs\Bootplant\Models\Product;
use Illuminate\Http\Request;

//Tenere il "web" middleware per verificare se user logged in o meno
// Route::group(['middleware' => ['web', 'auth']], function () {
//     Route::get('/dashboard', 'DashboardController@index');

//     Route::group(['role:Agente|Admin|Super-Admin'], function () {
//         Route::resources([
//             'branches'   => 'BranchController',
//             'estates'    => 'EstateController',
//             'orders'     => 'OrderController',
//             'customers'  => 'CustomerController',  //Clienti
//             'agents'     => 'AgentController',     //Concessionarie
//             'autoshops'  => 'AutoshopController',  //Carrozzerie
//             'insurances' => 'InsuranceController', //Assicurazioni
//             'accidents'  => 'AccidentController',  //Sinitri
//         ]);

//         Route::post('accidents/new/{registry_id}/{accident_type}', 'AccidentController@create');

//         //Async
//         Route::post('customers/storeasync', 'CustomerController@storeasync');
//         Route::post('customerlist', 'CustomerController@filter');
//         Route::post('newproduct', 'ProductController@store');
//         Route::delete('removeproduct/{id}', 'ProductController@destroy');

//         //Tables
//         // Route::get('tables/orders', 'TablesController@orders');
//         // Route::get('tables/openorder', 'TablesController@openorder');
//         Route::get('tables/customers', 'TablesController@customers');
//         Route::get('tables/agents', 'TablesController@agents');
//         Route::get('tables/autoshops', 'TablesController@autoshops');
//         Route::get('tables/insurances', 'TablesController@insurances');
//         Route::get('tables/accidents', 'TablesController@accidents');
//     });

//     Route::get('settings', function () {
//         return redirect('dashboard');
//     });
//     Route::get('updatepsw', function () {
//         return redirect('dashboard');
//     });

//     //Test
//     Route::get('/new', function () {
//         $a            = new Customer;
//         $a->branch_id = 1;
//         $a->user_id   = 1;
//         $a->fname     = 'Lara';
//         $a->lname     = 'Miglioli';
//         $a->save();
//     });

//     Route::get('ord', function () {
//         $o = Order::with('customer')->with('products')->get();
//         return $o;
//     });
// });

// /**
//  * Definitivi
//  */

// //Any logged user
// // Route::group(['middleware' => 'auth'], function () {
//Route::get('/', 'DashboardController@index');
// // Route::get('/home', 'DashboardController@index');
// // });
