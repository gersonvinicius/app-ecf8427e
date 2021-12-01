<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Movimentation extends Model
{
    protected $fillable = ['qty'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
