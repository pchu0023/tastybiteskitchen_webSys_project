<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IngredientsProductsFixture
 */
class IngredientsProductsFixture extends TestFixture
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
                'id' => 'aa16f757-b208-4825-a960-db47ea60c7e6',
                'product_id' => '96061a8d-052d-4879-9b4c-fcc811a784bb',
                'ingredient_id' => '7d727fc1-7b82-4a84-9546-45d5ff23b2e4',
            ],
        ];
        parent::init();
    }
}
