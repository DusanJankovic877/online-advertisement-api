<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'price',
        'category',
        'user_id',
        'city',
    ];
    public function user(){
        return $this->belongsTo(App\Model\User::class);
    }
    public static function searchByCategory($category){
        $advertisements = Advertisement::where('category', 'like', '%' . $category . '%')->paginate(20);
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
