<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 */
class PaymentsFixture extends TestFixture
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
                'id' => '70a9a4c6-400d-4348-8301-6126047ac12a',
                'user_id' => '92352af6-776e-4612-87a5-2748947a5b07',
                'amount' => 1,
                'method' => 'Lorem ipsum dolor sit amet',
                'date' => '2024-04-01',
            ],
        ];
        parent::init();
    }
}
