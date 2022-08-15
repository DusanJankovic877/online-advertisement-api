<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    const COLUMN_TITLE = 'title';
    const COLUMN_DESCRIPTION = 'description';
    const COLUMN_IMAGE_URL = 'image_url';
    const COLUMN_PRICE = 'price';
    const COLUMN_CATEGORY = 'category';
    const COLUMN_USER_ID = 'user_id';
    const COLUMN_CITY = 'city';
    
    use HasFactory;
    
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

    public static function searchByCategory($category){
        //$advertisements = Advertisement::where(['category' => $category,'title like' => '%' . $title . '%' ])->where()->paginate(20);
        
        $advertisements = Advertisement::
        where('category', $category)
        ->where('title', 'like', '')
        ->where('user_id', '')
        ->orderBy('price', 'ASC')
        ->paginate(20);



        return $advertisements;
    }
    public static function searchByTitle($title){
        $advertisements = Advertisement::where('title', 'like', '%' . $title . '%')->paginate(20);
        if($title === ''){
            return Advertisement::paginate(20);
        }else{
            return $advertisements;
        }
    }
    public static function searchByPrice($price){
        
        if($price === ''){
            return Advertisement::paginate(20);
        }else if($price === 'Min'){
            $advertisements = Advertisement::orderBy('price', 'ASC')->paginate(20);
            return $advertisements;
        }else if($price === 'Max'){
            $advertisements = Advertisement::orderBy('price', 'DESC')->paginate(20);
            return $advertisements;
        }
    }
}
