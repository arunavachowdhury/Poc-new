<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestItem extends Model
{
    public $fillable = [
        'name',
        'specified_value',
        'observed_value'
    ];
    
    public function testOrder()
    {
        return $this->belongsToMany(TestOrder::class);
    }
}
