<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class);
    }
}
