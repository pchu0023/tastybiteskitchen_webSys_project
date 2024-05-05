<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WebsiteContentFixture
 */
class WebsiteContentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'website_content';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'home_image' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'opening_time_weekdays' => 'Lorem ipsum dolor sit amet',
                'opening_time_weekends' => 'Lorem ipsum dolor sit amet',
                'logo_image' => 'Lorem ipsum dolor sit amet',
                'about_title' => 'Lorem ipsum dolor sit amet',
                'about_description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'about_us_image1' => 'Lorem ipsum dolor sit amet',
                'about_us_image2' => 'Lorem ipsum dolor sit amet',
                'about_us_image3' => 'Lorem ipsum dolor sit amet',
                'about_us_image4' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
