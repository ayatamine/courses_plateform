<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{

    protected $settings = [
        [
            'key'         => 'contact_email',
            'name'        => 'Contact form email address',
            'description' => 'The email address that all emails from the contact form will go to.',
            'value'       => 'admin@updivision.com',
            'field'       => '{"name":"value","label":"Value","type":"email"}',
            'active'      => 1,
        ],
        [
            'key'           => 'contact_cc',
            'name'          => 'Contact form CC field',
            'description'   => 'Email addresses separated by comma, to be included as CC in the email sent by the contact form.',
            'value'         => '',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,

        ],
        [
            'key'           => 'site_name',
            'name'          => 'website name',
            'description'   => 'the website name',
            'value'         => 'coursatbarmaja',
            'field'         => '{"name":"value","label":"Value","type":"email"}',
            'active'        => 1,
        ],
        [
            'key'         => 'description',
            'name'        => 'description',
            'description' => 'website description',
            'value'       => 'Every developer need a real road to success in his career,
            because of that we are here to provide the best and the clean way to 
           take you from beginner to middle to advanced developer.',
            'field'       => '{"name":"value","label":"Value","type":"textarea"}',
            'active'      => 1,

        ], 
        [
            'key'           => 'phone_number',
            'name'          => 'website phone number',
            'description'   => 'the website phone_number',
            'value'         => '+2134568745',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'address',
            'name'          => 'website phone address',
            'description'   => 'the website address',
            'value'         => 'leghmara adrar',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'logo',
            'name'          => 'website  logo',
            'description'   => 'the website logo',
            'value'         => 'logo-1633967597.svg',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'logo_ar',
            'name'          => 'website  logo_ar',
            'description'   => 'the website logo arabic',
            'value'         => 'logo-1633967597.svg',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'facebook_link',
            'name'          => 'website  facebook_link',
            'description'   => 'the website facebook_link',
            'value'         => 'https://www.facebook.com/4arabdevelopers',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'youtube_link',
            'name'          => 'website  youtube_link',
            'description'   => 'the website youtube_link',
            'value'         => 'https://www.youtube.com/c/4arabdevelopers',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'instagram_link',
            'name'          => 'website  instagram_link',
            'description'   => 'the website instagram_link',
            'value'         => 'https://www.facebook.com/4arabdevelopers',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'linkedin_link',
            'name'          => 'website  linkedin_link',
            'description'   => 'the website linkedin_link',
            'value'         => 'https://linkedin.com',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'twitter_link',
            'name'          => 'website  twitter_link',
            'description'   => 'the website twitter_link',
            'value'         => 'twitter_link',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'telegram_link',
            'name'          => 'website  telegram_link',
            'description'   => 'the website telegram_link',
            'value'         => 'telegram_link',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,
        ],
        [
            'key'           => 'copyrights',
            'name'          => 'website  copyrights',
            'description'   => 'the website copyrights',
            'value'         => 'copyrights',
            'field'         => '{"name":"value","label":"Value","type":"text"}',
            'active'        => 1,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting) {
            $result = DB::table(config('backpack.settings.table_name'))->insert($setting);

            if (!$result) {
                $this->command->info("Insert failed at record $index.");

                return;
            }
        }

        $this->command->info('Inserted '.count($this->settings).' records.');
    }
}
