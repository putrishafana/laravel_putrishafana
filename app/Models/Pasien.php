<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'd_pasien';

    public function RumahSakit()
    {
        return $this->belongsTo(RumahSakit::class, 'rs_id', 'id');
    }
}