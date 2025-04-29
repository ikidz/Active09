<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WebSettings;

class WebSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'key' => 'OURSERVICE_CAPTION',
                'type' => 'text',
                'value_th' => 'We Provide Greate Services for our Clients in All Projects',
                'value_en' => 'We Provide Greate Services for our Clients in All Projects'
            ],[
                'key' => 'HOME_QUOTES',
                'type' => 'longText',
                'value_th' => 'We provide innovative {Product Solutions} for sustainable progress. Our professional team works to increase productivity and cost effectiveness on the market.',
                'value_en' => 'We provide innovative {Product Solutions} for sustainable progress. Our professional team works to increase productivity and cost effectiveness on the market.'
            ],[
                'key' => 'HOME_QUOTES_BG',
                'type' => 'text',
                'value_th' => null,
                'value_en' => null
            ],[
                'key' => 'HOME_ABOUTUS_IMG',
                'type' => 'image',
                'value_th' => null,
                'value_en' => null
            ],[
                'key' => 'HOME_ABOUTUS_TITLE',
                'type' => 'text',
                'value_th' => 'Why Us',
                'value_en' => 'Why Us'
            ],[
                'key' => 'HOME_ABOUTUS_CAPTION',
                'type' => 'longText',
                'value_th' => 'We have facility to produce advance work various industrial applications based on specially developed technol-ogy. We are also ready to developement by according to users changing needs. Infrastructure related installation projects. General repair & industrial and machinery. Our team up-to-date, sustainable custom manufacturing solutions.',
                'value_en' => 'We have facility to produce advance work various industrial applications based on specially developed technol-ogy. We are also ready to developement by according to users changing needs. Infrastructure related installation projects. General repair & industrial and machinery. Our team up-to-date, sustainable custom manufacturing solutions.'
            ],[
                'key' => 'FOOTER_ABOUTUS',
                'type' => 'longText',
                'value_th' => 'Over 24 years experience and knowledge international standards, technologicaly changes our industrial systems, we are dedicated to provides the best solutions to our valued customers there are many variations solutions.',
                'value_en' => 'Over 24 years experience and knowledge international standards, technologicaly changes our industrial systems, we are dedicated to provides the best solutions to our valued customers there are many variations solutions.'
            ],[
                'key' => 'SOCIAL_FACEBOOK',
                'type' => 'link',
                'value_th' => null,
                'value_en' => null
            ],[
                'key' => 'SOCIAL_TWITTER',
                'type' => 'link',
                'value_th' => null,
                'value_en' => null
            ],[
                'key' => 'META_TITLE',
                'type' => 'text',
                'value_th' => 'Active 09 Industry Co., Ltd.',
                'value_en' => 'Active 09 Industry Co., Ltd.'
            ],[
                'key' => 'ADMIN_CONTACT_EMAIL',
                'type' => 'email',
                'value_th' => 'active@active09.com',
                'value_en' => null
            ],[
                'key' => 'COMPANY_MAP',
                'type' => 'map',
                'value_th' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248139.2128825938!2d99.97115179453125!3d13.64710420000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2bf19a6c9cff1%3A0xde9fa743e3bea427!2z4Lia4Lij4Li04Lip4Lix4LiXIOC5geC4reC4hOC4l-C4teC4nyAwOSDguK3guLTguJnguJTguLHguKrguJfguKPguLUg4LiI4Liz4LiB4Lix4LiU!5e0!3m2!1sen!2ssg!4v1691178682621!5m2!1sen!2ssg',
                'value_en' => null
            ],[
                'key' => 'CONTACT_TEL',
                'type' => 'tel',
                'value_th' => '034 472 380',
                'value_en' => null
            ],[
                'key' => 'CONTACT_WORKING_HOURS',
                'type' => 'text',
                'value_th' => 'จ-ศ, 08.00 น. - 17.00 น.',
                'value_en' => 'Mon-Fri, 8am until 5pm'
            ],[
                'key' => 'CONTACT_ADDRESS',
                'type' => 'longText',
                'value_th' => '141 ถนนเศรษฐกิจ 1, ตำบลคลองมะเดื่อ, อำเภอกระทุ่มแบน, จ.สมุทรสาคร 74110',
                'value_en' => '141 Setthakij 1 Rd, Khlong Maduea, Krathum Baen District, Samut Sakhon 74110'
            ],[
                'key' => 'HEADER_CERTIFIED',
                'type' => 'text',
                'value_th' => 'ISO 9001: 2010',
                'value_en' => 'ISO 9001: 2010'
            ]
        ];

        foreach( $datas as $data ){
            WebSettings::updateOrInsert([
                'key' => $data['key']
            ],[
                'type' => $data['type'],
                'value_th' => $data['value_th'],
                'value_en' => $data['value_en'],
                'created_at' => now()
            ]);
        }
    }
}
