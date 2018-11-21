<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    const IN_PROGRESS = 'in_progress';
    const DRAFT = 'draft';
    const CANCELLED = 'cancelled';
    const REJECTED = 'rejected';

    public $fillable = [
        'testorder_id', 'remarks', 'status'
    ];

    public function testorder()
    {
        return $this->belongsTo(TestOrder::class);
    }
}
