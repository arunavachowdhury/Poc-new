<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
                        'customer_id',
                        'sample_id',
                        'sample_received_on',
                        'sample_reference_no',
                        'date_of_disposal',
                        'payment_details',
                        'remarks',
                        'status',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
