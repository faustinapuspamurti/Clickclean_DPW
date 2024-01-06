<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'paket_layanan', 'metode_pembayaran', 'no_hp', 'alamat'];
    protected $guarded;
}
