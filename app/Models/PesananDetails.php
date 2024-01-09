<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetails extends Model
{
    public function product()
	{
	      return $this->belongsTo('App\Models\Backend\Product','product_id', 'id');
	}

	public function pesanan()
	{
	      return $this->belongsTo('App\Models\Pesanan','pesanan_id', 'id');
	}
}
