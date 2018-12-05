<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $fillable = [
        'test_id',
        'test_item_id',
        'specified_range_from',
        'specified_range_to',
        'observed_value',
        'lab_id',
        'is_new'
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function testItem()
    {
        return $this->belongsTo(TestItem::class);
    }
}
