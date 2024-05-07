<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'id' => '2b1e357b-2995-40f6-bf7b-c15ba6d86869',
                'payment_id' => 'a4bf24c2-e971-4008-9f35-271761e2b94c',
                'delivery_id' => '15e464a7-c994-4e85-af50-e7b10a282cb8',
                'delivery_address' => 'Lorem ipsum dolor sit amet',
                'requested_date' => '2024-05-07',
                'user_id' => '4b314e08-ce75-40ef-bb8a-9d0d7a0b5da2',
                'receiver_name' => 'Lorem ipsum dolor sit amet',
                'receiver_phone' => 'Lorem ipsu',
            ],
        ];
        parent::init();
    }
}
