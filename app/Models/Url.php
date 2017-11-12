<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
	protected $table = "urls";
	protected $primaryKey = "id";
	protected $hidden = ["user_id"];
	protected $fillable = ["url", "shortUrl", "user_id"];
	public $timestamps = false;
	protected $attributes = ['hits' => 0];

	public function user(){
		return $this->belongsTo(User::class, "user_id", "id");
	}    

	public function scopeTop($query, $n){
		return $query->limit($n);
	}


}
