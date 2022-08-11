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
}
