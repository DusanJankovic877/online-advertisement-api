<?php

namespace App\Domain;

use App\Models\Advertisement;

class FilterParams  {
    public $category;
    public $title;
    public $priceOrder;
    public $userId;

    public function __construct($category, $title, $priceOrder, $userId)
    {
        $this->category = $category;
        $this->title = $title;
        $this->priceOrder = $priceOrder;
        $this->userId = $userId;
    }
    
    public function formQueryParams(){
        $paramsArray = [];
                
        if ($this->category != null){
            array_push($paramsArray, [Advertisement::COLUMN_CATEGORY, '=', $this->category]);
        }
        if ($this->title != null){
            array_push($paramsArray, [Advertisement::COLUMN_TITLE, 'like', '%'. $this->title . '%']);
        }
        if ($this->userId != null){
            array_push($paramsArray, [Advertisement::COLUMN_USER_ID, '=', $this->userId]);
        }
        return $paramsArray;
    }
}
