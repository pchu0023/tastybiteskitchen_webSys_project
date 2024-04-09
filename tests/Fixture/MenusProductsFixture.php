<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MenusProductsFixture
 */
class MenusProductsFixture extends TestFixture
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
                'id' => 'eaaab60b-f6ae-4aec-93c7-528c9a0a7078',
                'menu_id' => '5a29dd75-b700-4cc7-88eb-8268b40cf5a0',
                'product_id' => '5659a521-8dee-44be-9d89-df79b50001de',
            ],
        ];
        parent::init();
    }
}
