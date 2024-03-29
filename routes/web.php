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

Route::group(['namespace' => 'frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home-page');
    Route::get('home', 'HomeController@index')->name('home-page');

    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('reservation', 'BookingController@index')->name('reservation');
    Route::get('blog', 'BlogController@index')->name('blog');
    Route::get('blog-details/{slug}', 'BlogController@viewBlogDetails')->name('blog-details');
    Route::get('gallery', 'FrontendController@showGallery')->name('gallery');
    Route::get('about', 'FrontendController@showAbout')->name('about');
    Route::get('contact', 'FrontendController@showContact')->name('contact');

    Route::get('contact#contact-message', 'FrontendController@showContact')->name('contact-done');

    Route::post('customer-message', 'CustomerMessageController@addCustomerMessage')->name('customer-message');
    Route::get('view-feedback', 'CustomerMessageController@viewFeedback')->name('view-feedback');
    Route::get('delete-customer/{id}', 'CustomerMessageController@deleteCustomer')->name('delete-customer');

    Route::post('special-signup', 'UserController@storeUserEmail')->name('special-signup');
    Route::get('/#special-signup', 'HomeController@index')->name('special-signup-error');

    Route::post('book-table-add-user', 'BookingController@bookTableAddUser')->name('book-table-add-user');
    Route::get('reservation#reservation-form', 'BookingController@index')->name('reservation-form-error');

    Route::get('/test', 'FrontendController@test3')->name('test');

    Route::get('event-details', 'FrontendController@showEventDetails')->name('event-details');
    Route::get('view-details-book-event/{id}', 'FrontendController@viewDetails')->name('view-details-book-event');
    Route::post('book-event', 'BookingController@bookEvent')->name('book-event');
    Route::get('view-details-book-event/{id}#event-form-error')->name('event-form-error');

    Route::get('view-food-details', 'MenuController@viewFoodDetails')->name('view-food-details');

    Route::post('user-comment/{id}', 'BlogCommentController@addBlogUserComment')->name('user-comment');
    Route::get('blog-details/{id}#blog-comment-form-error')->name('blog-comment-form-error');

    Route::get('blog-by-category/{id}', 'BlogController@blogByCategory')->name('blog-by-category');
    Route::get('pop-blog/{slug}', 'BlogController@popBlog')->name('pop-blog');
    Route::get('blog-archive/{month}', 'BlogController@blogArchive')->name('blog-archive');
    Route::get('search-blog', 'BlogController@searchBlog')->name('search-blog');

    Route::get('user-login', 'UserController@login')->name('user-login');
    Route::get('register-user', 'UserController@registerUser')->name('register-user');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {

    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('admin-login', 'AdminAuthController@index')->name('admin-login');
        Route::post('admin-login-action', 'AdminAuthController@loginAction')->name('admin-login-action');
    });
    Route::get('admin-logout', 'AdminAuthController@logOut')->name('admin-logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', 'DashboardController@index')->name('dashboard');

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

        Route::get('search', 'EmployeeController@searchAction')->name('search');

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
        Route::get('delete-drink/{id}', 'DrinkController@deleteDrink')->name('delete-drink');
        Route::get('edit-drink/{id}', 'DrinkController@editDrink')->name('edit-drink');
        Route::post('update-drink/{id}', 'DrinkController@updateDrinkAction')->name('update-drink');

        Route::get('add-drink-type', 'DrinkTypeController@addDrinkType')->name('add-drink-type');
        Route::post('add-drink-type-action', 'DrinkTypeController@addDrinkTypeAction')->name('add-drink-type-action');
        Route::get('view-drink-type', 'DrinkTypeController@index')->name('view-drink-type');
        Route::get('delete-drink-type/{id}', 'DrinkTypeController@deleteDrinkType')->name('delete-drink-type');
        Route::get('edit-drink-type/{id}', 'DrinkTypeController@editDrinkType')->name('edit-drink-type');
        Route::post('update-drink-type/{id}', 'DrinkTypeController@updateDrinkTypeAction')->name('update-drink-type');

        Route::get('add-table-type', 'TableTypesController@addTableType')->name('add-table-type');
        Route::post('add-table-type-action', 'TableTypesController@addTableTypesAction')->name('add-table-type-action');
        Route::get('view-table-type', 'TableTypesController@index')->name('view-table-type');
        Route::get('edit-table-type/{id}', 'TableTypesController@editTableType')->name('edit-table-type');
        Route::post('update-table-type/{id}', 'TableTypesController@updateTableTypeAction')->name('update-table-type');
        Route::get('delete-table-type/{id}', 'TableTypesController@deleteTableType')->name('delete-table-type');

        Route::get('add-table', 'TableController@addTable')->name('add-table');
        Route::post('add-table-action', 'TableController@addTableAction')->name('add-table-action');
        Route::get('view-table', 'TableController@viewTable')->name('view-table');
        Route::get('edit-table/{id}', 'TableController@editTable')->name('edit-table');
        Route::post('update-table/{id}', 'TableController@updateTableAction')->name('update-table');
        Route::get('delete-table/{id}', 'TableController@deleteTableAction')->name('delete-table');
        Route::get('update-availability/{id}', 'TableController@updateAvailabilityAction')->name('update-availability');

        Route::get('add-event', 'EventController@addEvent')->name('add-event');
        Route::post('add-event-action', 'EventController@AddEventAction')->name('add-event-action');
        Route::get('view-event', 'EventController@viewEvent')->name('view-event');
        Route::get('edit-event/{id}', 'EventController@editEvent')->name('edit-event');
        Route::post('edit-event-action/{id}', 'EventController@editEventAction')->name('edit-event-action');
        Route::get('delete-event/{id}', 'EventController@deleteEvent')->name('delete-event');
        Route::get('view-booked-event', 'EventController@viewBookedEvents')->name('view-booked-events');

        Route::get('booked-tables', 'TableController@viewBookedTables')->name('booked-tables');
        Route::get('available-tables', 'TableController@viewAvailableTables')->name('available-tables');
        Route::post('search-booked-table', 'TableController@searchBookedTable')->name('search-booked-table');


        Route::get('add-blog-category', 'BlogCategoryController@addBlogCategory')->name('add-blog-category');
        Route::post('add-blog-category-action', 'BlogCategoryController@addBlogCategoryAction')->name('add-blog-category-action');
        Route::get('view-blog-category', 'BlogCategoryController@viewBlogCategory')->name('view-blog-category');
        Route::get('edit-blog-category/{id}', 'BlogCategoryController@editBlogCategory')->name('edit-blog-category');
        Route::post('edit-blog-category-action/{id}', 'BlogCategoryController@editBlogCategoryAction')->name('edit-blog-category-action');
        Route::get('delete-blog-category/{id}', 'BlogCategoryController@deleteBlogCategory')->name('delete-blog-category');

        Route::get('add-blog', 'BlogController@addBlog')->name('add-blog');
        Route::post('add-blog-action', 'BlogController@addBlogAction')->name('add-blog-action');
        Route::get('view-blog', 'BlogController@viewBlog')->name('view-blog');
        Route::get('edit-blog/{id}', 'BlogController@editBlog')->name('edit-blog');
        Route::post('update-blog-action/{id}', 'BlogController@updateBlogAction')->name('update-blog-action');
        Route::get('delete-blog/{id}', 'BlogController@deleteBlog')->name('delete-blog');

    });


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
