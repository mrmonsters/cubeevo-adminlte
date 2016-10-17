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
                'name'  => 'Singapore Homepage Title',
                'code'  => 'sub_homepage_title',
                'type'  => \App\Models\Setting::SITE,
                'value' => 'Advertising Agencies Singapore | Creative Agency Singapore | Design Agency Singapore',
            ),
            array(
                'name'  => 'Singapore Homepage Featured Project',
                'code'  => 'sub_homepage_featured_project',
                'type'  => \App\Models\Setting::SITE,
                'value' => '38,30,12,14',
            ),
            array(
                'name'  => 'Singapore Homepage Meta Keyword',
                'code'  => 'sub_homepage_meta_keyword',
                'type'  => \App\Models\Setting::SITE,
                'value' => 'Advertising Agency Singapore, Design Agency Singapore, Creative Agency Singapore, Advertising Company Singapore, Branding Agency Singapore, Graphic Design Agency Singapore',
            ),
            array(
                'name'  => 'Singapore Homepage Meta Description',
                'code'  => 'sub_homepage_meta_desc',
                'type'  => \App\Models\Setting::SITE,
                'value' => 'We\'re CUBEevo, an Advertising Agency in Singapore - giving brands a complete transformation.  Are you ready to transform? Let\'s get started!',
            ),
        );

        foreach ($settings as $setting) {

            \App\Models\Setting::create($setting);
        }
    }

}
