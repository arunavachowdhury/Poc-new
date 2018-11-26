<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TestItemResult;
use App\TestItem;
use App\User;

class Test extends Model
{
    public $fillable = [
        'date_of_receipt',
        'sample_code_no',
        'company_name',
        'sample_description',
        'sample_sent_to_lab',
        'result_recorded_on',
        'delivery_date',
        'mode',
        'date_of_disposal',
        'payment_details',
        'remarks',
    ];

    public function testItems()
    {
        return $this->belongsToMany(TestItem::class);
    }

    public function testitemresults()
    {
        return $this->belongsToMany(TestItemResult::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
