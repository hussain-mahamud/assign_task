<?php

use App\Controllers\HomeController;
use Pecee\SimpleRouter\SimpleRouter;
SimpleRouter::get('/mvc', function() {
    return 'Hello world';
});

SimpleRouter::get('/mvc/hussain11/',function(){
    return 'hellllllllllllllllo';
});
SimpleRouter::get('mvc/hussain',[HomeController::class,'index']);
SimpleRouter::get('mvc/hussain1',[HomeController::class,'index1']);