<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //check the latest page for the site
        //site id: 4122
        //page id: 138359
        //keyword id: 1006926 for page 138334

        // $site_id = 4122;
        // $analytics_data = [
        //     [
        //         'keys' => [
        //             'soffit',
        //             'https://myroofhub.com/contractor-services/soffit-fascia-replacement/'
        //         ],
        //         'clicks' => 100,
        //         'impressions' => ,
        //         'ctr' => ,
        //         'position' => ,
        //     ]
        // ];

        //call the ParseAnalyticsBatch code to insert it
    }
}
