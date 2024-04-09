<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ImagesProduct Entity
 *
 * @property string $id
 * @property string $image_id
 * @property string $product_id
 *
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\Product $product
 */
class ImagesProduct extends Entity
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
        'image_id' => true,
        'product_id' => true,
        'image' => true,
        'product' => true,
    ];
}
