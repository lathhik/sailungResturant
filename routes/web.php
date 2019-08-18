<?php

use Illuminate\Support\Facades\Route;

/*
 *
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');

    Route::get('add-admin', 'AdminController@addAdmin')->name('add-admin');
    Route::get('view-admin', 'AdminController@viewAdmin')->name('view-admin');
    Route::post('add-admin', 'AdminController@addAdminAction')->name('add-admin-action');
    Route::get('view-admin', 'AdminController@viewAdmin')->name('view-admin');
    Route::get('update-status/{id}', 'AdminController@updateStatus')->name('update-status');
    Route::get('delete-admin/{id}', 'AdminController@deleteAdmin')->name('delete-admin');
    Route::get('edit-admin/{id}', 'AdminController@editAdmin')->name('edit-admin');
    Route::post('update-admin/{id}', 'AdminController@updateAdminAction')->name('update-admin');

    Route::get('add-emp-role', 'RoleController@addEmpRole')->name('add-emp-role');
    Route::post('add-emp-role-action', 'RoleController@addEmpRoleAction')->name('add-emp-role-action');
    Route::get('view-emp-role', 'RoleController@index')->name('view-emp-role');
    Route::get('edit-role/{id}', 'RoleController@editRole')->name('edit-role');
    Route::post('edit-emp-role-action/{id}', 'RoleController@updateEmpRoleAction')->name('edit-emp-role-action');
    Route::get('delete-role/{id}', 'RoleController@deleteRole')->name('delete-role');

    Route::get('add-emp', 'EmployeeController@addEmp')->name('add-emp');
    Route::post('add-emp-action', 'EmployeeController@addEmpAction')->name('add-emp-action');
    Route::get('view-emp', 'EmployeeController@index')->name('view-emp');
    Route::get('delete-emp/{id}', 'EmployeeController@deleteEmp')->name('delete-emp');
    Route::get('update-emp-status/{id}', 'EmployeeController@updateEmpStatus')->name('update-emp-status');
    Route::get('edit-emp/{id}', 'EmployeeController@editEmp')->name('edit-emp');
    Route::post('update-emp/{id}', 'EmployeeController@updateEmpAction')->name('update-emp');

    Route::post('search', 'EmployeeController@searchAction')->name('search');

    Route::get('add-food-type', 'FoodTypeController@addFoodType')->name('add-food-type');
    Route::post('add-food-type-action', 'FoodTypeController@addFoodTypeAction')->name('add-food-type-action');
    Route::get('view-food-type', 'FoodTypeController@viewFoodType')->name('view-food-type');
    Route::get('edit-food-type/{id}', 'FoodTypeController@editFoodType')->name('edit-food-type');
    Route::post('update-food-type-action/{id}', 'FoodTypeController@updateFoodTypeAction')->name('update-food-type-action');
    Route::get('delete-food-type/{id}', 'FoodTypeController@deleteFoodType')->name('delete-food-type');

    Route::get('add-food', 'FoodController@addFood')->name('add-food');
    Route::post('add-food-action', 'FoodController@addFoodAction')->name('add-food-action');
    Route::get('view-food', 'FoodController@index')->name('view-food');
    Route::get('edit-food/{id}', 'FoodController@editFood')->name('edit-food');
    Route::post('update-food-action/{id}', 'FoodController@updateFoodAction')->name('update-food-action');
    Route::get('delete-food/{id}', 'FoodController@deleteFood')->name('delete-food');
    Route::get('add-food-det', 'FoodDetailsController@addFoodDetails')->name('add-food-det');
    Route::post('add-food-det-action', 'FoodDetailsController@addFoodDetailsAction')->name('add-food-det-action');

    Route::get('add-drink', 'DrinkController@addDrink')->name('add-drink');
    Route::post('add-drink-action', 'DrinkController@addDrinkAction')->name('add-drink-action');
    Route::get('view-drink', 'DrinkController@index')->name('view-drink');
    Route::get('add-drink-type', 'DrinkTypeController@addDrinkType')->name('add-drink-type');
    Route::post('add-drink-type-action', 'DrinkTypeController@addDrinkTypeAction')->name('add-drink-type-action');
    Route::get('view-drink-type', 'DrinkTypeController@index')->name('view-drink-type');
    Route::get('delete-drink-type/{id}', 'DrinkTypeController@deleteDrinkType')->name('delete-drink-type');
    Route::get('edit-drink-type/{id}', 'DrinkTypeController@editDrinkType')->name('edit-drink-type');
    Route::post('update-drink-type/{id}', 'DrinkTypeController@updateDrinkTypeAction')->name('update-drink-type');


});
