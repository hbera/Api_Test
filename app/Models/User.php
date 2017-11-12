<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = ['id'];
    public $timestamps = false;
    public $incrementing  = false;


    public function urls(){
    	return $this->hasMany(Url::class, "user_id", "id");
    }

    public function addUrl(Url $url){
    	return $this->urls()->save($url);
    }
}
