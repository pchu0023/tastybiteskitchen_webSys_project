<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DeliveriesFixture
 */
class DeliveriesFixture extends TestFixture
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
                'id' => '88fb784a-fc66-463e-9199-fc8b67a8ad6b',
                'type' => 'Lorem ipsum dolor sit amet',
                'date' => '2024-04-01',
            ],
        ];
        parent::init();
    }
}
