<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Test;
use App\TestReport;

class TestItemResult extends Model
{
    public function test()
    {
        return $this->belongsTo(Test::class);
    }

}
