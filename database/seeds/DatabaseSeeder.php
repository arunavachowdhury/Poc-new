<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Sample;
use App\TestItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        factory(User::class, 20)->create();

        // Sample::truncate();
        // factory(Sample::class, 5)->create();

        factory(\App\OrderTestItem::class, 30)->create();

        factory(\App\TestOrder::class, 2)->create()->each(
            function ($testOrder) {
                $orderTestItems = \App\OrderTestItem::all()->random(mt_rand(1, 5))->pluck('id');
                $testOrder->orderTestItems()->attach($orderTestItems);
            }
        );
    }
}
