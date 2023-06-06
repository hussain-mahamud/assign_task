<?php

namespace App\Models;

use App\Master\Model;

class BuyerDemand extends Model
{
    protected $table_name = 'tbl_buyer_demand';
    public function getData()
    {
        return $this->fetchAll("SELECT * FROM {$this->table_name}");
    }
    public function findById()
    {
    }
    public function getBuyerDemandData(array $params = [])
    {
        $sql = "SELECT `id`, `buyer`, `amount`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `entry_at`, `entry_by`, `hash_key`, `phone` FROM `tbl_buyer_demand` WHERE 1 ";
        $placeholders = [];

        if ($params['user_id']) {
            $sql .= " AND entry_by =:user_id ";
            $placeholders['user_id'] = $params['user_id'];
        }

        if ($params['start_date'] && $params['end_date']) {
            $sql .= "AND entry_at BETWEEN :start_date AND :end_date";
            $placeholders['start_date'] = $params['start_date'];
            $placeholders['end_date'] = $params['end_date'];
        }
        $data = $this->fetchAll($sql, $placeholders);
        return $data;
    }
    public function storeBuyerDemand(array $params = [])
    {
        $sql = "INSERT INTO `tbl_buyer_demand`( `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`,
         `phone`, `hash_key`, `entry_at`, `entry_by`)
         values (:amount, :buyer, :receipt_id,:items, :buyer_email, :buyer_ip, :note, :city, :phone, :hash_key, :entry_at, :entry_by)";
        $data = $this->insert($sql, $params);
    }
}