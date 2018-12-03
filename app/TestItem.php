<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestItem extends Model
{
    public $fillable = [
        'name',
        'sample_id',
        'isstandard_id',
        'uom_id',
        'specified_value',
        'description'
    ];

    public function sample() {
        return $this->belongsTo(Sample::class);
    }

    public function uom() {
        return $this->belongsTo(Uom::class);
    }
}
