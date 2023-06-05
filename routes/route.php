<?php

use App\Controllers\HomeController;
use App\Controllers\BuyerDemandController;
use Pecee\SimpleRouter\SimpleRouter;
use App\Master\Route;
SimpleRouter::get('/mvc', function() {
    return 'Hello world';
});

SimpleRouter::get('/mvc/hussain11/',function(){
    return 'hellllllllllllllllo';
});
SimpleRouter::get(BASE_DIR. '/hussain',[HomeController::class,'index']);
SimpleRouter::get(BASE_DIR.'/hussain1',[HomeController::class,'index1']);
Route::get('buyer-demand',[BuyerDemandController::class,'index']);
Route::get('report/buyer-demand',[BuyerDemandController::class,'getBuyerDemandData']);