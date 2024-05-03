<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property string $id
 * @property string $name
 * @property float $price
 * @property string $description
 *
 * @property \App\Model\Entity\Image[] $images
 * @property \App\Model\Entity\Ingredient[] $ingredients
 * @property \App\Model\Entity\Menu[] $menus
 * @property \App\Model\Entity\Order[] $orders
 */
class Product extends Entity
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
        'name' => true,
        'price' => true,
        'description' => true,
        'images' => true,
        'ingredients' => true,
        'menus' => true,
        'orders' => true,
        'quantity' => true,
        'extra_info' => true,
    ];
}
