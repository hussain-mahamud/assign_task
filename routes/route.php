<?php

use App\Controllers\HomeController;
use App\Controllers\BuyerDemandController;
use Pecee\SimpleRouter\SimpleRouter;
use App\Master\Route;

Route::get('/',[BuyerDemandController::class,'index']);
Route::get('buyer-demand',[BuyerDemandController::class,'index']);
Route::post('buyer-demand',[BuyerDemandController::class,'storeBuyerDemand']);
Route::get('report/buyer-demand',[BuyerDemandController::class,'getReportPanel']);
Route::post('report/buyer-demand',[BuyerDemandController::class,'getBuyerDemandData']);