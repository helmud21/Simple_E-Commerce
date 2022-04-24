<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function provinsi() {
        return $this->hasMany(Provinsi::class);
    }

    public function kabupaten() {
        return $this->hasMany(Provinsi::class);
    }
}
