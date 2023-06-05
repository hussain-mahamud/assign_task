<?php
namespace App\Controllers;

use App\Master\Controller;
use App\Models\BuyerDemand;

class BuyerDemandController extends Controller
{
    public function index()
    {
        return views('buyer_demand.php');
    }
    public function getBuyerDemandData(){
        return views('buyer_demand_report.php');
    }
}