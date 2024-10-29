<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\settingsController;
use App\Services\Calcul;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

Route::resource('profiles',profileController::class);
Route::resource('publications',PublicationController::class);
/*
Route::prefix('profiles')->name('profiles.')->group(function(){
    Route::controller(profileController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/','store')->name('store');
        Route::get('/{profile}','show')->where('id','\d+')->name('show');
        Route::delete('/{profile}','delete')->name('destroy');
        Route::get('/{profile}/edit','edit')->name('edit');
        Route::put('/{profile}','update')->name('update');
    }); 
});
*/ 
 
Route::get('/',[homeController::class,'index'])->name('homepage');

Route::get('/settings',[settingsController::class,'index'])->name('settings.index');

Route::middleware('guest')->group(function(){
    Route::post('/login',[loginController::class,'login'])->name('login');
    Route::get('/login',[loginController::class,'show'])->name('login.show');
});
Route::get('/logout',[loginController::class,'logout'])->name('login.logout');

Route::get('/sum/{a}/{b}',function($a,$b,Calcul $calcul){
    //dd(Route::current());
    //dd(Route::currentRouteName());
    //dd(Route::currentRouteAction());
    //return redirect()->away('https://www.google.com');
    //$calcul=new Calcul();
    return $calcul->sum($a,$b);
});

Route::view('/form','form');

Route::post('/form',function(Request $req){
    $req->mergeIfMissing(['input_txt'=>date('d-m-Y')]);
    dd($req->input('input_txt'));
})->name('form');

Route::get('/response',function(){
    //return response()->download('storage/profile/defaultProfile.png');
    return response()->file('storage/profile/defaultProfile.png',[],'inline');
});

Route::get('/cookie/get',function(Request $req){
    dd($req->cookie('age'));
});

Route::get('/cookie/set/{cookie}',function($cookie){
    $res=new Response();
    $cookieObject=cookie()->forever('age',$cookie);
    return $res->withCookie($cookieObject);
});

Route::get('/headers',function(Request $req){
    $res=new Response(["data"=>"ok"]);
    return $res->withHeaders([
        'Content-Type'=>'application/json',
        'X-Abdo'=>'yes'
    ]);
});

Route::get('/request',function(Request $req){
   dd($req->url(),$req->fullUrl(),$req->ip(),$req->method(),$req->isMethod("get"));
});