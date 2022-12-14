<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
