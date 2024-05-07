<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property string $id
 * @property string|null $payment_id
 * @property string|null $delivery_id
 * @property string $delivery_address
 * @property \Cake\I18n\Date|null $requested_date
 * @property string|null $user_id
 * @property string|null $receiver_name
 * @property string|null $receiver_phone
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
        'delivery_address' => true,
        'requested_date' => true,
        'user_id' => true,
        'receiver_name' => true,
        'receiver_phone' => true,
        'payment' => true,
        'delivery' => true,
        'products' => true,
    ];
}
