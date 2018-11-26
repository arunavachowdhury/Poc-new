<?php

namespace App;

use App\Test;
use Illuminate\Database\Eloquent\Model;
use App\TestItemResult;

class TestReport extends Test
{
    public function testitemresults()
    {
        return $this->hasMany(TestItemResult::class);
    }
}
