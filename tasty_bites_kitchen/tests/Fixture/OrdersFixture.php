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
                'id' => '48b5d6d0-746a-400c-95fa-05b211ee7008',
                'payment_id' => 'a19333aa-dcce-42ae-9ca2-6d909ce7f16c',
                'delivery_id' => '069da352-ca95-4ea4-8206-0e69626b883b',
            ],
        ];
        parent::init();
    }
}
