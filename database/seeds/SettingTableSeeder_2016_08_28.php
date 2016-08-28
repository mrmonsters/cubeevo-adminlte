<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SettingTableSeeder_2016_08_28 extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = array(
            array(
                'name'  => 'Homepage Title',
                'code'  => 'homepage_title',
                'type'  => \App\Models\Setting::SITE,
                'value' => 'Advertising Agency | Creative & Branding Agency In Malaysia & Singapore',
            ),
            array(
                'name'  => 'Homepage Featured Project',
                'code'  => 'homepage_featured_project',
                'type'  => \App\Models\Setting::SITE,
                'value' => '1,2,3,5',
            ),
        );

        foreach ($settings as $setting) {

            \App\Models\Setting::create($setting);
        }
    }

}
