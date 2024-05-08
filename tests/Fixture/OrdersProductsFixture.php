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
                'id' => '4309188e-088b-464b-9024-2b2c7567855c',
                'order_id' => 'f1f4e91e-ad72-419a-887c-7de97bf01e3a',
                'product_id' => '4e6017ce-9be8-4325-9b26-9381fdf51d2f',
                'quantity' => 1,
            ],
        ];
        parent::init();
    }
}
