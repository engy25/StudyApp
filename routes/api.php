<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{
  AuthController,
  User\ProfileController,
  // User\FavouriteController,
  User\NotificationController

};





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::namespace('Api')->middleware('setLocale')->group(function () {


  Route::post("push-subscribe", [NotificationController::class, "pushSubscribe"]);  ///push notification

  /************************************************Authentication************************************************** */

                                     /******************User*********************** */

  Route::post('user-register', [AuthController::class, 'register']);   /// Register


  Route::post('confirm-code', [AuthController::class, 'confirmCode'])->missing(function (Request $request) {
    return response()->json(['result' => 'failed', 'message' => trans('api.auth_something_went_wrong'), 'status' => 422, 'data' => null, (int) 422]);
  });  /**2:Confirm the phone  */


  Route::post('user-login', [AuthController::class, 'userLogin']);  ///3: User Login  By phone


  Route::post('resend-otp', [AuthController::class, 'resendOtp']); //Resend otp again



  /**************************************************User Login  By Social********************************************** */


  Route::post('user-login-social', [AuthController::class, 'userSocialLogin']); ///social in flutter

  Route::get('social/login', [AuthController::class, 'socialLogin']);    ////social in laravel
  /*************************************************************************************************************** */

  /**************************************************Forger Password********************************************** */
  Route::post('send-code', [AuthController::class, 'sendCode']);  ///1:Send Code To Phone
  Route::post('check-code', [AuthController::class, 'checkCode']);  //// 2:Check Code
  Route::post('reset-password', [AuthController::class, 'resetPassword']); //*3: Reset Password
  /*************************************************************************************************************** */


      /**fav */
      // Route::get('favourites/{sort}', [FavouriteController::class, "index"]);
      // Route::post('add-item-to-favourites/{id}', [FavouriteController::class, 'addItemToFavorite']);
      // Route::post('add-store-to-favourites/{id}', [FavouriteController::class, 'addStoreToFavorite']);



    });




Route::namespace('Api')->middleware(['setLocale'])->group(function () {

  Route::middleware(['checkUser'])->group(function () {

    Route::post("update-profile", [ProfileController::class, "updateProfile"]);   /**update profile by *image or fullname */


    /**************************************update phone********************************************/

    Route::post('send-otp-to-check-phone', [ProfileController::class, 'sendOtpToCheckPhone']); /**send otp to phone */

    Route::post('update-phone', [ProfileController::class, 'updatePhone']);   /**update phone */
    /************************************************************************************************************/

    Route::post('edit-password', [ProfileController::class, 'editPassword']); ///Edit Password

    Route::get('show-profile', [ProfileController::class, 'ShowProfile']); ////Display Profile

    Route::post('delete-account', [ProfileController::class, 'deleteAccount']); ////Delete Account

    Route::post('logout', [AuthController::class, 'logout']);  /////logout



    /**************************************Notifications********************************************/
    Route::get("notifications", [NotificationController::class, "getNotifications"]);
    Route::get("showNotifications/{id}", [NotificationController::class, "show"]);
    Route::post("delete-notification/{id}", [NotificationController::class, "destroy"]);
    Route::get("count-notifications", [NotificationController::class, "countNotifications"]);

    /************************************************************************************************************/
  });

});



