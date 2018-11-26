<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TestOrder;
use App\Test;

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

    public function tests()
    {
        return $this->belongsToMany(Test::class);
    }

    
}
