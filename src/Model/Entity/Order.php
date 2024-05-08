<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property string $id
 * @property string $payment_id
 * @property string $delivery_id
 * @property string $status
 *
 * @property \App\Model\Entity\Payment $payment
 * @property \App\Model\Entity\Delivery $delivery
 * @property \App\Model\Entity\Product[] $products
 */
class Order extends Entity
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
        'payment_id' => true,
        'delivery_id' => true,
        'payment' => true,
        'delivery' => true,
        'products' => true,
        'status' => true,
    ];
}
