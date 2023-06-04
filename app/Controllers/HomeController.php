<?php

namespace App\Controllers;

use App\Master\Controller;
use App\Models\BuyerDemand;

class HomeController extends Controller
{
    public function index(){
        return 'Return from home controller';
    }
    public function index1(){
        $buyer_demand=new BuyerDemand();
        $data=$buyer_demand->getData();
        return views('index.php',['data'=>$data]);
        
    }
}
