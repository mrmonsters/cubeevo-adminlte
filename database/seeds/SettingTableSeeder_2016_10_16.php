<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SettingTableSeeder_2016_10_16 extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = array(
            array(
                'name'  => 'Sub Homepage Title',
                'code'  => 'sub_homepage_title',
                'type'  => \App\Models\Setting::SITE,
                'value' => 'Advertising Agency | Creative & Branding Agency In Singapore & Malaysia',
            ),
            array(
                'name'  => 'Sub Homepage Featured Project',
                'code'  => 'sub_homepage_featured_project',
                'type'  => \App\Models\Setting::SITE,
                'value' => '1,2,3,5',
            ),
            array(
                'name'  => 'Sub Homepage Meta Keyword',
                'code'  => 'sub_homepage_meta_keyword',
                'type'  => \App\Models\Setting::SITE,
                'value' => 'Advertising Agency | Creative & Branding Agency In Singapore & Malaysia',
            ),
            array(
                'name'  => 'Sub Homepage Meta Description',
                'code'  => 'sub_homepage_meta_desc',
                'type'  => \App\Models\Setting::SITE,
                'value' => 'Advertising Agency | Creative & Branding Agency In Singapore & Malaysia',
            ),
        );

        foreach ($settings as $setting) {

            \App\Models\Setting::create($setting);
        }
    }

}
