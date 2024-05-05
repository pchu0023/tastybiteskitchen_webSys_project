<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WebsiteContent Entity
 *
 * @property int $id
 * @property string|null $home_image
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $opening_time_weekdays
 * @property string|null $opening_time_weekends
 * @property string|null $logo_image
 * @property string|null $about_title
 * @property string|null $about_description
 * @property string|null $about_us_image1
 * @property string|null $about_us_image2
 * @property string|null $about_us_image3
 * @property string|null $about_us_image4
 */
class WebsiteContent extends Entity
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
        'home_image' => true,
        'address' => true,
        'phone' => true,
        'email' => true,
        'opening_time_weekdays' => true,
        'opening_time_weekends' => true,
        'logo_image' => true,
        'about_title' => true,
        'about_description' => true,
        'image1' => true,
        'image2' => true,
        'image3' => true,
        'image4' => true,
    ];
}
