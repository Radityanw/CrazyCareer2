<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class klik extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function daftarkerjaan()
    {
        return $this->belongsTo(Daftarkerja::class);
        
    }
}
