<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded;
    public function pesanan_detail() 
	{
	     return $this->hasMany('App\Models\PesananDetails','product_id', 'id');
	}
}
