<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bank() {
        return $this->belongsTo('App\Models\Bank');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
