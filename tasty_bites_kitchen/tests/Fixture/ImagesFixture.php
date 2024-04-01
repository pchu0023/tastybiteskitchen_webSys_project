<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImagesFixture
 */
class ImagesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '12dada91-32dc-433f-aad3-bd8690b8aea8',
                'file_location' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
