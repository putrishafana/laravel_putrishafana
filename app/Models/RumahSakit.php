<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    protected $table = 'd_rumahsakit';

    public function Pasien()
    {
        return $this->hasMany(Pasien::class);
    }
}