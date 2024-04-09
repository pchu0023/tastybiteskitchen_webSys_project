<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersProductsFixture
 */
class OrdersProductsFixture extends TestFixture
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
                'id' => 'b652bc6a-16eb-4b85-b7c1-3413dea000ff',
                'order_id' => 'aeba7691-01a0-4cda-98a3-a1874105094c',
                'product_id' => '94478e3e-2b5e-4a98-8bf3-f5c10df3d688',
            ],
        ];
        parent::init();
    }
}
