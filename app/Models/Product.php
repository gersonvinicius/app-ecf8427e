<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Movimentation;

class Product extends Model
{
    protected $fillable = ['name', 'sku', 'initial_qty'];

    public function movimentation()
    {
        return $this->hasMany(Movimentation::class);
    }
}
