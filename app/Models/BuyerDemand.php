<?php
namespace App\Models;
use App\Master\Model;

class BuyerDemand extends Model
{
    protected $table_name='tbl_buyer_demand';
    public function getData(){
        return $this->fetchAll("SELECT * FROM {$this->table_name}");
    }
    public function findById(){

    }
}