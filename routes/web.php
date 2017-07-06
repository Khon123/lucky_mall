<?php
use App\Http\Controllers\Helpers\Language;
use App\ImageSubMenu;
use App\MasterImage;
use Illuminate\Http\Request;
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



//Route menu
Route::group(['prefix' => '/admin/menu'], function () {
    Route::get('/', 'backend\MenuController@index');
    Route::get('/{id?}', 'backend\MenuController@edit');
//    Route::get('/get/menu', 'backend\MenuController@getToSubMenu');
    Route::post('/{id?}', 'backend\MenuController@update');
});
//Route sub-menu
Route::group(['prefix' => 'admin/sub-menu'], function (){
    Route::get('/', 'backend\SubMenuController@index');
    Route::get('/{id?}', 'backend\SubMenuController@edit');
//    Route::get('/withMenu{id?}', 'backend\SubMenuController@getSubMenu');
    Route::post('/', 'backend\SubMenuController@store');
    Route::post('/{id?}', 'backend\SubMenuController@update');
});
Route::get('admin/getSubMenuReferIdMenu/{id?}', 'backend\SubMenuController@getSubMenu');
//Route image sunMenu
Route::group(['prefix' => 'admin/image-submenu'], function (){
   Route::get('/', 'backend\ImageSubMenuController@index');
    Route::get('/{id?}', 'backend\ImageSubMenuController@edit');
    Route::post('/', 'backend\ImageSubMenuController@store');
    Route::post('/{id?}', 'backend\ImageSubMenuController@update');
});

//Route video

Route::group(['prefix' =>'admin/video'], function (){
   Route::get('/', 'backend\VideoController@index');
   Route::get('/{id?}', 'backend\VideoController@edit');
   Route::post('/{id?}', 'backend\VideoController@update');
});

//Route Image

Route::group(['prefix' => 'admin/image'], function (){
   Route::get('/', 'backend\ImageController@index');
   Route::get('/{id?}', 'backend\ImageController@edit');
   Route::post('/', 'backend\ImageController@store');
   Route::post('/{id?}', 'backend\ImageController@update');
   Route::get('/imageMaster/{id?}', 'backend\ImageController@get');
});
Route::post('admin/imageUpload', 'backend\C@imageUpload');
Route::get('admin/imageUpload','backend\ImageController@getImageUpload');

//Route Slider
Route::group(['prefix' => 'admin/slider'], function (){
    Route::get('/', 'backend\SliderController@index');
    Route::get('/image', 'backend\SliderController@getJustImageUploaded');
    Route::get('/{id?}','backend\SliderController@edit');
    Route::post('/', 'backend\SliderController@store');
    Route::post('/{id?}', 'backend\SliderController@update');
});
// Route master image
Route::group(['prefix' => 'admin/masterImage'], function (){
    Route::get('/', 'backend\ImageController@getLastMasterImage');
    Route::post('/', 'backend\SliderController@uploadMasterImage');
});


//Route Career-content
Route::group(['prefix' => 'admin/career-content'], function (){
   Route::get('/', 'backend\CareerContentController@index');
   Route::get('/{id?}', 'backend\CareerContentController@edit');
   Route::post('/{id?}', 'backend\CareerContentController@update');
});

//Route Career
Route::group(['prefix' => 'admin/career'], function (){
    Route::get('/', 'backend\CareerController@index');
    Route::get('/{id?}', 'backend\CareerController@edit');
    Route::post('/', 'backend\CareerController@store');
    Route::post('/{id?}', 'backend\CareerController@update');
});


//Route about
Route::group(['prefix' => 'admin/about'], function (){
    Route::get('/', 'backend\AboutController@index');
    Route::get('/{id?}', 'backend\AboutController@edit');
    Route::post('/{id?}', 'backend\AboutController@update');
});


//Route home-description
Route::group(['prefix' => 'admin/home-descriptions'], function (){
    Route::get('/', 'backend\HomeDescriptionController@index');
    Route::get('/{id?}', 'backend\HomeDescriptionController@edit');
    Route::post('/{id?}', 'backend\HomeDescriptionController@update');
});
//Route home-content
Route::group(['prefix' => 'admin/home-content'], function (){
    Route::get('/', 'backend\HomeContentController@index');
    Route::get('/{id?}', 'backend\HomeContentController@edit');
    Route::post('/{id?}', 'backend\HomeContentController@update');
});


//Route area-detail
Route::group(['prefix' => 'admin/area-detail'], function (){
    Route::get('/', 'backend\AreaDetailController@index');
    Route::get('/{id?}', 'backend\AreaDetailController@edit');
    Route::post('/{id?}', 'backend\AreaDetailController@update');
});
//Route area-information
Route::group(['prefix' => 'admin/area-information'], function (){
    Route::get('/', 'backend\AreaInformationController@index');
    Route::get('/{id?}', 'backend\AreaInformationController@edit');
    Route::post('/', 'backend\AreaInformationController@store');
    Route::post('/{id?}', 'backend\AreaInformationController@update');
});


// Route user
Route::group(['prefix' => '/admin/user'], function(){
    Route::get('/', 'backend\UserController@view');
    Route::get('/{id?}', 'backend\UserController@edit');
    Route::post('/{id?}', 'backend\UserController@update');
});
Route::post('/admin/change-password', 'backend\ChangePasswordController@changePassword');

//============================route frontend======================================
//Route home
Route::get('/', 'frontend\HomeController@index');

//Route about
Route::get('/about-us', 'frontend\AboutController@index');

//Route contact us
Route::get('/contact-us', 'frontend\ContactController@index');
Route::post('/contact-us/sendMail', 'frontend\ContactController@sendMail');

//Route store directory
Route::get('/store-directory', 'frontend\StoreDirectoryController@index');

//Route Event & Promotion
Route::get('/event-promotion', 'frontend\EventPromotionController@index');
Route::get('/common-area-information', 'frontend\AreaInformationController@index');

//Route Career
Route::get('/career', 'frontend\CareerController@index');





// route get image that related sub menu
Route::get('/store-directory/{id?}','frontend\StoreDirectoryController@getImageList');
Route::get('/image-all', 'frontend\StoreDirectoryController@getImageAll');


