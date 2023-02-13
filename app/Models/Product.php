<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pishran\LaravelPersianString\HasPersianString;

class Product extends Model
{
    use HasFactory;
    use HasPersianString;
    protected $persianStrings = [
        'name',
        'price',
        'expire_date',
    ];
    public function user(){
        return $this->hasOne(User::class,'id','created_by');

    }
    public function updateuser(){
        return $this->hasOne(User::class,'id','updated_by');

    }

}
