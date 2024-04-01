<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * IngredientsProduct Entity
 *
 * @property string $id
 * @property string $product_id
 * @property string $ingredient_id
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Ingredient $ingredient
 */
class IngredientsProduct extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'product_id' => true,
        'ingredient_id' => true,
        'product' => true,
        'ingredient' => true,
    ];
}
