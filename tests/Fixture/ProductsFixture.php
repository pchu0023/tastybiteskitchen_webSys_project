<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
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
                'id' => '2057c7a9-96dc-47a8-a6b0-99c6bc984da0',
                'name' => 'Lorem ipsum dolor sit amet',
                'price' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'quantity' => 1,
                'extra_info' => 'Lorem ipsum dolor sit amet',
                'catering_discount' => 1,
            ],
        ];
        parent::init();
    }
}
