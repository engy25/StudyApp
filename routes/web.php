<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Web\{
  DashboardController,
  AdminController,

};



use App\Http\Controllers\dashboard\Admin\{
  RolePermissionController,
  UserController,
  NotificationController,

};
use App\Http\Controllers\dashboard\DataEntry\{


  RoleController,
  PermissionController,
  ColorController,
  CategoryController


};

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
$controller_path = 'App\Http\Controllers';


/**
 * Route Associated to Contrller
 */


Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(
  [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/


    /**
     * home
     */
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    /*--------------------------------------------------------------- */


    Route::get('/dashboard', function () {
      return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');










    /******************************DATA ENTRY AND ADMIN *****************************************************/





    Route::get('/admin/notifications/fetch', [NotificationController::class, 'fetch'])->name("display.notification");

    /******************Roles **************************/
    Route::Resource('roles', RoleController::class);
    Route::get("/pagination/paginate-role", [RoleController::class, "paginationRole"]);
    Route::get('/search-role', [RoleController::class, 'searchRole'])->name('search.role');
    /*------------------------------------------------------- */


    /************** Permissions**********/
    Route::Resource('permissions', PermissionController::class);
    Route::get("/pagination/paginate-permission", [PermissionController::class, "paginationPermission"]);
    Route::get('/search-permission', [PermissionController::class, 'searchPermission'])->name('search.permission');
    /*------------------------------------------------------------------------- */


    /*** Role Permission to admin*/
    Route::get('rolePermissions/{roleId}/create', [RolePermissionController::class, "create"])->name('rolePermissions.create');
    Route::post('rolePermissions/{roleId}/store', [RolePermissionController::class, "store"])->name('rolePermissions.store');
    /*------------------------------------------------------------------------- */





     /*******************Category *****************/
     Route::Resource('categories', CategoryController::class);
     Route::get("/pagination/paginate-category", [CategoryController::class, "paginationCategory"]);
     Route::get('/search-category', [CategoryController::class, 'searchCategory'])->name('search.category');
     /*------------------------------------------------------------------------- */




    /*******************Colors *****************/
    Route::Resource('colors', ColorController::class);
    Route::get("/pagination/paginate-color", [ColorController::class, "paginationColor"]);
    Route::get('/search-color', [ColorController::class, 'searchColor'])->name('search.color');
    /*------------------------------------------------------------------------- */











    /**********************************************ADMIN *********************************************************/
    // Route::group(['middleware' => ['role:Admin']], function () {

    /**
     * Users
     */
    Route::Resource('users', UserController::class);
    Route::get('usersList/{roleName}', [UserController::class, "indexUser"])->name('users.list');
    Route::get("/pagination/paginate-user/{roleName}", [UserController::class, "paginationUser"]);
    Route::get('/search-user/{roleName}', [UserController::class, 'searchUser'])->name('search.user');
    /**to display the lists of the permissions depends of the role */
    Route::get('permissionsList/{roleId}', [UserController::class, "displayPermissions"])->name('permissions.list');
    /*------------------------------------------------------------------------- */





    Route::resource('notifications', NotificationController::class)->only('index', 'show', 'store');

    // Route::get('/push-notificaiton', [NotificationController::class, 'index'])->name('push-notificaiton');
    // Route::post('/store-token', [NotificationController::class, 'storeToken'])->name('store.token');
    // Route::post('/send-web-notification', [NotificationController::class, 'sendWebNotification'])->name('send.web-notification');


    Route::get('/get-notificaiton', [NotificationController::class, 'index'])->name('get-notificaitons')->name("notifications.index");







  }
);






















Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {


  Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboards');
  Route::get('get-dashboard', [DashboardController::class, "index_dashboard"])->name('index.dashboard');






  /**
   * Admin
   */
  Route::resource('admins', AdminController::class);



});






Auth::routes();


