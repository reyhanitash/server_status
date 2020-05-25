<?php

use Illuminate\Database\Seeder;
use Spatie\UptimeMonitor\Models\Monitor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Monitor::class)->create([
            'url'=>'https://www.digikala.com',
            'uptime_check_enabled' =>'1',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        factory(Monitor::class)->create([
            'url'=>'https://www.laravel.com',
            'uptime_check_enabled' =>'1',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
