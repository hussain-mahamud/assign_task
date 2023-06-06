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
    public function getReportPanel()
    {
        return views('buyer_demand_report.php');
    }
    public function getBuyerDemandData()
    {
        $demand_data = new BuyerDemand();
        $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
        $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';

        if (($start_date && $end_date) || $user_id) {
            $data = $demand_data->getBuyerDemandData(['start_date' => $start_date, 'end_date' => $end_date, 'user_id' => $user_id]);
            return json_encode(["data" => $data, "status" => 200]);
        } else {
            return json_encode(["message" => "Please provide user id or select date range", "status" => 403]);
        }
    }
    public function storeBuyerDemand(){
        return json_encode($_POST);
    }
}
