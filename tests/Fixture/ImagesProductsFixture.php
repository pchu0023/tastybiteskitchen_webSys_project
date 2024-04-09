<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImagesProductsFixture
 */
class ImagesProductsFixture extends TestFixture
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
                'id' => '0e602135-ade1-4e6c-bff6-1f7d4e6982a9',
                'image_id' => '5c2b76db-783d-443f-b373-6a84b42f8241',
                'product_id' => '6ef0c5a4-e894-4667-8efa-a3fe2fb17c0e',
            ],
        ];
        parent::init();
    }
}
