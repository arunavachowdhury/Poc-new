<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestOrder extends Model
{
    public $fillable = ['name', 'date', 'company_name', 'address', 'phone'];

    public function orderTestItems()
    {
        return $this->belongsToMany(OrderTestItem::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
