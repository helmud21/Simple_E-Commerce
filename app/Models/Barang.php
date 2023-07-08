<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $tables = 'barangs';
    protected $primaryKey = 'id_barang';
    protected $guarded = ['id_barang'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id_category');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

}
