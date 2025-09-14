<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['category_id','supplier_id','name','stock','unit','price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}