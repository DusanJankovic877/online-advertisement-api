<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    const COLUMN_TITLE = 'title';
    const COLUMN_DESCRIPTION = 'description';
    const COLUMN_IMAGE_URL = 'image_url';
    const COLUMN_PRICE = 'price';
    const COLUMN_CATEGORY = 'category';
    const COLUMN_USER_ID = 'user_id';
    const COLUMN_CITY = 'city';
    
    
    protected $fillable = [
        self::COLUMN_TITLE,
        self::COLUMN_DESCRIPTION,
        self::COLUMN_IMAGE_URL,
        self::COLUMN_PRICE,
        self::COLUMN_CATEGORY,
        self::COLUMN_USER_ID,
        self::COLUMN_CITY,
    ];
    public function user(){
        return $this->belongsTo(App\Model\User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    

    public static function filterAds($filterParameters){
        $advertisements = '';
        if($filterParameters->priceOrder){
            $advertisements = Advertisement::where($filterParameters->formQueryParams())
            ->orderBy(Advertisement::COLUMN_PRICE, $filterParameters->priceOrder)
            ->paginate(20);
        }else {
            $advertisements = Advertisement::where($filterParameters->formQueryParams())
            ->paginate(20);
        }
        return $advertisements;
    }


}
