<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'id' => 'b3c5d9ae-d46f-4495-a005-991c414b38f1',
                'type' => 'Lorem ipsum dolor sit amet',
                'first_name' => 'Lorem ipsum dolor ',
                'last_name' => 'Lorem ipsum dolor ',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'phone_number' => 'Lorem ipsu',
                'nonce' => 'Lorem ipsum dolor sit amet',
                'nonce_expiry' => '2024-04-12 11:30:35',
            ],
        ];
        parent::init();
    }
}
