<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTestItem extends Model
{
    public $fillable = ['name'];

    public function testOrder()
    {
        return $this->belongsToMany(TestOrder::class);
    }
}
